<?php

use Core\Config;
use Core\Database;
use Core\Response;
use Models\Users;
use Models\Habit;


$loggedInUserEmail = $_SESSION['user']['email'] ?? null;


// Check logged-in user for allowance to see page content
if (! $loggedInUserEmail) {
  abort(Response::UNAUTHORIZED);
};


$db = new Database(config: Config::database());
$pdo = $db->connect();

$usersModel = new Users(connection: $pdo);
$habitModel = new Habit(connection: $pdo);

$user = $usersModel->findUserByEmail(localEmail: $loggedInUserEmail);
// TODO: $habits = $habitModel->readByUserID(userID: $user['id']);
$habits = $habitModel->read();


renderView(
  path: 'dashboard/index.view.php',
  data: [
    'loggedInUserEmail' => $loggedInUserEmail,
    'user' => $user,
    'habits' => $habits,
    'username' => $user['name'],
    'heading' => "{$user['name']}'s dashboard"
  ]
);