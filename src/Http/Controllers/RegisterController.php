<?php

namespace Http\Controllers;

use Core\Auth;
use Core\Response;
use Core\Config;
use Core\Database;
use Models\Users;
use Http\Requests\RegisterForm;
use Core\Sanitize;


class RegisterController extends \Core\Controller
{

   // render register page view
   public function index()
   {
      $this->renderView(
         path: 'auth/register/index.view.php',
         data: [
            'heading' => 'Register Page',
            'loggedInUserEmail' => Auth::email()
         ]
      );
   }


   // user register functionality
   public function store()
   {
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

      if (!$isValid) {
         $errors = $formValidatinModel->errors();

         // Pass error and old form into the template
         $this->renderView(
            'auth/register/index.view.php', [
               'old' => $_POST,
               'error' => $errors,
               'loggedInUserEmail' => Auth::email(),
               'heading' => "Register Page",
               'generalError' => 'Validation Error!'
            ]
         );

         // Stop further proccess
         return;
      }

      // Hash password based on local or production app statuses
      if ($_ENV['APP_ENV'] === 'local') {
         // Hash password (production UNSAFE but good as long as it is for development for faster password hashing time)
         $password_hash = password_hash($password, PASSWORD_DEFAULT, ['cost' => 4]);
      } else {
         // Hash password (production safe)
         $password_hash = password_hash($password, PASSWORD_DEFAULT);
      }

      // Convert age sanitizes number format inside string as an strict integer
      $age_int = (int)$age;

      $existingUserByProvidedEmil = $userModel->findUserByEmail(localEmail: $email);

      $existingUserByProvidedPhone = $userModel->findUserByPhone(localPhone: $phone);

      if ($existingUserByProvidedEmil) {
         // Pass error and old form into the template
         $this->renderView(
            'auth/register/index.view.php', [
               'old' => $_POST,
               'heading' => "Register Page",
               'loggedInUserEmail' => Auth::email(),
               'generalError' => 'Someone is already using this e-mail address'
            ]
         );

         // Stop further proccess
         return;
      }

      if ($existingUserByProvidedPhone) {
         // Pass error and old form into the template
         $this->renderView(
            'auth/register/index.view.php', [
               'old' => $_POST,
               'loggedInUserEmail' => Auth::email(),
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

      $userId = $userModel->register();

      // Create / Register user
      if ($userId) {
         Auth::login(id: $userId, email: $email);

         redirect('/dashboard');

      }

      dd('Something went wrong on user registration!');

   }
}