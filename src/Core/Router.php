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
    $method = $this->request->getMethod();
    $url = $this->request->getUrl();

    $callback = $this->routes[$method][$url] ?? null;

    if (! $callback){
      abort();
    }

    $class = $callback[0];
    $method = $callback[1];
    $controller = new $class();

    call_user_func([$controller, $method]);

  }
}