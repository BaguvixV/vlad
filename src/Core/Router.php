<?php

namespace Core;

class Router {
  private $routes = [];

  public function add(string $metohd, string $uri, string $controller) {
    $this->routes[] = [
      'method' => $metohd,
      'uri' => $uri,
      'controller' => $controller
    ];
  }

  public function get(string $uri, string $controller): void {
    $this->add('GET', $uri, $controller);
  }

  public function post(string $uri, string $controller): void {
    $this->add('POST', $uri, $controller);
  }

  public function delete(string $uri, string $controller): void {
    $this->add('DELETE', $uri, $controller);
  }

  // Update fully
  public function put(string $uri, string $controller): void {
    $this->add('PUT', $uri, $controller);
  }

  // Update partially
  public function patch(string $uri, string $controller): void {
    $this->add('PATCH', $uri, $controller);
  }

  public function route(string $uri, string $method): mixed {
    // method spoofing
    if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['__spoof_method'])) {
      $method = $_POST['__spoof_method'];
    }

    // route matching
    foreach($this->routes as $route) {
      /**
        * Convert route URI placeholders like '/habits/{id}' into regex patterns like '/habits/(\d+)'
        * This will allow to match dynamic values (like /habits/1, /habits/42, etc.)
        * preg_replace - turns route like /habits/{id} into /habits/(\d+)
        * preg_match - checks if the URI matches, and saves captured numbers in $matches[1]
        * $id = $matches[1] - grabs the actual number you matched
        * $_GET['id'] = $id - makes it accessible in controller as $_GET['id']
        */
      $pattern = preg_replace('/\{[a-zA-Z_]+\}/', '(\d+)', $route['uri']);

      // check if the current route matches both URI patern and the HTTP method
      if(preg_match("#^{$pattern}$#", $uri, $matches) && $route['method'] === strtoupper($method)) {
        
        // only assign $_GET['id'] if there's a {id} in the route
        if(strpos($route['uri'], '{id}') !== false) {

          // capture the dynamic value from the URI. The actual (like 42 in /habits/42) is stored in $matches[1] by preg_match
          $id = $matches[1];
          $_GET['id'] = $id;
        }

        // load the corresponding controller
        return require controller(path: $route['controller']);
      }
    }

    $this->abort();
  }

  // option to abort wit the give status code
  protected function abort(int $status = 404) {
    http_response_code(response_code: $status);

    require view(path: "error/{$status}.view.php");

    die();
  }

}