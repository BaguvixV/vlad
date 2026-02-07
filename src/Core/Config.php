<?php

namespace Core;

class Config {
  public static function database(): array
  {
    return [
      'host' => getenv('DB_HOST'),
      'port' => getenv('DB_PORT'),
      'dbname' => getenv('DB_NAME'),
      'charset' => getenv('DB_CHARSET'),
      'username' => getenv('DB_USERNAME'),
      'password' => getenv('DB_PASSWORD'),
    ];
  }
  // public static function website(): array {
  //   return [
  //     'name' => getenv('WEBSITE_NAME') ?? "MyWebsite.com",
  //     'adminName' => getenv('WEBSITE_ADMIN_NAME'),
  //     'adminEmail' => getenv('WEBSITE_ADMIN_EMAIL'),
  //     'adminPassword' => getenv('WEBSITE_ADMIN_PASSWORD'),
  //   ];
  // }
}