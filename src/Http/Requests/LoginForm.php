<?php

namespace Http\Requests;

use Http\Requests\AuthFromValidation;

final class LoginForm extends AuthFromValidation
{

  public function login(
                      ?string $email,
                      ?string $password): bool {

    $this->validateLoginEmail(email: $email);
    $this->validateLoginPassword(password: $password);

    return empty($this->errors);
  }

}