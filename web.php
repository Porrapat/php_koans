<?php
// web.php — fancy Koan test runner for browser

require __DIR__ . '/vendor/autoload.php';

use PHPUnit\Framework\TestSuite;
use PHPUnit\TextUI\TestRunner;
use PHPUnit\TextUI\DefaultResultPrinter;
use PHPUnit\Framework\TestResult;

// Capture output
ob_start();

// Prepare the test suite
$suite = new TestSuite();
$suite->addTestFile(__DIR__ . '/koans/AboutAsserts.php'); // Add more as needed
$suite->addTestFile(__DIR__ . '/koansSolutions/AboutVariables.php'); // Add more as needed
$suite->addTestFile(__DIR__ . '/koansSolutions/AboutTrueAndFalse.php'); // Add more as needed

$result = new TestResult();
$suite->run($result);

$summary = [
    'total' => $result->count(),
    'failures' => count($result->failures()),
    'errors' => count($result->errors()),
    'skipped' => count($result->skipped()),
    'passed' => $result->wasSuccessful() ? $result->count() : $result->count() - count($result->failures()) - count($result->errors()) - count($result->skipped()),
];

ob_end_clean();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>PHP Koans Web Runner</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { padding: 2rem; background-color: #f9f9f9; }
    .result-card { max-width: 600px; margin: auto; }
  </style>
</head>
<body>

<div class="container text-center">
  <h1 class="mb-4">🧘 PHP Koans Web Runner</h1>

  <div class="card result-card shadow">
    <div class="card-body">
      <h5 class="card-title">Test Summary</h5>
      <p class="card-text">
        <span class="badge bg-primary">Total: <?= $summary['total'] ?></span>
        <span class="badge bg-success">Passed: <?= $summary['passed'] ?></span>
        <span class="badge bg-warning text-dark">Skipped: <?= $summary['skipped'] ?></span>
        <span class="badge bg-danger">Failures: <?= $summary['failures'] ?></span>
        <span class="badge bg-danger">Errors: <?= $summary['errors'] ?></span>
      </p>

      <?php if ($summary['failures'] || $summary['errors']): ?>
        <div class="alert alert-danger mt-3">
          Not all Koans have been solved. Keep going! 🧗
        </div>
      <?php else: ?>
        <div class="alert alert-success mt-3">
          All tests passed. You are enlightened. 🌟
        </div>
      <?php endif; ?>
    </div>
  </div>

  <div class="mt-4">
    <a href="web.php" class="btn btn-outline-secondary">🔁 Rerun Tests</a>
  </div>
</div>

</body>
</html>
