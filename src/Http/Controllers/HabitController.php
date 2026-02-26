<?php

namespace Http\Controllers;

use Core\Auth;
use Core\Response;
use Core\Config;
use Core\Database;
use Models\Habits;
use Http\Requests\CreateHabit;
use Http\Requests\EditHabit;
use Core\Sanitize;


class HabitController extends \Core\Controller
{
   // render habit page view
   public function index()
   {
      $db = new Database(config: Config::database());
      $pdo = $db->connect();

      $habitsModel = new Habits(connection: $pdo);
      $habits = $habitsModel->read();

      $this->renderView(
         path: 'habit/index.view.php',
         data: [
            'heading' => 'Create Your Own Habit',
            'loggedInUserEmail' => Auth::email(),
            'habits' => $habits
         ]
      );
   }


   // habit creation functionality
   public function store()
   {
      // Method Check (POST only)
      if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
         abort(status: Response::METHOD_NOT_ALLOWED);
      }

      $db = new Database(config: Config::database());
      $pdo = $db->connect();

      $habitsModel = new Habits(connection: $pdo);

      $formValidatinModel = new CreateHabit(habit: $habitsModel);

      // sanitize $_POST inputs before validating
      $category = Sanitize::string(input: $_POST['category']);
      $title = Sanitize::string(input: $_POST['title']);
      $description = Sanitize::string(input: $_POST['description']);

      // Habit form spicific validaiton
      $isValid = $formValidatinModel->validateCreateFrom($category, $title, $description);

      // on validation error redirect back to page
      if (!$isValid) {
         $errors = $formValidatinModel->errors();

         // Pass error and old form into the template
         $this->renderView(
            'habit/index.view.php', [
               'old' => $_POST,
               'error' => $errors,
               'loggedInUserEmail' => Auth::email(),
               'heading' => "Create Your Own Habit",
               'generalError' => 'Validation Error!'
            ]
         );

         // Stop further proccess
         return;
      }

      // set data inside habit model
      $habitsModel->category = $category;
      $habitsModel->title = $title;
      $habitsModel->description = $description;

      // crete habit for spefific user
      if ($habitsModel->create(forSpecificUser: Auth::id())) {
         return redirect('/dashboard');
      }

      // fallback / non-production / development error output
      dd('Something went wrong on habit creation!');
   }


   // habit delete functionality
   public function destroy($habitId)
   {
      $habitId = (int) $habitId;

      // method Check (POST only with DELETE method spoof)
      if ($_SERVER['REQUEST_METHOD'] !== 'POST' || $_POST['__spoof_method'] !== 'DELETE') {
         abort(status: Response::METHOD_NOT_ALLOWED);
      }

      $db = new Database(config: Config::Database());
      $pdo = $db->connect();

      $habitsModel = new Habits(connection: $pdo);
      $destroySpecificHabit = $habitsModel->forceDelete(habitId: $habitId);

      if ($destroySpecificHabit) {
         return redirect('/archived');
      }

      // fallback / non-production / development error output
      dd('Unable to force-delete habit.');
   }


   // habit soft-delete functionality
   public function patch($habitId)
   {
      $habitId = (int) $habitId;

      // method Check (POST only with PATCH method spoof)
      if ($_SERVER['REQUEST_METHOD'] !== 'POST' || $_POST['__spoof_method'] !== 'PATCH') {
         abort(status: Response::METHOD_NOT_ALLOWED);
      }

      $db = new Database(config: Config::Database());
      $pdo = $db->connect();

      $habitsModel = new Habits(connection: $pdo);
      $softDeleteHabit = $habitsModel->softDelete(habitId: $habitId);

      if ($softDeleteHabit) {
         return redirect('/dashboard');
         exit();
      }

      // fallback / non-production / development error output
      dd('Unable to soft-delete habit.');
   }


   // show archived habits [possibly to restore some of the habits]
   public function archived()
   {
      $db = new Database(config: Config::database());
      $pdo = $db->connect();

      $habitsModel = new Habits(connection: $pdo);
      $habits = $habitsModel->findArchivedUserId(userId: Auth::id());

      $this->renderView(
         path: 'habit/archived.view.php',
         data: [
            'heading' => 'Archived Habits',
            'loggedInUserEmail' => Auth::email(),
            'habits' => $habits
         ]
      );
   }

   // habit restore functionality
   public function restore($habitId)
   {
      $habitId = (int) $habitId;

      // method Check (POST only with PATCH method spoof)
      if ($_SERVER['REQUEST_METHOD'] !== 'POST' || $_POST['__spoof_method'] !== 'PATCH') {
         abort(status: Response::METHOD_NOT_ALLOWED);
      }

      $db = new Database(config: Config::Database());
      $pdo = $db->connect();

      $habitsModel = new Habits(connection: $pdo);
      $restoreHabit = $habitsModel->restore(habitId: $habitId);

      if ($restoreHabit) {
         return redirect('/dashboard');
      }

      // fallback / non-production / development error output
      dd('Unable to restore habit.');
   }


   // habit update functionality
   public function put($habitId)
   {
      $habitId = (int) $habitId;

      // method Check (POST only with PUT method spoof)
      if ($_SERVER['REQUEST_METHOD'] !== 'POST' || $_POST['__spoof_method'] !== 'PUT') {
         abort(status: Response::METHOD_NOT_ALLOWED);
      }

      $db = new Database(config: Config::database());
      $pdo = $db->connect();

      $habitsModel = new Habits(connection: $pdo);
      $habit = $habitsModel->readById(habitId: $habitId);
      if (!$habit) {
         abort(status: Response::NOT_FOUND); // habit does not exist
      }
      $habit = $habit[0];

      // check ownership
      if ($habit['user_id'] !== Auth::id()) {
         abort(status: Response::FORBIDDEN); // only owner can edit
      }

      $formValidatinModel = new EditHabit(habit: $habitsModel);

      // sanitize $_POST inputs before validating
      $category = Sanitize::string(input: $_POST['category']);
      $title = Sanitize::string(input: $_POST['title']);
      $description = Sanitize::string(input: $_POST['description']);

      // habit form spicific validaiton
      $isValid = $formValidatinModel->validateEditFrom($category, $title, $description);

      if (!$isValid) {
         $errors = $formValidatinModel->errors();

         // Pass error and old form into the template
         $this->renderView(
            'habit/show.view.php', [
               'old' => $_POST,
               'error' => $errors,
               'loggedInUserEmail' => Auth::email(),
               'habit' => $habit,
               'heading' => "Editing Habit",
               'generalError' => 'Validation Error!'
            ]
         );

         // Stop further proccess
         return;
      }

      // set data inside habit model
      $habitsModel->category = $category;
      $habitsModel->title = $title;
      $habitsModel->description = $description;

      // edit habit using the route parameter
      if ($habitsModel->edit(id: $habitId)) {
         return redirect('/dashboard');
      }

      // fallback / non-production / development error output
      dd('Something went wrong on habit editing :)');
   }


   // show single habit page
   public function show($habitId)
   {
      $habitId = (int) $habitId;

      if (!Auth::email() || !Auth::id()) {
         abort(status: Response::UNAUTHORIZED);
      }

      $db = new Database(config: Config::Database());
      $pdo = $db->connect();

      $habitsModel = new Habits(connection: $pdo);
      $habit = $habitsModel->readById(habitId: $habitId);

      if (!$habit) {
         abort();
      } else {
         $habit = $habit[0];
      }

      if ($habit['user_id'] !== Auth::id()) {
         abort(status: Response::FORBIDDEN);
      }

      $this->renderView(
         path: 'habit/show.view.php',
         data: [
            'loggedInUserEmail' => Auth::email(),
            'habit' => $habit,
            'heading' => "Habit Nr.{$habitId}"
         ]
      );
   }
}