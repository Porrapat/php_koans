<?php

echo "Running PHP Koans...\n";

// Autoload Composer
require_once __DIR__ . '/vendor/autoload.php';

if (version_compare(PHP_VERSION, '7.2.0', '>=')) {
    $isWindows = strtoupper(substr(PHP_OS_FAMILY, 0, 3)) === 'WIN';

    $phpunit = $isWindows
        ? 'vendor\bin\phpunit.bat'
        : './vendor/bin/phpunit';

    passthru($phpunit. ' --colors=always');
} else {
    $isWindows = strtoupper(substr(PHP_OS, 0, 3)) === 'WIN';

    $phpunit = $isWindows
        ? 'vendor\bin\phpunit.bat'
        : './vendor/bin/phpunit';

    passthru($phpunit);
}



