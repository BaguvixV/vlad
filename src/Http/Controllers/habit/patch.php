<?php

use Core\Response;
use Core\Config;
use Core\Database;
use Models\Habit;


$loggedInUserEmail = $_SESSION['user']['email'] ?? null;

// check if user is logged in
if (! $loggedInUserEmail) {
  abort(Response::UNAUTHORIZED);
};

$getHabitId= $_GET['id'] ?? null;


$db = new Database(config: Config::Database());
$pdo = $db->connect();

$habitModel = new Habit($pdo);


$destroySpecificHabit = $habitModel->softDelete(habitId: $getHabitId);


if($destroySpecificHabit) {
  header('Location: /dashboard');
  exit();
} else {
  dd('Unable to soft-delete habit.');
}