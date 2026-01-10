<?php

namespace Http\Requests;

use Http\Requests\AuthFromValidation;


final class RegisterForm extends AuthFromValidation {

  public function register(
                        ?string $name,
                        ?string $surname,
                        ?int $age,
                        ?string $email,
                        ?string $dbEmail,
                        ?string $password,
                        ?string $rePassword,
                        ?string $phone,
                        ?string $dbPhone): bool {

    $this->validateName(name: $name);
    $this->validateSurname(surname: $surname);
    $this->validateAge(age: $age);
    $this->validateEmail(email: $email);
    $this->validatePassword(password: $password);
    $this->validateRePassword(password: $password, rePassword: $rePassword);
    $this->validatePhone(phone: $phone);

    $this->checkIfEmailExists(email: $dbEmail);
    $this->checkIfPhoneExists(phone: $dbPhone);

    return empty($this->errors);
  }

}