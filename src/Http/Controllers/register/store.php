<?php

use Core\Config;
use Core\Database;
use Http\Requests\RegisterForm;
use Models\User;


// Method Check (POST only)
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  abort(status: 405);
}


$db = new Database(config: Config::database());
$pdo = $db->connect();

$userModel = new User(connection: $pdo);

$validate = new RegisterForm(user: $userModel);


$name = RegisterForm::Validate(inputData: $_POST['name']);
$surname = RegisterForm::Validate(inputData: $_POST['surname']);
$age = RegisterForm::Validate(inputData: $_POST['age']);
$email = RegisterForm::Validate(inputData: $_POST['email']);
$rawPassword = $_POST['password'];
$rePassword = $_POST['rePassword'];
$phone = RegisterForm::Validate(inputData: $_POST['phone']);


$isValid = $validate->register(name: $name, surname: $surname, age: $age, email: $email, password: $rawPassword, rePassword: $rePassword, phone: $phone);
dd($isValid);

// dd($isValid);
if (! $isValid) {
  // for testing purposes
  return 'Validation error.';
}


// Hash password
// $password = '';


// Set data inside User Model
//


// Create / Register user
//


renderTemplate(
  path: 'auth/register/index.view.php',
data: [
   'heading' => 'Register Page'
  ]
);