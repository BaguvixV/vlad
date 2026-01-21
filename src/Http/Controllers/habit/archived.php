<?php

use Core\Config;
use Core\Database;
use Models\Habit;


$loggedInUserEmail = $_SESSION['user']['email'] ?? null;

$db = new Database(config: Config::database());
$pdo = $db->connect();

$habitModel = new Habit(connection: $pdo);
$habits = $habitModel->readArchived();


renderView(
  path: 'habit/archived.view.php',
  data: [
   'heading' => 'Archived Habits',
   'loggedInUserEmail' => $loggedInUserEmail,
   'habits' => $habits
  ]
);