<?php

namespace Core;


abstract class Validator {
  public static function Validate($inputData): mixed {
    // Strip unnecessary charracters (extra space, tab, new line) from the user input data
    $inputData = trim(string: $inputData);
    // Remove backslashes \ from the user input data
    $inputData = stripcslashes(string: $inputData);
    // DO NOT call htmlspecialchars() here - escape at output instead
    // htmlspecialchars(string: $input);

    return $inputData;
  }  
}