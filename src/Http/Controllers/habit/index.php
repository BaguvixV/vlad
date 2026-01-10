<?php

use Core\Config;
use Core\Database;
use Models\Habit;


$loggedInUserEmail = $_SESSION['user']['email'] ?? null;

$db = new Database(config: Config::database());
$pdo = $db->connect();

$habitModel = new Habit(connection: $pdo);
$habits = $habitModel->read();


renderTemplate(
  path: 'habit/index.view.php',
  data: [
   'heading' => 'Habit Stats',
   'loggedInUserEmail' => $loggedInUserEmail,
   'habits' => $habits
  ]
);