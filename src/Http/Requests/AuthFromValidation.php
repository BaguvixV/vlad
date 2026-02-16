<?php

namespace Http\Requests;


abstract class AuthFromValidation
{

   protected array $errors = [];

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


   public function __construct(public object $user)
   {
      // intentionaly empty (PHP 8.0 feature that allows Constructor Property Promotion)
   }


   public function errors()
   {
      return $this->errors;
   }


   public function validateName(?string $name)
   {
      if (is_null($name)) {
         $this->errors['name'] = 'Name input field is empty!';
         return;
      }

      if (strlen($name) <= 2) {
         $this->errors['name'] = 'Name length is too small!';
         return;
      }

      if (strlen($name) >= 20) {
         $this->errors['name'] = 'You are exceeding name input length!';
         return;
      }

      if (!preg_match($this->namingRegex, $name)) {
         $safeName = htmlspecialchars($name);
         $this->errors['name'] = "Incorrect name: \"<strong>$safeName</strong>\" --> format! Allowed letters (including Latvian) and spaces.";
         return;
      }
   }

   public function validateSurname(?string $surname)
   {
      if (is_null($surname)) {
         $this->errors['surname'] = 'Surname input field is empty!';
         return;
      }

      if (strlen($surname) <= 2) {
         $this->errors['surname'] = 'Surame length is too small!';
         return;
      }

      if (strlen($surname) >= 20) {
         $this->errors['surname'] = 'You are exceeding surname input length!';
         return;
      }

      if (!preg_match($this->namingRegex, $surname)) {
         $safeSurname = htmlspecialchars($surname);
         $this->errors['surname'] = "Incorrect surname: \"<strong>$safeSurname</strong>\" --> format! Allowed letters (including Latvian) and spaces.";
         return;
      }
   }

   public function validateAge(?string $age)
   {
      if (is_null($age)) {
         $this->errors['age'] = 'Age input field is empty!';
         return;
      }

      if (!filter_var($age, FILTER_VALIDATE_INT)) {
         $this->errors['age'] = 'Invalid age format!';
         return;
      }

      if ($age <= 0) {
         $this->errors['age'] = 'Invalid age number! Are you even born?';
         return;
      }

      // if ($age >= 99 || strlen($age) < 2) {
      if (strlen($age) > 2) {
         $this->errors['age'] = 'Invalid age number! Can not set age above 99.';
         return;
      }
   }

   public function validateEmail(?string $email)
   {
      if (is_null($email)) {
         $this->errors['email'] = 'Email input field is empty!';
         return;
      }

      if (strlen($email) <= 4) {
         $this->errors['email'] = 'Email input length is too small!';
         return;
      }

      if (strlen($email) >= 60) {
         $this->errors['email'] = 'You are exceeding email input length!';
         return;
      }

      if (!preg_match($this->emailRegex, $email)) {
         $safeEmail = htmlspecialchars($email);
         $this->errors['email'] = "Incorrect email: \"<strong>$safeEmail</strong>\" --> format! Enter valid format, e.g., user@example.com.";
         return;
      }
   }

   public function validatePassword(?string $password)
   {
      if (is_null($password)) {
         $this->errors['password'] = 'Password input field is empty!';
         return;
      }

      if (strlen($password) <= 6) {
         $this->errors['password'] = 'Password input length is too small!';
         return;
      }

      if (strlen($password) >= 90) {
         $this->errors['password'] = 'You are exceeding password input length!';
         return;
      }

      if (!preg_match($this->passwordRegex, $password)) {
         $safePassword = htmlspecialchars($password);
         $this->errors['password'] = "Incorrect password: \"<strong>$safePassword</strong>\" --> format! Use at least 6 chars, 1 uppercase, 1 lowercase, 1 digit, 1 symbol.";
         return;
      }
   }

   public function validateRePassword(?string $password, ?string $rePassword)
   {
      if (is_null($rePassword)) {
         $this->errors['rePassword'] = 'Repeated password input field is empty!';
         return;
      }

      if ($password !== $rePassword) {
         $this->errors['rePassword'] = 'Your password does not match to repeated password!';
         return;
      }
   }

   public function validatePhone(?string $phone)
   {
      if (is_null($phone)) {
         $this->errors['phone'] = 'Phone password input field is empty!';
         return;
      }

      if (strlen($phone) >= 20) {
         $this->errors['phone'] = 'You are exceeding phone input length!';
         return;
      }

      if (!preg_match($this->phoneRegex, $phone)) {
         $safePhone = htmlspecialchars($phone);
         $this->errors['phone'] = "Incorrect phone: \"<strong>$safePhone</strong>\" --> format! Latvian phone numbers starts with 2 or 6, with total 8 digits";
         return;
      }
   }


   public function validateLoginEmail(?string $email)
   {
      if (is_null($email)) {
         $this->errors['email'] = 'Email input field is empty!';
         return;
      }

      // if (strlen($email) <= 4) {
      //   $this->errors['email'] = 'Email input length is too small!';
      //   return;
      // }

      if (strlen($email) >= 60) {
         $this->errors['email'] = 'You are exceeding email input length!';
         return;
      }

      if (!preg_match($this->emailRegex, $email)) {
         $safeEmail = htmlspecialchars($email);
         $this->errors['email'] = "Incorrect email: \"<strong>$safeEmail</strong>\" --> format! Enter valid format, e.g., user@example.com.";
         return;
      }
   }

   public function validateLoginPassword(?string $password)
   {
      if (is_null($password)) {
         $this->errors['password'] = 'Password input field is empty!';
         return;
      }

      // if (strlen($password) <= 6) {
      //   $this->errors['password'] = 'Password input length is too small!';
      //   return;
      // }

      if (strlen($password) >= 90) {
         $this->errors['password'] = 'You are exceeding password input length!';
         return;
      }

      if (!preg_match($this->passwordRegex, $password)) {
         $safePassword = htmlspecialchars($password);
         $this->errors['password'] = "Incorrect password: \"<strong>$safePassword</strong>\" --> format! Use at least 6 chars, 1 uppercase, 1 lowercase, 1 digit, 1 symbol.";
         return;
      }
   }

}