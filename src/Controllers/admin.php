<?php

use Core\Config;
use Core\Database;
use Models\User;

$db = new Database(config: Config::database());
$pdo = $db->connect();

$userModel = new User(connection: $pdo);
$users = $userModel->read();


renderView(
  path: 'admin/index.view.php',
  data: [
   'heading' => 'Admin page',
   'users' => $users
  ]
);