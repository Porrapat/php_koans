<?php

echo "Running PHP Koans...\n";

$isWindows = strtoupper(substr(PHP_OS_FAMILY, 0, 3)) === 'WIN';

$phpunit = $isWindows
    ? 'vendor\bin\phpunit.bat'
    : './vendor/bin/phpunit';

passthru($phpunit. ' --colors=always');