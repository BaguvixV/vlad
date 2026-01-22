<?php

use Core\Response;
use Core\Config;
use Core\Database;
use Models\Habit;
use Core\Sanitize;
use Http\Requests\CreateHabit;

// method Check (POST only)
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  abort(status: Response::METHOD_NOT_ALLOWED);
}

$dbModel = new Database(config: Config::database());
$pdo = $dbModel->connect();

$habitModel = new Habit(connection: $pdo);

$formValidatinModel = new CreateHabit(habit: $habitModel);


// sanitize $_POST inputs before validating
$category = Sanitize::string(input: $_POST['category']);
$title = Sanitize::string(input: $_POST['title']);
$description = Sanitize::string(input: $_POST['description']);

// habit form spicific validaiton
$isValid = $formValidatinModel->validateCreateFrom($category, $title, $description);

if (! $isValid) {
  $errors = $formValidatinModel->errors();
  $loggedInUserEmail = $_SESSION['user']['email'] ?? null;

  // Pass error and old form into the template
  renderView(
    'habit/index.view.php',[
      'old' => $_POST,
      'error' => $errors,
      'loggedInUserEmail' => $loggedInUserEmail,
      'heading' => "Create Your Own Habit",
      'generalError' => 'Validation Error!'
    ]
  );

  // Stop further proccess
  return;
}


// set data inside habit model
// TODO: somehow set user_id into habit. But does habit model needs to know user data?
$habitModel->category = $category;
$habitModel->title = $title;
$habitModel->description = $description;

// get user id from logged in user and set to variable to link that on creation
$loggedInUserID = $_SESSION['user']['id'] ?? null;

// crete habit for spefific user
if ($habitModel->create(forSpecificUser: $loggedInUserID)) {
  header('Location: /dashboard');
  exit;
}


// non-production / development error output
dd('Something went wrong on habit creation!');