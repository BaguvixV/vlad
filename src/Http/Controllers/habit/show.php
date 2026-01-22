<?php

use Core\Config;
use Core\Database;
use Models\Habit;


$loggedInUserEmail = $_SESSION['user']['email'] ?? null;


$db = new Database(config: Config::Database());
$pdo = $db->connect();

$habitModel = new Habit(connection: $pdo);
$habit = $habitModel->readById(habitId: $_GET['id']);
$habit = $habit[0];


renderView(
  path: 'habit/show.view.php',
  data: [
    'loggedInUserEmail' => $loggedInUserEmail,
    'habit' => $habit,
    'heading' => "Habit Nr.{$habit['habit_id']}"
  ]
);