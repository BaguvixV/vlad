<?php

use Core\Config;
use Core\Database;
use Models\Habit;

$db = new Database(config: Config::database());
$pdo = $db->connect();

$habitModel = new Habit(connection: $pdo);
$habits = $habitModel->read();


renderView(
  path: 'habit/index.view.php',
  data: [
   'heading' => 'Habit Stats',
   'habits' => $habits
  ]
);