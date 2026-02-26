<?php

namespace Http\Controllers;

use Core\Auth;
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
      // Check logged-in user for allowance to see page content
      if (!Auth::email()) {
         abort(Response::UNAUTHORIZED);
      };

      $db = new Database(config: Config::database());
      $pdo = $db->connect();

      $usersModel = new Users(connection: $pdo);
      $habitsModel = new Habits(connection: $pdo);

      $user = $usersModel->findUserByEmail(localEmail: Auth::email());
      $habits = $habitsModel->findByUserId(userId: Auth::id());

      $this->renderView(
         path: 'dashboard/index.view.php',
         data: [
            'loggedInUserEmail' => Auth::email(),
            'user' => $user,
            'habits' => $habits,
            'username' => $user['name'],
            'heading' => "{$user['name']}'s dashboard"
         ]
      );
   }

   // render profile view
   public function profile($userId)
   {
      $userId = (int) $userId;

      $db = new Database(config: Config::database());
      $pdo = $db->connect();

      $usersModel = new Users(connection: $pdo);
      $user = $usersModel->findUserById($userId);

      if (! $user) {
         abort(Response::NOT_FOUND);
      }

      $this->renderView(
         path: 'profile/index.view.php',
         data: [
            'loggedInUserEmail' => Auth::email(),
            'user' => $user,
            'heading' => "{$user['name']}'s profile"
         ]
      );
   }
}