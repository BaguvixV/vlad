<?php

namespace Models;

use Core\Model;


class Product extends Model {

  private string $titleBacking;
  private string $descriptionBacking;
  private string $priceBacking;

  public string $title {
    get => $this->titleBacking;
    set => $this->titleBacking = strtoupper($value);
  }

  public string $description {
    get => $this->descriptionBacking;
    set => $this->descriptionBacking = $value;
  }

  public int $price {
    get => $this->priceBacking;
    set => $value > 0
        ? $this->priceBacking = $value
        : throw new \DomainException('Cena nevar būt mīnusā.');
  }

}