<?php

echo "Running PHP Koans...\n";

// Autoload Composer
require_once __DIR__ . '/vendor/autoload.php';

// Define the placeholder
// define('__', '__');  // หรือใช้ 'FILL_ME_IN' ก็ได้

define('_ _', '__');

$isWindows = strtoupper(substr(PHP_OS_FAMILY, 0, 3)) === 'WIN';

$phpunit = $isWindows
    ? 'vendor\bin\phpunit.bat'
    : './vendor/bin/phpunit';

passthru($phpunit. ' --colors=always');