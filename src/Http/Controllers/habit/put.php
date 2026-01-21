<?php

use Core\Response;
use Core\Config;
use Core\Database;
use Models\Habit;
use Core\Sanitize;
use Http\Requests\EditHabit;


// method Check (POST only with PUT method spoof)
if ($_SERVER['REQUEST_METHOD'] !== 'POST' && $_POST['__spoof_method'] !== 'PUT') {
  abort(status: Response::METHOD_NOT_ALLOWED);
}


$db = new Database(config: Config::database());
$pdo = $db->connect();

$habitModel = new Habit(connection: $pdo);
$habit = $habitModel->readHabitById(habitId: $_GET['id']);
$habit = $habit[0];

$formValidatinModel = new EditHabit(habit: $habitModel);


// sanitize $_POST inputs before validating
$category = Sanitize::string(input: $_POST['category']);
$title = Sanitize::string(input: $_POST['title']);
$description = Sanitize::string(input: $_POST['description']);


// habit form spicific validaiton
$isValid = $formValidatinModel->validateEditFrom($category, $title, $description);

if (! $isValid) {
  $errors = $formValidatinModel->errors();
  $loggedInUserEmail = $_SESSION['user']['email'] ?? null;

  // Pass error and old form into the template
  renderView(
    'habit/show.view.php',[
      'old' => $_POST,
      'error' => $errors,
      'loggedInUserEmail' => $loggedInUserEmail,
      'habit' => $habit,
      'heading' => "Editing Habit",
      'generalError' => 'Validation Error!'
    ]
  );

  // Stop further proccess
  return;
}


// set data inside habit model
$habitModel->category = $category;
$habitModel->title = $title;
$habitModel->description = $description;


// crete habit
if ($habitModel->edit(habitId: $habit['id'])) {
  header('Location: /dashboard');
  exit;
}


// non-production / development error output 
dd('Something went wrong on habit editing :)');