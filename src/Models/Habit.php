<?php

namespace Models;

use PDO;


class Habit {
  private const TABLE = 'habit';
  private string $dateBacking;
  private string $categoryBacking;
  private string $statusBacking;
  private string $titleBacking;
  private string $descriptionBacking;
  private bool $isActiveBacking;

  public function __construct(private ?PDO $connection = null) {
    // intentionaly empty
  }

  public string $date {
    get => $this->dateBacking;
    set => $this->dateBacking = $value;
  }

  public string $category {
    get => $this->categoryBacking;
    set => $this->categoryBacking = strtolower(string: $value);
  }

  public string $status {
    get => $this->statusBacking;
    set => $this->statusBacking = strtoupper(string: $value);
  }

  public string $title {
    get => $this->titleBacking;
    set => $this->titleBacking = ucfirst(string: strtolower(string: $value));
  }

  public string $description {
    get => $this->descriptionBacking;
    set => $this->descriptionBacking = $value;
  }

  public bool $isActive {
    get => $this->isActiveBacking;
    set => $this->isActiveBacking = (bool) $value;
  }

  // Note: Later import database methods from Model.php
  public function read(): mixed {
    $table = self::TABLE;
    $sql = "SELECT * FROM {$table}";

    $stmt = $this->connection->prepare(query: $sql);
    $stmt->execute();

    return $stmt->fetchAll(mode: PDO::FETCH_ASSOC);
  }

}