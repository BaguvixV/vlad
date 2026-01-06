<?php

namespace Http\Requests;

use Http\Requests\FromValidation;


final class RegisterForm extends FromValidation {
  public function register($name, $surname, $age, $email, $password, $rePassword, $phone): bool {
    $this->validateName(name: $name);
    $this->validateSurname(surname: $surname);
    $this->validateAge(age: $age);
    $this->validateEmail(email: $email);
    $this->validatePassword(password: $password);
    $this->validateRePassword(password: $password, rePassword: $rePassword);
    $this->validatePhone(phone: $phone);

    // $this->checkIfEmailExists(email: $email);
    // $this->checkIfPhoneExists(phone: $phone);

    return true;
  }

}