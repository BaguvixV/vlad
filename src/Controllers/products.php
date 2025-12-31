<?php

use Core\Database;
use Core\Config;

// Later this will be placed in container to prevent database connection dublication in each controller file
$databaseConfig = Config::database();
$pdo = new Database(
  host: $databaseConfig['host'],
  port: $databaseConfig['port'],
  database: $databaseConfig['dbname'],
  charset: $databaseConfig['charset'],
  username: $databaseConfig['username'],
  password: $databaseConfig['password']
);

$pdo->getConnection();


renderView(path: 'products/index.view.php', data: [
   'heading' => 'Product list',
]);