<?php

namespace Core;

abstract class Validator {
  protected $errors = [];

  // Allows A–Z (including Latvian letters) and spaces
  protected string $namingRegex = '/^[a-zA-ZāčēģīķļņšūžĀČĒĢĪĶĻŅŠŪŽ ]+$/u';

  // Allows A–Z (including Latvian letters) and spaces and also numbers
  protected string $namingWithNumRegex = '/^[a-zA-Z0-9āčēģīķļņšūžĀČĒĢĪĶĻŅŠŪŽ ]+$/u';

  // Basic but safe email pattern (RFC-like)
  protected string $emailRegex = '/^[a-zA-Z0-9._%+\-]+@[a-zA-Z0-9.\-]+\.[a-zA-Z]{2,}$/';

  // Strong password: at least 6 chars, 1 uppercase, 1 lowercase, 1 digit, 1 symbol
  protected string $passwordRegex = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{6,}$/';

  // Latvian phone: starts with 2 or 6, total 8 digits
  protected string $phoneRegex = '/^(2\d{7}|6\d{7})$/';

  public function errors(): ?array {
    return $this->errors;
  }

  // TODO: Make it work later on. For now just leave to prevent unneccessary dive into abstractions
  // public function stringLength(string $value, int $from, int $to): void {
  //   if (strlen(string: $value) <= $from) {
  //     $this->errors["{$value}"] = "{$value} length is too small!";
  //     return;
  //   }

  //   if (strlen(string: $value) >= $to) {
  //     $this->errors["{$value}"] = "You are exceeding {$value} input length!";
  //     return;
  //   }
  // }

}