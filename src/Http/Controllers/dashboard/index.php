<?php

use Core\Config;
use Core\Database;
use Core\Response;
use Models\Users;


$loggedInUserEmail = $_SESSION['user']['email'] ?? null;


// Check logged-in user for allowance to see page content
if (! $loggedInUserEmail) {
  abort(Response::UNAUTHORIZED);
};


$db = new Database(config: Config::database());
$pdo = $db->connect();

$usersModel = new Users(connection: $pdo);

$user = $usersModel->findUserByEmail($loggedInUserEmail);


renderView(
  path: 'dashboard/index.view.php',
  data: [
    'loggedInUserEmail' => $loggedInUserEmail,
    'user' => $user,
    'username' => $user['name'],
    'heading' => "{$user['name']}'s dashboard"
  ]
);