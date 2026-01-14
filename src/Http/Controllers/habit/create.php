<?php

use Core\Config;
use Core\Database;
use Models\Habit;


$loggedInUserEmail = $_SESSION['user']['email'] ?? null;

$db = new Database(config: Config::database());
$pdo = $db->connect();

$habitModel = new Habit(connection: $pdo);
$habits = $habitModel->read();


renderView(
  path: 'habit/index.view.php',
  data: [
   'heading' => 'Create Your Own Habit',
   'loggedInUserEmail' => $loggedInUserEmail,
   'habits' => $habits
  ]
);