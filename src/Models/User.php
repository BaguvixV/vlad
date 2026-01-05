<?php

namespace Models;

use PDO;


class User {
  private const TABLE = 'user';
  private string $nameBacking;
  private string $surnameBacking;
  private int $ageBacking;
  private string $emailBacking;
  private string $passwordBacking;
  private string $phoneBacking;
  private string $bioBacking;
  private bool $isActiveBacking;

  public function __construct(private ?PDO $connection = null) {
    // intentionaly empty
  }

  public string $name {
    get => $this->nameBacking;
    set => $this->nameBacking = ucfirst(string: strtolower(string: $value));
  }

  public string $surname {
    get => $this->surnameBacking;
    set => $this->surnameBacking = ucfirst(string: strtolower(string: $value));
  }

  public int $age {
    get => $this->ageBacking;
    set => $value > 0
        ? $this->ageBacking = $value
        : throw new \DomainException(message: 'Vecums nevar būt mīnusā.');
  }

  public string $email {
    get => $this->emailBacking;
    set => $this->emailBacking = strtolower(string: $value);
  }
  
  public string $password {
    get => $this->passwordBacking;
    set => $this->passwordBacking = $value;
  }

  public string $phone {
    get => $this->phoneBacking;
    set => $this->phoneBacking = $value;
  }

  public string $bio {
    get => $this->bioBacking;
    set => $this->bioBacking = $value;
  }

  public bool $isActive {
    get => $this->isActiveBacking;
    set => $this->isActiveBacking = (bool) $value;
  }

  // Note: Later import database methods from Model.php
  public function read(): mixed {
    $table = self::TABLE;
    $sql = "SELECT * FROM {$table}";

    $stmt = $this->connection->prepare($sql);
    $stmt->execute();

    return $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
  }

}