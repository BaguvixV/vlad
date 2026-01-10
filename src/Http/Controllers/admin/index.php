<?php

use Core\Config;
use Core\Database;
use Models\Users;


$loggedInUserEmail = $_SESSION['user']['email'] ?? null;

$db = new Database(config: Config::database());
$pdo = $db->connect();

$userModel = new Users(connection: $pdo);
$users = $userModel->read();


renderTemplate(
  path: 'admin/index.view.php',
  data: [
    'heading' => 'Admin page',
    'loggedInUserEmail' => $loggedInUserEmail,
    'users' => $users
  ]
);