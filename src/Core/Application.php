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

        $this->router->get(url: '/admin', callback: ['Http\Controllers\AdminController', 'index']);
        $this->router->post(url: '/admin', callback: ['Http\Controllers\AdminController', 'login']);
        $this->router->get(url: '/admin/dashboard', callback: ['Http\Controllers\UserController', 'adminDashboard']);

        $this->router->get(url: '/register', callback: ['Http\Controllers\AuthController', 'showRegister']);
        $this->router->post(url: '/register', callback: ['Http\Controllers\AuthController', 'register']);

        $this->router->get(url: '/login', callback: ['Http\Controllers\AuthController', 'showLogin']);
        $this->router->post(url: '/login', callback: ['Http\Controllers\AuthController', 'login']);
        $this->router->get(url: '/logout', callback: ['Http\Controllers\AuthController', 'logout']);

        $this->router->get(url: '/dashboard', callback: ['Http\Controllers\UserController', 'userDashboard']);
        $this->router->get(url: '/profile/{userId}', callback: ['Http\Controllers\UserController', 'publicUserProfile']);

        $this->router->get(url: '/habit', callback: ['Http\Controllers\HabitController', 'index']);
        $this->router->post(url: '/habit', callback: ['Http\Controllers\HabitController', 'store']);
        $this->router->get(url: '/habit/{habitId}', callback: ['Http\Controllers\HabitController', 'show']);
        $this->router->patch(url: '/habit/{habitId}', callback: ['Http\Controllers\HabitController', 'patch']);
        $this->router->put(url: '/habit/{habitId}', callback: ['Http\Controllers\HabitController', 'put']);

        $this->router->get(url: '/archived', callback: ['Http\Controllers\HabitController', 'archived']);
        $this->router->delete(url: '/archived/{habitId}', callback: ['Http\Controllers\HabitController', 'destroy']);
        $this->router->patch(url: '/archived/{habitId}', callback: ['Http\Controllers\HabitController', 'restore']);
    }
}
