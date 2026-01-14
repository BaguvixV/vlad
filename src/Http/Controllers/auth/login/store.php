<?php

use Core\Response;
use Core\Config;
use Core\Database;
use Models\Users;
use Core\Sanitize;
use Http\Requests\LoginForm;


if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  abort(Response::METHOD_NOT_ALLOWED);
}


$db = new Database(config: Config::Database());
$pdo = $db->connect();

$userModel = new Users(connection: $pdo);

$loginFormModel = new LoginForm(user: $userModel);


// sanitize user's login input data
$email = Sanitize::email($_POST['email']);
$password = Sanitize::password($_POST['password']);


$isValid = $loginFormModel->login($email, $password);

// on validation error redirect back to page
if (! $isValid) {
  session_destroy();

  $error = $loginFormModel->errors();
  $loggedInUserEmail = $_SESSION['user']['email'] ?? null;

  renderView(
    path: 'auth/login/index.view.php',
    data: [
      'old' => $_POST,
      'error' => $error,
      'loggedInUserEmail' => $loggedInUserEmail,
      'heading' => 'Login Page',
      'errorHeading' => 'Validation Error',
      'generalError' => $error['auth']
    ]
  );

  // stop further process
  return;
}


// get user data from database based on provided email input
$user = $userModel->findUserByEmail(localEmail: $email);

// check if provided user exists and if so then check if password is legit. If both criteria is true then successfully log in
if ($user) {
  $legitPassword = password_verify($password, $user['password']);

  if ($legitPassword) {
    
    $_SESSION['user'] = [
      'id' => $user['id'],
      'name' => $user['name'],
      'email' => $user['email'],
      'is_active' => $user['is_active'],
    ];

    header('Location: /dashboard');
    exit();
  }
}


// ... else redirect back with error

session_destroy();

$loggedInUserEmail = $_SESSION['user']['email'] ?? null;

renderView(
  path: 'auth/login/index.view.php',
  data: [
    'old' => $_POST,
    'loggedInUserEmail' => $loggedInUserEmail,
    'heading' => 'Login Page',
    'errorHeading' => 'Authentication Error',
    'generalError' => 'No matching account found for that email address and password'
  ]
);

// stop further process
return;