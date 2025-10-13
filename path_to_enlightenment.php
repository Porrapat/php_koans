<?php

// Define the __ placeholder constant
define('__', '__FILL_ME_IN__');
define('____', !('__FILL_ME_IN__'));


// Autoload Composer
require_once __DIR__ . '/vendor/autoload.php';

// Load KoansLib classes
require_once __DIR__ . '/KoansLib/KoansTestCase.php';
require_once __DIR__ . '/KoansLib/KoansRunner.php';

use KoansLib\KoansRunner;

// Run the koans
$runner = new KoansRunner('koans');
$exitCode = $runner->run();

exit($exitCode);
