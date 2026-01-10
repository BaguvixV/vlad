<?php

namespace Core;


abstract class Sanitize {

  public static function string(?string $input): ?string {
    if ($input === null) {
      return null;
    }
    
    // Strip unnecessary charracters (extra space, tab, new line [before and after input]) from the user input data
    $input = trim(string: $input);

    // Remove backslashes \ from the user input data
    $input = stripcslashes(string: $input);

    // DO NOT call htmlspecialchars() here - escape at output instead
    // htmlspecialchars(string: $input);

    return $input === '' ? null : $input;
  }


  public static function integer(?string $input): ?string {
    if ($input === null) {
      return null;
    }

    // Strip unnecessary charracters (extra space, tab, new line [before and after input]) from the user input data
    $input = trim(string: $input);

    // Sanitize integer (int) input (removes all characters except digits and + - signs)
    $input = filter_var($input, FILTER_SANITIZE_NUMBER_INT);

    return $input === '' ? null : $input;
  }


  public static function email(?string $input): ?string {
    if ($input === null) {
      return null;
    }

    // Strip unnecessary charracters (extra space, tab, new line [before and after input]) from the user input data
    $input = trim(string: $input);

    // Sanitize email input (removes illegal email characters)
    $input = filter_var($input, FILTER_SANITIZE_EMAIL);
 
    return $input === '' ? null : $input;
  }


  public static function password(?string $input): ?string {
    if ($input === null) {
      return null;
    }

    $input = trim(string: $input);

    return $input === '' ? null : $input;
  }
}