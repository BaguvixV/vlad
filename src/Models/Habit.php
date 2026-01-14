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
  public function read(): ?array {
    $table = self::TABLE;
    $sql = "SELECT * FROM {$table}";

    $stmt = $this->connection->prepare(query: $sql);
    $stmt->execute();

    $output = $stmt->fetchAll(mode: PDO::FETCH_ASSOC);

    return $output ? $output : null;
  }

  // public function readHabitByID($habitId): ?array {
  public function readHabitById($habitId) {
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
  public function forceDelete(?int $habitId): bool {
    $table = self::TABLE;
    $sql = "DELETE 
            FROM {$table}
            WHERE id = :id
    ";

    $stmt = $this->connection->prepare(query: $sql);
    $stmt->bindParam(':id', $habitId, PDO::PARAM_INT);
    $stmt->execute();

    try {
      return $stmt->execute();
    } catch (PDOException $e) {
      return "Error on deleting product: " . $e->getMessage() . ". -- ";
    }
  }

  // soft delete
  public function softDelete(?int $habitId): bool {
    $table = self::TABLE;
    $sql = "UPDATE {$table}
            SET is_active = false
            WHERE id = :id
    ";

    $stmt = $this->connection->prepare(query: $sql);
    $stmt->bindParam(':id', $habitId, PDO::PARAM_INT);
    $stmt->execute();

    try {
      return $stmt->execute();
    } catch (PDOException $e) {
      return "Error on soft-deleting product: " . $e->getMessage() . ". -- ";
    }
  }

  // reset soft-deleted habit
  public function restore(?int $habitId): bool {
    $table = self::TABLE;
    $sql = "UPDATE {$table}
            SET is_active = true
            WHERE id = :id
    ";

    $stmt = $this->connection->prepare(query: $sql);
    $stmt->bindParam(':id', $habitId, PDO::PARAM_INT);
    $stmt->execute();

    try {
      return $stmt->execute();
    } catch (PDOException $e) {
      return "Error on deleting product: " . $e->getMessage() . ". -- ";
    }
  }

}