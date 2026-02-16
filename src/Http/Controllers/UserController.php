<?php

namespace Http\Controllers;

use Core\Config;
use Core\Database;
use Core\Response;
use Models\Users;
use Models\Habits;


class UserController extends \Core\Controller
{
   // render dashboard view
   public function dashboard()
   {
      $loggedInUserEmail = $_SESSION['user']['email'] ?? null;
      $loggedInUserID = $_SESSION['user']['id'] ?? null;

      // Check logged-in user for allowance to see page content
      if (!$loggedInUserEmail) {
         abort(Response::UNAUTHORIZED);
      };


      $db = new Database(config: Config::database());
      $pdo = $db->connect();

      $usersModel = new Users(connection: $pdo);
      $habitsModel = new Habits(connection: $pdo);

      $user = $usersModel->findUserByEmail(localEmail: $loggedInUserEmail);
      $habits = $habitsModel->findByUserId(userId: $loggedInUserID);

      $this->renderView(
         path: 'dashboard/index.view.php',
         data: [
            'loggedInUserEmail' => $loggedInUserEmail,
            'user' => $user,
            'habits' => $habits,
            'username' => $user['name'],
            'heading' => "{$user['name']}'s dashboard"
         ]
      );
   }

   // render profile view
   public function profile()
   {
      dd('Profile page');
   }
}