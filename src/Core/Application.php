<?php

namespace Core;

use Core\Router;


class Application
{
   private Request $request;
   private Router $router;

   public function __construct()
   {
      $this->request = new Request();
      $this->router = new Router($this->request);

      $this->registerRoutes();
   }

   public function run(): void
   {
      $this->router->resolve();
   }

   private function registerRoutes(): void
   {
      $this->router->get(url: '/', callback: ['Http\Controllers\HomeController', 'index']);
      $this->router->get(url: '/about', callback: ['Http\Controllers\AboutController', 'index']);

      $this->router->get(url: '/4dm1n', callback: ['Http\Controllers\AdminController', 'index']);

      $this->router->get(url: '/register', callback: ['Http\Controllers\RegisterController', 'index']);
      $this->router->post(url: '/register', callback: ['Http\Controllers\RegisterController', 'store']);

      $this->router->get(url: '/login', callback: ['Http\Controllers\LoginController', 'index']);
      $this->router->post(url: '/login', callback: ['Http\Controllers\LoginController', 'store']);
      $this->router->get(url: '/logout', callback: ['Http\Controllers\LoginController', 'logout']);

      // TODO:
      $this->router->get(url: '/dashboard', callback: ['Http\Controllers\UserController', 'dashboard']);
      $this->router->get(url: '/profile/{id}', callback: ['Http\Controllers\UserController', 'profile']);

      $this->router->get(url: '/habit', callback: ['Http\Controllers\HabitController', 'index']);
      $this->router->post(url: '/habit', callback: ['Http\Controllers\HabitController', 'store']);
      $this->router->get(url: '/habit/5?', callback: ['Http\Controllers\HabitController', 'show']);
      $this->router->patch(url: '/habit/{id}', callback: ['Http\Controllers\HabitController', 'patch']);
      $this->router->put(url: '/habit/{id}', callback: ['Http\Controllers\HabitController', 'put']);

      $this->router->get(url: '/archived', callback: ['Http\Controllers\HabitController', 'archived']);
      $this->router->delete(url: '/archived/{id}', callback: ['Http\Controllers\HabitController', 'destroy']);
      $this->router->patch(url: '/archived/{id}', callback: ['Http\Controllers\HabitController', 'restore']);
   }
}