<?php

namespace Core;

use PDO;

final class Database {
  protected ?PDO $connection = null;


  public function __construct(
    private string $host,
    private int $port,
    private string $database,
    private string $charset,
    private string $username,
    private string $password
  ) {}


  public function getConnection(): PDO
  {
    if ($this->connection === null) {

      $dsn = sprintf(
          'mysql:host=%s;port=%s;dbname=%s;charset=%s',
          $this->host,
          $this->port,
          $this->database,
          $this->charset
      ); 

      try {
        $this->connection = new PDO(
          dsn: $dsn,
          username: $this->username,
          password: $this->password,
          options: [
            // Set the PDO error mode to exception
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
          ]
        );
      } catch (\PDOException $e) {
        throw new \RuntimeException(message: 'Database connection failed', previous: $e);
      }
    }

    return $this->connection;
  }

}