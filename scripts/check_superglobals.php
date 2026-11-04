#!/usr/bin/env php
<?php

declare(strict_types=1);

/**
 * Gate: superglobal usage ($_GET/$_POST/$_SERVER/$_COOKIE/$_FILES/$_ENV/$_SESSION/$_REQUEST).
 *
 * Tokenizer-based (bukan regex) supaya kemunculan di komentar/string tidak dihitung.
 * Salinan dari repo root (`scripts/check_superglobals.php`); SCAN_ROOTS dan allowlist
 * disesuaikan dengan struktur repo ini.
 *
 * Run: php scripts/check_superglobals.php [--json]
 */
const SCAN_ROOTS = ['src', 'backend', 'frontend', 'stubs'];
// Entry script di root repo tidak tercakup SCAN_ROOTS (direktori), jadi didaftarkan eksplisit.
const ROOT_FILES = [];
// `tests`: fixture router/web-server adalah pengganti SAPI — superglobal memang bagian dari perannya.
const SKIP_SEGMENTS = ['vendor', 'node_modules', '.git', 'cache', 'tmp', 'logs', 'tests'];

const SUPERGLOBALS = ['_GET', '_POST', '_SERVER', '_COOKIE', '_FILES', '_ENV', '_SESSION', '_REQUEST'];

/**
 * Files allowed to read superglobals.
 *
 * @var array<string, string> basename => reason
 */
const ALLOWED_FILES = [];

/**
 * @return list<array{0: string, 1: string}> [path relatif, path absolut]
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
 * Lines where a superglobal is used (T_VARIABLE token, not comments/strings).
 *
 * @param string $source file contents
 * @return array<int, list<string>> line => list of superglobal names
 */
function findSuperglobalLines(string $source): array
{
    $hits = [];
    foreach (token_get_all($source) as $token) {
        if (!is_array($token) || $token[0] !== \T_VARIABLE) {
            continue;
        }
        $name = substr($token[1], 1);
        if (in_array($name, SUPERGLOBALS, true)) {
            $hits[$token[2]][] = $name;
        }
    }
    return $hits;
}

$offenders = [];
$total = 0;
$allowedCount = 0;
$byType = [];
foreach (collectPhpFiles() as [$relative, $absolute]) {
    $hits = findSuperglobalLines((string) file_get_contents($absolute));
    if ($hits === []) {
        continue;
    }
    $isAllowed = isset(ALLOWED_FILES[basename($relative)]);
    foreach ($hits as $line => $names) {
        foreach ($names as $name) {
            $type = substr($name, 1);
            $byType[$type] = ($byType[$type] ?? 0) + 1;
            $total++;
        }
        if ($isAllowed) {
            $allowedCount++;
            continue;
        }
        $offenders[] = ['file' => $relative, 'line' => $line, 'code' => implode(',', $names)];
    }
}

$offenderCount = count($offenders);
if (in_array('--json', $argv, true)) {
    echo json_encode(
        ['total' => $total, 'allowed' => $allowedCount, 'byType' => $byType, 'offenders' => $offenders],
        \JSON_PRETTY_PRINT | \JSON_UNESCAPED_SLASHES
    ) . \PHP_EOL;
    exit($offenderCount > 0 ? 1 : 0);
}

printf(
    'superglobals: total=%d (%s) | di allowlist=%d | pelanggaran=%d%s',
    $total,
    implode(', ', array_map(
        static fn(string $k, int $v): string => "{$k}={$v}",
        array_keys($byType),
        array_values($byType)
    )),
    $allowedCount,
    $offenderCount,
    \PHP_EOL
);
foreach (array_slice($offenders, 0, 40) as $offender) {
    printf('  %s:%d  %s%s', $offender['file'], $offender['line'], $offender['code'], \PHP_EOL);
}
if ($offenderCount > 40) {
    printf('  ... (%d pelanggaran lain tidak ditampilkan)%s', $offenderCount - 40, \PHP_EOL);
}
if ($offenderCount === 0) {
    echo 'OK: tidak ada superglobal di luar allowlist.' . \PHP_EOL;
}
exit($offenderCount > 0 ? 1 : 0);
