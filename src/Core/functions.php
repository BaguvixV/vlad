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
function renderView(string $path, array $data = []) {
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

function controller($path): string {
  return base_path(path: "src/Controllers/{$path}");
}