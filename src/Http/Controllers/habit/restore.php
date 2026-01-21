<?php

use Core\Response;
use Core\Config;
use Core\Database;
use Models\Habit;


// method Check (POST only with PATCH method spoof)
if ($_SERVER['REQUEST_METHOD'] !== 'POST' && $_POST['__spoof_method'] !== 'PATCH') {
  abort(status: Response::METHOD_NOT_ALLOWED);
}


$getHabitId= $_GET['id'] ?? null;

$db = new Database(config: Config::Database());
$pdo = $db->connect();

$habitModel = new Habit(connection: $pdo);


$destroySpecificHabit = $habitModel->restore(habitId: $getHabitId);


if($destroySpecificHabit) {
  header('Location: /dashboard');
  exit();
}


dd('Unable to restore habit.');