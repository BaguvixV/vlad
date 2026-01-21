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

  // create habit
  public function create(): bool {
    $table = self::TABLE;
    $sql = "INSERT INTO {$table}
            (category, title, description)
            VALUES (:category, :title, :description)
    ";

    $stmt = $this->connection->prepare($sql);

    return $stmt->execute([
      ':category' => $this->categoryBacking,
      ':title' => $this->titleBacking,
      ':description' => $this->description
    ]);
  }

  // edit selected habit
  public function edit(int|null $habitId): bool {
    $table = self::TABLE;
    $sql = "UPDATE {$table}
            SET category=:category, title=:title, description=:description
            WHERE id = :id
    ";

    $stmt = $this->connection->prepare($sql);

    return $stmt->execute([
      ':id' => $habitId,
      ':category' => $this->categoryBacking,
      ':title' => $this->titleBacking,
      ':description' => $this->description
    ]);
  }

  // TODO: Later import database methods from Model.php
  public function read(): array|null {
    $table = self::TABLE;
    $sql = "SELECT * FROM {$table}";

    $stmt = $this->connection->prepare(query: $sql);
    $stmt->execute();

    $output = $stmt->fetchAll(mode: PDO::FETCH_ASSOC);

    return $output ? $output : null;
  }

  // TODO: Later import database methods from Model.php
  public function readActive(): array|null {
    $table = self::TABLE;
    $sql = "SELECT * FROM {$table}
            WHERE is_active = 1
    ";

    $stmt = $this->connection->prepare(query: $sql);
    $stmt->execute();

    $output = $stmt->fetchAll(mode: PDO::FETCH_ASSOC);

    return $output ? $output : null;
  }

  // TODO: Later import database methods from Model.php
  public function readArchived(): array|null {
    $table = self::TABLE;
    $sql = "SELECT * FROM {$table}
            WHERE is_active = 0
    ";

    $stmt = $this->connection->prepare(query: $sql);
    $stmt->execute();

    $output = $stmt->fetchAll(mode: PDO::FETCH_ASSOC);

    return $output ? $output : null;
  }

  public function readHabitById(int|null $habitId): array|null {
    $table = self::TABLE;
    $sql = "SELECT *
            FROM {$table}
            WHERE id = :id
    ";

    $stmt = $this->connection->prepare(query: $sql);

    // $stmt->bindParam(':id', $habitId, PDO::PARAM_INT);
    $stmt->bindParam(':id', $habitId);
    $stmt->execute();

    $output = $stmt->fetchAll(mode: PDO::FETCH_ASSOC);

    return $output ? $output : null;
  }

  // delete habit
  public function forceDelete(int|null $habitId): bool|string {
    $table = self::TABLE;
    $sql = "DELETE 
            FROM {$table}
            WHERE id = :id
    ";

    $stmt = $this->connection->prepare(query: $sql);
    $stmt->bindParam(':id', $habitId, PDO::PARAM_INT);

    try {
      return $stmt->execute();
    } catch (\PDOException $e) {
      return "Error on deleting product: " . $e->getMessage() . ". -- ";
    }
  }

  // soft delete
  public function softDelete(int|null $habitId): bool|string {
    $table = self::TABLE;
    $sql = "UPDATE {$table}
            SET is_active = false
            WHERE id = :id
    ";

    $stmt = $this->connection->prepare(query: $sql);
    $stmt->bindParam(':id', $habitId, PDO::PARAM_INT);

    try {
      return $stmt->execute();
    } catch (\PDOException $e) {
      return "Error on soft-deleting product: " . $e->getMessage() . ". -- ";
    }
  }

  // reset soft-deleted habit
  public function restore(int|null $habitId): bool|string {
    $table = self::TABLE;
    $sql = "UPDATE {$table}
            SET is_active = true
            WHERE id = :id
    ";

    $stmt = $this->connection->prepare(query: $sql);
    $stmt->bindParam(':id', $habitId, PDO::PARAM_INT);

    try {
      return $stmt->execute();
    } catch (\PDOException $e) {
      return "Error on deleting product: " . $e->getMessage() . ". -- ";
    }
  }

}