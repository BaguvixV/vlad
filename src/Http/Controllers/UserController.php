<?php

namespace Http\Controllers;

use Core\Auth;
use Core\Response;

class UserController extends \Core\Controller
{
   // render dashboard view
   public function userDashboard()
   {
      // Check logged-in user for allowance to see page content
      if (!Auth::email()) {
         abort(Response::UNAUTHORIZED);
      };

      $usersModel = $this->usersModel();
      $habitsModel = $this->habitsModel();

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
   public function publicUserProfile($userId)
   {
      $userId = (int) $userId;

      $usersModel = $this->usersModel();

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

   public function adminDashboard()
   {
      // Check logged-in user for allowance to see page content
      if (!Auth::email()) {
         abort(Response::UNAUTHORIZED);
      };

      if(Auth::role() !== 'admin') {
         abort(Response::FORBIDDEN);
      }

      $usersModel = $this->usersModel();
      $habitsModel = $this->habitsModel();

      $user = $usersModel->findUserByEmail(localEmail: Auth::email());
      $users = $usersModel->read();
      $habits = $habitsModel->findByUserId(userId: Auth::id());

      $this->renderView(
         path: 'admin/show.view.php',
         data: [
            'loggedInUserEmail' => Auth::email(),
            'user' => $user,
            'users' => $users,
            'habits' => $habits,
            'username' => $user['name'],
            'heading' => "{$user['name']}'s extras"
         ]
      );
   }
}