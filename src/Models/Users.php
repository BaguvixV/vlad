<?php

namespace Models;

use PDO;


class Users
{
    private const TABLE = 'users';
    private string $nameBacking;
    private string $surnameBacking;
    private int $ageBacking;
    private string $emailBacking;
    private string $passwordBacking;
    private string $phoneBacking;
    private string $bioBacking;
    private bool $isActiveBacking;

    public function __construct(private ?PDO $connection = null)
    {
        // intentionaly empty (PHP 8.0 feature that allows Constructor Property Promotion)
    }

    // Property Hooks feature below (intorduced in PHP 8.4)
    public string $name
        {
            get => $this->nameBacking ?? 'empy placeholder';
            set => $this->nameBacking = ucfirst(string: strtolower(string: $value));
        }

    public string $surname
        {
            get => $this->surnameBacking ?? 'empy placeholder';
            set => $this->surnameBacking = ucfirst(string: strtolower(string: $value));
        }

    public int $age
        {
            get => $this->ageBacking ?? 'empy placeholder';
            set => $this->ageBacking = $value;
        }

    public string $email
        {
            get => $this->emailBacking ?? 'empy placeholder';
            set => $this->emailBacking = strtolower(string: $value);
        }

    public string $password
        {
            get => $this->passwordBacking ?? 'empy placeholder';
            set => $this->passwordBacking = $value;
        }

    public string $phone
        {
            get => $this->phoneBacking ?? 'empy placeholder';
            set => $this->phoneBacking = $value;
        }

    public string $bio
        {
            get => $this->bioBacking ?? 'empy placeholder';
            set => $this->bioBacking = $value;
        }

    public bool $isActive
        {
            get => $this->isActiveBacking ?? 'empy placeholder';
            set => $this->isActiveBacking = (bool)$value;
        }


    public function read(): array
    {
        $table = self::TABLE;
        $sql = "SELECT * FROM {$table}";

        $stmt = $this->connection->prepare(query: $sql);
        $stmt->execute();

        return $stmt->fetchAll(mode: PDO::FETCH_ASSOC);
    }


    public function findUserByEmail(?string $localEmail): ?array
    {
        $table = self::TABLE;
        $sql = "SELECT *
            FROM {$table}
            WHERE email = :email
    ";

        $stmt = $this->connection->prepare(query: $sql);
        $stmt->bindParam(':email', $localEmail);
        $stmt->execute();

        $output = $stmt->fetch(mode: PDO::FETCH_ASSOC);

        return $output ? $output : null;
    }


    public function findUserByPhone(?string $localPhone): ?array
    {
        $table = self::TABLE;
        $sql = "SELECT *
            FROM {$table}
            WHERE phone = :phone
    ";

        $stmt = $this->connection->prepare(query: $sql);
        $stmt->bindParam(':phone', $localPhone);
        $stmt->execute();

        $output = $stmt->fetch(mode: PDO::FETCH_ASSOC);

        return $output ? $output : null;
    }

   public function findUserById(int|null $value): array|null
   {
      $table = self::TABLE;
      $sql = "SELECT *
            FROM {$table}
            WHERE user_id = :id
    ";

      $stmt = $this->connection->prepare(query: $sql);
      $stmt->bindParam(':id', $value);
      $stmt->execute();

      $output = $stmt->fetch(mode: PDO::FETCH_ASSOC);

      return $output ? $output : null;
   }


    public function register(): bool
    {
        $table = self::TABLE;
        $sql = "INSERT INTO {$table}
            (name, surname, age, email, password, phone)
            VALUES (:name, :surname, :age, :email, :password, :phone)
    ";

        // prepare SQL
        $stmt = $this->connection->prepare(query: $sql);

        // insert data
        return $stmt->execute([
            ':name' => $this->nameBacking,
            ':surname' => $this->surnameBacking,
            ':age' => $this->ageBacking,
            ':email' => $this->emailBacking,
            ':password' => $this->passwordBacking,
            ':phone' => $this->phoneBacking
        ]);
    }

}