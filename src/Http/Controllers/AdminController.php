<?php

namespace Http\Controllers;

use Core\Auth;
use Core\Response;
use Core\Sanitize;
use Http\Requests\LoginForm;

class AdminController extends \Core\Controller
{
   public function index()
   {
      $this->renderView(
         path: 'admin/index.view.php',
         data: [
            'heading' => 'Admin page',
            'loggedInUserEmail' => Auth::email()
         ]
      );
   }

   public function login() {
      if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
         abort(status: Response::METHOD_NOT_ALLOWED);
      }

      $usersModel = $this->usersModel();

      $formValidationModel = new LoginForm(user: $usersModel);

      $email = Sanitize::email($_POST['email']);
      $password = Sanitize::password($_POST['password']);

      $isValid = $formValidationModel->login($email, $password);

      if (!$isValid) {
         session_destroy();

         $error = $formValidationModel->errors();

         $this->renderView(
            path: 'admin/index.view.php',
            data: [
               'old' => $_POST,
               'error' => $error,
               'loggedInUserEmail' => Auth::email(),
               'heading' => 'Admin Page',
               'generalError' => 'Validation Error!'
            ]
         );

         // stop further process
         return;
      }

      $user = $usersModel->findUserByEmail(localEmail: $email);

      $checkEmail = $user['email'];
      $checkPassword = password_verify($password, $user['password']);

      if ($checkEmail === 'pinkman@gmail.com' && $checkPassword === true) {
         Auth::login(role: 'admin', id: $user['user_id'], email: $user['email']);

         redirect('/admin/dashboard');
      }

      session_destroy();

      $this->renderView(
         path: 'admin/index.view.php',
         data: [
            'old' => $_POST,
            'loggedInUserEmail' => Auth::email(),
            'heading' => 'Admin Page',
            'generalError' => 'No matching admin account found for that email address and password'
         ]
      );
   }

}