<?php

use KoansLib\KoansTestCase;

// You must enable extension pdo_sqlite before playing with this Koans.

/**
 * @requires extension pdo_sqlite
 */
class AboutPDO extends KoansTestCase
{
    private \PDO $pdo;

    protected function setUp(): void
    {
        $this->pdo = new PDO('sqlite::memory:');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->pdo->exec('CREATE TABLE users (id INTEGER PRIMARY KEY, name TEXT)');
        $this->pdo->exec("INSERT INTO users (name) VALUES ('Alice'), ('Bob'), ('Charlie')");
    }

    /**
     * @testdox You can connect to an in-memory SQLite database using PDO
     */
    public function testPdoConnection()
    {
        $this->assertInstanceOf(PDO::class, $this->pdo);
    }

    /**
     * @testdox You can execute raw SQL queries using exec()
     */
    public function testExec()
    {
        $result = $this->pdo->exec("INSERT INTO users (name) VALUES ('Dave')");
        $this->assertEquals(__, $result);
    }

    /**
     * @testdox You can fetch results using query()
     */
    public function testQuery()
    {
        $stmt = $this->pdo->query("SELECT name FROM users WHERE name = 'Bob'");
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->assertEquals(__, $result['name']);
    }

    /**
     * @testdox You can use prepared statements with placeholders
     */
    public function testPreparedStatements()
    {
        $stmt = $this->pdo->prepare("SELECT name FROM users WHERE name = :name");
        $stmt->execute([':name' => 'Charlie']);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->assertEquals(__, $result['name']);
    }

    /**
     * @testdox You can fetch multiple rows from a query result
     */
    public function testFetchAll()
    {
        $stmt = $this->pdo->query("SELECT name FROM users");
        $results = $stmt->fetchAll(PDO::FETCH_COLUMN);
        $this->assertEquals([__, __, __], $results);
    }
}
