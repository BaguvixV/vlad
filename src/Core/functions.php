<?php

// For easier debugging
function dd($value) {
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

function abort(int $status = 404): void {
  http_response_code($status);
  require view("error/{$status}.view.php");
  die();
}