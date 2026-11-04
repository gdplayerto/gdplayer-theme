#!/usr/bin/env php
<?php

declare(strict_types=1);

/**
 * Gate: exit/die usage.
 *
 * Tokenizer-based (T_EXIT), jadi kata "exit"/"die" di komentar atau string tidak dihitung.
 * Salinan dari repo root (`scripts/check_exit.php`); SCAN_ROOTS dan allowlist disesuaikan
 * dengan struktur repo ini. exit/die hanya boleh di skrip CLI.
 *
 * Run: php scripts/check_exit.php [--json]
 */
const SCAN_ROOTS = ['src', 'backend', 'frontend', 'stubs'];
// Entry script di root repo tidak tercakup SCAN_ROOTS (direktori), jadi didaftarkan eksplisit.
const ROOT_FILES = [];
// `tests`: skrip selftest CLI boleh exit() — bukan kode yang dikirim ke produksi.
const SKIP_SEGMENTS = ['vendor', 'node_modules', '.git', 'cache', 'tmp', 'logs', 'tests'];

/**
 * CLI scripts allowed to use exit/die.
 *
 * @var string[]
 */
const ALLOWED_SCRIPTS = [];

/**
 * @return list<array{0: string, 1: string}>
 */
function collectPhpFiles(): array
{
    $base = dirname(__DIR__);
    $files = [];
    foreach (SCAN_ROOTS as $scanRoot) {
        $dir = $base . \DIRECTORY_SEPARATOR . $scanRoot;
        if (!is_dir($dir)) {
            continue;
        }
        $iterator = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator($dir, FilesystemIterator::SKIP_DOTS)
        );
        /** @var SplFileInfo $item */
        foreach ($iterator as $item) {
            if (!$item->isFile() || $item->getExtension() !== 'php') {
                continue;
            }
            $relative = str_replace('\\', '/', substr($item->getPathname(), strlen($base) + 1));
            if (array_intersect(explode('/', $relative), SKIP_SEGMENTS) !== []) {
                continue;
            }
            $files[] = [$relative, $item->getPathname()];
        }
    }
    foreach (ROOT_FILES as $rootFile) {
        $path = $base . \DIRECTORY_SEPARATOR . $rootFile;
        if (is_file($path)) {
            $files[] = [$rootFile, $path];
        }
    }
    return $files;
}

/**
 * @param string $source file contents
 * @return list<int> line numbers containing the exit/die token
 */
function findExitLines(string $source): array
{
    $lines = [];
    foreach (token_get_all($source) as $token) {
        if (is_array($token) && $token[0] === \T_EXIT) {
            $lines[] = $token[2];
        }
    }
    return $lines;
}

$offenders = [];
$total = 0;
$allowedCount = 0;
foreach (collectPhpFiles() as [$relative, $absolute]) {
    $lines = findExitLines((string) file_get_contents($absolute));
    if ($lines === []) {
        continue;
    }
    $isAllowed = in_array($relative, ALLOWED_SCRIPTS, true);
    foreach ($lines as $line) {
        $total++;
        if ($isAllowed) {
            $allowedCount++;
            continue;
        }
        $offenders[] = ['file' => $relative, 'line' => $line];
    }
}

$offenderCount = count($offenders);
if (in_array('--json', $argv, true)) {
    echo json_encode(
        ['total' => $total, 'allowed' => $allowedCount, 'offenders' => $offenders],
        \JSON_PRETTY_PRINT | \JSON_UNESCAPED_SLASHES
    ) . \PHP_EOL;
    exit($offenderCount > 0 ? 1 : 0);
}

printf(
    'exit/die: total=%d | di allowlist CLI=%d | pelanggaran=%d%s',
    $total,
    $allowedCount,
    $offenderCount,
    \PHP_EOL
);
foreach (array_slice($offenders, 0, 40) as $offender) {
    printf('  %s:%d%s', $offender['file'], $offender['line'], \PHP_EOL);
}
if ($offenderCount > 40) {
    printf('  ... (%d pelanggaran lain tidak ditampilkan)%s', $offenderCount - 40, \PHP_EOL);
}
if ($offenderCount === 0) {
    echo 'OK: tidak ada exit/die di luar allowlist CLI.' . \PHP_EOL;
}
exit($offenderCount > 0 ? 1 : 0);
