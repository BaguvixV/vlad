<?php

use Core\Config;
use Core\Database;
use Core\Response;
use Core\Sanitize;
use Http\Requests\RegisterForm;
use Models\Users;


// Method Check (POST only)
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  abort(status: Response::METHOD_NOT_ALLOWED);
}


$db = new Database(config: Config::database());
$pdo = $db->connect();

$userModel = new Users(connection: $pdo);

$formValidatinModel = new RegisterForm(user: $userModel);


// Sanitize variables before validating
$name = Sanitize::string(input: $_POST['name']);
$surname = Sanitize::string(input: $_POST['surname']);
$age = Sanitize::integer(input: $_POST['age']);
$email = Sanitize::email(input: $_POST['email']);
$password = Sanitize::password($_POST['password']);
$repeatedPassword = Sanitize::password($_POST['rePassword']);
$phone = Sanitize::string(input: $_POST['phone']);


// Register from-specific validation
$isValid = $formValidatinModel->register($name, $surname, $age, $email, $password, $repeatedPassword, $phone);


if (! $isValid) {
  $errors = $formValidatinModel->errors();
  $loggedInUserEmail = $_SESSION['user']['email'] ?? null;

  // Pass error and old form into the template
  renderView(
    'auth/register/index.view.php',[
      'old' => $_POST,
      'error' => $errors,
      'loggedInUserEmail' => $loggedInUserEmail,
      'heading' => "Register Page",
      'generalError' => 'Validation Error!'
    ]
  );

  // Stop further proccess
  return;
}

// Hash password
$password_hash = password_hash($password, PASSWORD_DEFAULT);

// Convert age sanitizez number format inside string as an strict integer
$age_int = (int)$age;


$existingUserByProvidedEmil = $userModel->findUserByEmail(localEmail: $email);

$existingUserByProvidedPhone = $userModel->findUserByPhone(localPhone: $phone);


if ($existingUserByProvidedEmil) {
  $loggedInUserEmail = $_SESSION['user']['email'] ?? null;

  // Pass error and old form into the template
  renderView(
    'auth/register/index.view.php',[
      'old' => $_POST,
      'heading' => "Register Page",
      'loggedInUserEmail' => $loggedInUserEmail,
      'generalError' => 'Someone is already using this e-mail address'
    ]
  );

  // Stop further proccess
  return;
}

if ($existingUserByProvidedPhone) {
  $loggedInUserEmail = $_SESSION['user']['email'] ?? null;

  // Pass error and old form into the template
  renderView(
    'auth/register/index.view.php',[
      'old' => $_POST,
      'loggedInUserEmail' => $loggedInUserEmail,
      'heading' => "Register Page",
      'generalError' => 'Someone is already using this phone number'
    ]
  );

  // Stop further proccess
  return;
}


// Set data inside User Model
$userModel->name = $name;
$userModel->surname = $surname;
$userModel->age = $age_int;
$userModel->email = $email;
$userModel->password = $password_hash;
$userModel->phone = $phone;


// Create / Register user
if ($userModel->register()) {

  $createdUserInfo = $userModel->findUserByEmail($userModel->email);

  $_SESSION['user'] = [
    'id' => $createdUserInfo['id'],
    'name' => $createdUserInfo['name'],
    'email' => $createdUserInfo['email'],
    'is_active' => $createdUserInfo['is_active'],
  ];

  header('Location: /dashboard');
  exit();

}

dd('Something went wrong on user registration!');