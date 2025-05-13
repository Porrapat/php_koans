<?php
// web.php — full version with test details tracked correctly

require __DIR__ . '/vendor/autoload.php';

use PHPUnit\Framework\TestResult;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\TestSuite;
use PHPUnit\TextUI\TestRunner;

class WebTestListener implements PHPUnit\Framework\TestListener {
    public array $passed = [];
    public array $failed = [];
    public array $errored = [];

    public function addError(PHPUnit\Framework\Test $test, \Throwable $t, float $time): void {
        $this->errored[] = ['test' => $test, 'message' => $t->getMessage()];
    }

    public function addFailure(PHPUnit\Framework\Test $test, PHPUnit\Framework\AssertionFailedError $e, float $time): void {
        $this->failed[] = ['test' => $test, 'message' => $e->getMessage()];
    }

    public function endTest(PHPUnit\Framework\Test $test, float $time): void {
        $name = $test->getName();
        if (!in_array($name, array_map(fn($f) => $f['test']->getName(), $this->failed)) &&
            !in_array($name, array_map(fn($e) => $e['test']->getName(), $this->errored))) {
            $this->passed[] = $test;
        }
    }

    // Unused methods required by the interface
    public function addWarning(PHPUnit\Framework\Test $test, PHPUnit\Framework\Warning $e, float $time): void {}
    public function addIncompleteTest(PHPUnit\Framework\Test $test, \Throwable $t, float $time): void {}
    public function addRiskyTest(PHPUnit\Framework\Test $test, \Throwable $t, float $time): void {}
    public function addSkippedTest(PHPUnit\Framework\Test $test, \Throwable $t, float $time): void {}
    public function startTest(PHPUnit\Framework\Test $test): void {}
    public function startTestSuite(PHPUnit\Framework\TestSuite $suite): void {}
    public function endTestSuite(PHPUnit\Framework\TestSuite $suite): void {}
}


// Create test suite
$suite = new TestSuite();
$suite->addTestFile(__DIR__ . '/koans/AboutAsserts.php');

// Set up listener and result tracking
$listener = new WebTestListener();
$result = new TestResult();
$result->addListener($listener);
$suite->run($result);

$summary = [
    'total' => $result->count(),
    'failures' => count($listener->failed),
    'errors' => count($listener->errored),
    'passed' => count($listener->passed),
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>PHP Koans Web Runner</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { padding: 2rem; background-color: #f9f9f9; }
    .result-card { max-width: 700px; margin: auto; }
    .test-details { max-height: 400px; overflow-y: auto; margin-top: 1rem; }
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

      <hr>
      <h5 class="mt-4">Test Details</h5>
      <ul class="list-group text-start test-details">
        <?php foreach ($listener->passed as $test): ?>
          <li class="list-group-item list-group-item-success">✅ <?= htmlspecialchars($test->getName()) ?></li>
        <?php endforeach; ?>

        <?php foreach ($listener->failed as $fail): ?>
          <li class="list-group-item list-group-item-danger">
            ❌ <?= htmlspecialchars($fail['test']->getName()) ?>
            <br><small class="text-muted"><?= nl2br(htmlspecialchars($fail['message'])) ?></small>
          </li>
        <?php endforeach; ?>

        <?php foreach ($listener->errored as $err): ?>
          <li class="list-group-item list-group-item-warning">
            💥 <?= htmlspecialchars($err['test']->getName()) ?>
            <br><small class="text-muted"><?= nl2br(htmlspecialchars($err['message'])) ?></small>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>

  <div class="mt-4">
    <a href="web.php" class="btn btn-outline-secondary">🔁 Rerun Tests</a>
  </div>
</div>

</body>
</html>
