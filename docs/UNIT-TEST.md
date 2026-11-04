# UNIT-TEST — utang teknis

## Belum ada suite PHPUnit

Repo tema ini belum punya suite sendiri. Konsekuensinya:

- `composer test` / `composer test:coverage` hanya mencetak pemberitahuan (exit 0)
  supaya rangkaian `composer dev; gate; semgrep; test; test:coverage; sonar` tidak
  berhenti dengan "Command test is not defined";
- Sonar memakai `sonar.coverage.exclusions=**/*` karena tanpa clover semua baris baru
  otomatis 0% dan gerbang `new_coverage` selalu merah.

## Yang dibutuhkan untuk menutup utang ini

1. Tambah `phpunit/phpunit` + `phpunit.xml.dist` (testsuite `unit`, clover `coverage-clover.xml`).
2. Hapus `sonar.coverage.exclusions=**/*` dari `sonar-project.properties`.
3. Ganti script `test`/`test:coverage` dengan perintah phpunit yang sebenarnya.
