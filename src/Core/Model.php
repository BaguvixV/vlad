<?php

namespace Core;

use Core\Database;
use PDO;

abstract class Model {
  protected ?PDO $connection = null;

  public function __construct() {
    // For now DB connection is established here, but later it can be lazy-loaded
    $this->connection = (new Database())->getConnection();
  }
}