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

$validate = new RegisterForm(user: $userModel);


// Sanitize variables before validating
$name = Sanitize::string(input: $_POST['name']);
$surname = Sanitize::string(input: $_POST['surname']);
$age = Sanitize::integer(input: $_POST['age']);
$email = Sanitize::email(input: $_POST['email']);
$password = Sanitize::password($_POST['password']);
$repeatedPassword = Sanitize::password($_POST['rePassword']);
$phone = Sanitize::string(input: $_POST['phone']);

// use sanitized email data to find existing DB email and return as an array
$dbEmailArray = $userModel->findUsersEmail(localEmail: $email);

// get string output from $dbEmailArray array output. If specified DB email not found return null.
$dbEmail = $dbEmailArray['email'] ?? null;

// use sanitized phone data to find existing DB phone and return as an array
$dbPhoneArray = $userModel->findUsersPhone(localPhone: $phone);

// get string output from $dbPhoneArray array output. If specified DB phone not found return null
$dbPhone = $dbPhoneArray['phone'] ?? null;


// Authentication from-specific validation
$isValid = $validate->register($name, $surname, $age, $email, $dbEmail, $password, $repeatedPassword, $phone, $dbPhone);


if (! $isValid) {
  $errors = $validate->errors();
  $loggedInUserEmail = $_SESSION['user']['email'] ?? null;

  // Pass error and old form into the template
  renderTemplate(
    'auth/register/index.view.php',[
      'heading' => "Register Page (`store.php` in progress)",
      'error' => $errors,
      'loggedInUserEmail' => $loggedInUserEmail,
      'old' => $_POST
    ]
  );

  // Stop further proccess
  return;
}

// Hash password
$password_hash = password_hash($password, PASSWORD_DEFAULT);

// Convert age sanitizez number format inside string as an strict integer
$age_int = (int)$age;

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

} else {
  dd('Something went wrong on user registration!');
}