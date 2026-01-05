<?php

namespace Core;

use PDO;
use PDOException;
use RuntimeException;


class Database {
  private ?PDO $connection = null;

  public function __construct(private array $config) {
    // intentionaly empty
  }

  public function connect(): ?PDO
  {
    if ($this->connection !== null) {
      return $this->connection;
    }

    $dsn = sprintf(
        'mysql:host=%s;port=%s;dbname=%s;charset=%s',
        $this->config['host'],
        $this->config['port'],
        $this->config['dbname'],
        $this->config['charset']
    );

    try {
      $this->connection = new PDO(
        dsn: $dsn,
        username: $this->config['username'],
        password: $this->config['password'],
        options: [
          // Set the PDO error mode to exception
          PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        ]
      );
    } catch (PDOException $e) {
      throw new RuntimeException(
        message: 'Database connection failed',
        previous: $e
      );
    }

    return $this->connection;
  }

}