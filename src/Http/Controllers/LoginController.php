<?php

namespace Http\Controllers;

use Core\Auth;
use Core\Response;
use Core\Config;
use Core\Database;
use Models\Users;
use Http\Requests\LoginForm;
use Core\Sanitize;


class LoginController extends \Core\Controller
{
   // render login page view
   public function index()
   {
      $this->renderView(
         path: 'auth/login/index.view.php',
         data: [
            'heading' => 'Login Page',
            'loggedInUserEmail' => Auth::email()
         ]
      );
   }


   // user logging in functionality
   public function store()
   {
      // Method Check (POST only)
      if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
         abort(status: Response::METHOD_NOT_ALLOWED);
      }

      $db = new Database(config: Config::database());
      $pdo = $db->connect();

      $userModel = new Users(connection: $pdo);

      $formValidatinModel = new LoginForm(user: $userModel);

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
      $user = $userModel->findUserByEmail(localEmail: $email);

      // check if provided user exists and if so then check if password is legit. If both criteria is true then successfully log in
      if ($user) {
         $legitPassword = password_verify($password, $user['password']);

         if ($legitPassword) {
            Auth::login(id: $user['user_id'], email: $user['email']);

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


   // user logout functionality
   public function logout()
   {
      Auth::logout();

      redirect('/login');
   }
}