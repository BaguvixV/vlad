<?php

namespace Core;


class Request
{
   public function getUrl()
   {
      // return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?? '/';
      $uri = $_SERVER['REQUEST_URI'];
      // dd($uri);
      return $uri ?? '/';
   }

   public function getMethod()
   {
      if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['__spoof_method'])) {
         return strtoupper($_POST['__spoof_method']);
      }

      return strtoupper($_SERVER['REQUEST_METHOD']);
   }

}