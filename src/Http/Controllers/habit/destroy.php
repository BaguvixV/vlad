<?php

use Core\Response;
use Core\Config;
use Core\Database;
use Models\Habit;


// method Check (POST only with DELETE method spoof)
if ($_SERVER['REQUEST_METHOD'] !== 'POST' && $_POST['__spoof_method'] !== 'DELETE') {
  abort(status: Response::METHOD_NOT_ALLOWED);
}


$getHabitId= $_GET['id'] ?? null;

$db = new Database(config: Config::Database());
$pdo = $db->connect();

$habitModel = new Habit(connection: $pdo);


$destroySpecificHabit = $habitModel->forceDelete(habitId: $getHabitId);


if($destroySpecificHabit) {
  header('Location: /archived');
  exit();
}


dd('Unable to force-delete habit.');