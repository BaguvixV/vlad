<?php

namespace Core;


class Router
{
   private array $routes = [];

   public function __construct(public Request $request)
   {
      // intentionaly empty (PHP 8.0 feature that allows Constructor Property Promotion)
   }

   public function get(string $url, array $callback): void
   {
      $this->routes['GET'][$url] = $callback;
   }

   public function post(string $url, array $callback): void
   {
      $this->routes['POST'][$url] = $callback;
   }

   public function put(string $url, array $callback): void
   {
      $this->routes['PUT'][$url] = $callback;
   }

   public function patch(string $url, array $callback): void
   {
      $this->routes['PATCH'][$url] = $callback;
   }

   public function delete(string $url, array $callback): void
   {
      $this->routes['DELETE'][$url] = $callback;
   }


   public function resolve(): void
   {
      $httpMethod = $this->request->getMethod();
      $url = $this->request->getUrl();

      $routes = $this->routes[$httpMethod] ?? [];

      // Route matching
      foreach ($routes as $route => $callback) {
         // Convert route placeholders like {slug} to regex
         $pattern = preg_replace('/\{[a-zA-Z_]+\}/', '([a-zA-Z0-9_-]+)', $route);

         // Check if the current route matches URI pattern
         if (preg_match("#^{$pattern}$#", $url, $matches)) {
            preg_match_all('/\{([a-zA-Z_]+)\}/', $route, $paramNames);
            array_shift($matches);
            $params = [];

            foreach ($paramNames[1] as $index => $name) {
               $params[$name] = $matches[$index] ?? null;
            }

            $class = $callback[0];
            $action = $callback[1];

            $controller = new $class();

            if (!is_callable([$controller, $action])) {
               abort(Response::METHOD_NOT_ALLOWED);
            }

            $controller->$action(...array_values($params));

            return;
         }
      }

      abort();
   }
}