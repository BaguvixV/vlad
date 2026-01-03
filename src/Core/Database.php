<?php

namespace Core;

use Core\Config;
use PDO;

class Database {
  protected ?PDO $connection = null;

  public function __construct() {
    $conf = Config::database();

    if ($this->connection === null) {

      $dsn = sprintf(
          'mysql:host=%s;port=%s;dbname=%s;charset=%s',
          $conf['host'],
          $conf['port'],
          $conf['dbname'],
          $conf['charset']
      );

      try {
        $this->connection = new PDO(
          dsn: $dsn,
          username: $conf['username'],
          password: $conf['password'],
          options: [
            // Set the PDO error mode to exception
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
          ]
        );
      } catch (\PDOException $e) {
        throw new \RuntimeException(message: 'Database connection failed', previous: $e);
      }
    }
  }

  public function getConnection(): ?PDO {
    return $this->connection;
  }

}