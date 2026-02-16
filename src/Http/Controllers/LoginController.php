<?php

namespace Http\Controllers;

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
      $loggedInUserEmail = $_SESSION['user']['email'] ?? null;

      $this->renderView(
         path: 'auth/login/index.view.php',
         data: [
            'heading' => 'Login Page',
            'loggedInUserEmail' => $loggedInUserEmail
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
         $loggedInUserEmail = $_SESSION['user']['email'] ?? null;

         $this->renderView(
            path: 'auth/login/index.view.php',
            data: [
               'old' => $_POST,
               'error' => $error,
               'loggedInUserEmail' => $loggedInUserEmail,
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

            $_SESSION['user'] = [
               'id' => $user['user_id'],
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
            'generalError' => 'No matching account found for that email address and password'
         ]
      );

      // stop further process
      return;
   }


   // user logout functionality
   public function logout()
   {
      // Logout by clearing session superglobal, destroy file and deleting cookie
      $_SESSION = [];
      session_destroy();

      $params = session_get_cookie_params();
      setcookie('PHPSESSID', '', time() - 3000, $params['path'], $params['domain'], $params['secure'], $params['httponly']);

      header('Location: /login');
      exit();
   }
}