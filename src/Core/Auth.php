<?php

namespace Core;

class Auth
{
   public static function id(): ?int
   {
      return $_SESSION['user']['id'] ?? null;
   }

   public static function email(): ?string
   {
      return $_SESSION['user']['email'] ?? null;
   }

   public static function login(int $id, string $email): void
   {
      // regenerate session id after each login
      session_regenerate_id(true);

      $_SESSION['user'] = [
         'id' => $id,
         'email' => $email
      ];
   }

   public static function logout(): void
   {
      unset($_SESSION['user']);

//      // Logout by clearing session superglobal, destroy file and deleting cookie
//      $_SESSION = [];
//      session_destroy();
//
//      $params = session_get_cookie_params();
//      setcookie('PHPSESSID', '', time() - 3000, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
   }
}