<?php

namespace Models;

use Core\Model;


class User extends Model {

  private string $nameBacking;
  private string $surnameBacking;
  private string $emailBacking;
  private int $ageBacking;

  public string $name {
    get => $this->nameBacking;
    set => $this->nameBacking = ucfirst(strtolower($value));
  }

  public string $surname {
    get => $this->surnameBacking;
    set => $this->surnameBacking = ucfirst(strtolower($value));
  }

  public int $age {
    get => $this->ageBacking;
    set => $value > 0
        ? $this->ageBacking = $value
        : throw new \DomainException('Vecums nevar būt mīnusā.');
  }

  public string $email {
    get => $this->emailBacking;
    set => $this->emailBacking = strtolower($value);
  }

}