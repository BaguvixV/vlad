<?php

namespace Http\Requests;

use Core\Validator;


class FromValidation extends Validator {

  public function __construct(public object $user) {
    // intentionaly empty
  }

  public function validateName($name) {
    if (empty($name)) {
      dd('empty validateName function');
    }
  }

  public function validateSurname($surname) {
    if (empty($surname)) {
      dd('empty validateSurname function');
    }
  }

  public function validateAge($age) {
    if (empty($age)) {
      dd('empty validateAge function');
    }
  }

  public function validateEmail($email) {
    if (empty($email)) {
      dd('empty validateEmail function');
    }
  }

  public function checkIfEmailExists($email) {
    // check if users input email equals to any of existing db email values
  }

  public function checkIfPhoneExists($phone) {
    // check if users input phone equals to any of existing db phone values
  }

  public function validatePassword($password) {
    if (empty($password)) {
      dd('empty validatePassword function');
    }
  }

  public function validateRePassword($password, $rePassword) {
    if (empty($rePassword)) {
      dd('empty validateRePassword function');
    }

    if ($password !== $rePassword) {
      dd('Your password does not match to repeated password.');
    }
  }

  public function validatePhone($phone) {
    if (empty($phone)) {
      dd('empty validatePhone function');
    }
  }


  public function checkEmailWithPassword($email, $password) {
    // check if user with this credentials already exists
  }

}