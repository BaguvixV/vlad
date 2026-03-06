<?php

namespace Http\Controllers;

use Core\Auth;
use Core\Response;
use Core\Sanitize;
use Http\Requests\LoginForm;
use Http\Requests\RegisterForm;

class AuthController extends \Core\Controller
{
   // GET /login
   public function showLogin() {
      $this->renderView(
         path: 'auth/login/index.view.php',
         data: [
            'heading' => 'Login Page',
            'loggedInUserEmail' => Auth::email()
         ]
      );
   }

   // POST /login
   public function login() {
      // Method Check (POST only)
      if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
         abort(status: Response::METHOD_NOT_ALLOWED);
      }

      $usersModel = $this->usersModel();

      $formValidatinModel = new LoginForm(user: $usersModel);

      // sanitize user's login input data
      $email = Sanitize::email($_POST['email']);
      $password = Sanitize::password($_POST['password']);

      // Login from-specific validation
      $isValid = $formValidatinModel->login($email, $password);

      // on validation error redirect back to page
      if (!$isValid) {
         session_destroy();

         $error = $formValidatinModel->errors();

         $this->renderView(
            path: 'auth/login/index.view.php',
            data: [
               'old' => $_POST,
               'error' => $error,
               'loggedInUserEmail' => Auth::email(),
               'heading' => 'Login Page',
               'generalError' => 'Validation Error!'
            ]
         );

         // stop further process
         return;
      }

      // get user data from database based on provided email input
      $user = $usersModel->findUserByEmail(localEmail: $email);

      // check if provided user exists and if so then check if password is legit. If both criteria is true then successfully log in
      if ($user && $user['email'] !== 'pinkman@gmail.com') {
         $legitPassword = password_verify($password, $user['password']);

         if ($legitPassword) {
            Auth::login(role: 'user', id: $user['user_id'], email: $user['email']);

            redirect('/dashboard');
         }
      }


      // ... else redirect back with error

      session_destroy();

      $this->renderView(
         path: 'auth/login/index.view.php',
         data: [
            'old' => $_POST,
            'loggedInUserEmail' => Auth::email(),
            'heading' => 'Login Page',
            'generalError' => 'No matching account found for that email address and password'
         ]
      );

      // stop further process
      return;
   }

   // GET /register
   public function showRegister() {
      $this->renderView(
         path: 'auth/register/index.view.php',
         data: [
            'heading' => 'Register Page',
            'loggedInUserEmail' => Auth::email()
         ]
      );
   }

   // POST /register
   public function register() {
      // Method Check (POST only)
      if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
         abort(status: Response::METHOD_NOT_ALLOWED);
      }

      $usersModel = $this->usersModel();

      $formValidatinModel = new RegisterForm(user: $usersModel);

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

      $existingUserByProvidedEmil = $usersModel->findUserByEmail(localEmail: $email);

      $existingUserByProvidedPhone = $usersModel->findUserByPhone(localPhone: $phone);

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
      $usersModel->name = $name;
      $usersModel->surname = $surname;
      $usersModel->age = $age_int;
      $usersModel->email = $email;
      $usersModel->password = $password_hash;
      $usersModel->phone = $phone;

      $userId = $usersModel->register();

      // Create / Register user
      if ($userId) {
         Auth::login(role: 'user', id: $userId, email: $email);

         redirect('/dashboard');

      }

      dd('Something went wrong on user registration!');
   }

   // POST /logout
   public function logout() {
      Auth::logout();

      redirect('/login');
   }
}