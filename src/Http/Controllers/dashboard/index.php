<?php

use Core\Config;
use Core\Database;
use Core\Response;
use Models\Users;


$loggedInUserEmail = $_SESSION['user']['email'] ?? null;


// Check if user exists and is active
if ($loggedInUserEmail === null) {
  abort(Response::FORBIDDEN);
};


$db = new Database(config: Config::database());
$pdo = $db->connect();

$usersModel = new Users(connection: $pdo);

$user = $usersModel->findUserByEmail($loggedInUserEmail);


renderTemplate(
  path: 'dashboard/index.view.php',
  data: [
    'loggedInUserEmail' => $loggedInUserEmail,
    'user' => $user,
    'username' => $user['name'],
    'heading' => "{$user['name']}'s dashboard"
  ]
);