<?php

// For easier debugging
function dd ($value) {
  echo '<pre>';
  var_dump($value);
  echo '</pre>';

  die;
}

function base_path(string $path): string {
  return BASE_PATH . $path;
}

function core(string $path): string {
  return base_path(path: "src/Core/{$path}");
}

function controller($path): string {
  return base_path(path: "src/Http/Controllers/{$path}");
}

function view(string $path): string {
  return base_path(path: "src/Views/{$path}");
}

/**
 * Render a PHP view with optional data
 *
 * @param string $path The relative path to the view file
 * @param array $data Optional associative array of data to pass to the view
 *                    Keys become variable names inside the view
 *
 * @throws Exception if the $path is empty
 */
function renderView(string $path, array $data = []): void {
  // Ensure a valid view path is provided
  if (empty($path)) {
    throw new Exception(message: "View path must not be empty.");
  }

  // Extract data array into variables for use within the view
  // e.g., ['errors' => ..., 'old' => ...] becomes $errors, $old in the view
  extract($data);

  // Include the resolved view file
  // view() is assumed to return the full file path for the view
  require view(path:  "pages/{$path}");
}

// Function to handle routing, the uri to one of these routes
function routeToController($uri, $routes) {
  if (array_key_exists(key: $uri, array: $routes)) {
    require $routes[$uri];
  } else {
    abort();
  }
}

// Option to abort wit the give status code
function abort($status = 404) {
  http_response_code(response_code: $status);

  require view(path: "error/{$status}.view.php");

  die();
}

function logout() {
  // Logout by clearing session superglobal, destroy file and deleting cookie
  $_SESSION = [];
  session_destroy();

  $params = session_get_cookie_params();
  setcookie('PHPSESSID', '', time() - 3000, $params['path'], $params['domain'], $params['secure'], $params['httponly']);

  header('Location: /login');
  exit();
}