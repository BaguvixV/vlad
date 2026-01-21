<?php

namespace Http\Requests;

use Core\Validator;

class HabitFormValidation extends Validator {

  public function __construct(public object $habit) {
    // intentionaly empty
  }

  public function validateCategory(?string $category): void {
    if (is_null($category)) {
      $this->errors['category'] = 'Category input field is empty!';
      return;
    }

    // Safe $category error output
    $safeCategory = htmlspecialchars($category);

    if (strlen(string: $category) <= 2) {
      $this->errors['category'] = "\"<strong>$safeCategory</strong>\" length is too small!";
      return;
    }

    if (strlen(string: $category) >= 20) {
      $this->errors['category'] = "You are exceeding category input length!";
      return;
    }

    if (! preg_match($this->namingRegex, $category)) {
      $this->errors['category'] = "Incorrect category: \"<strong>$safeCategory</strong>\" --> format! Allowed letters (including Latvian) and spaces.";
      return;
    }
  }

  public function validateTitle(?string $title): void {
    if (is_null($title)) {
      $this->errors['title'] = 'Title input field is empty!';
      return;
    }
  }

  public function validateDescription(?string $description): void {
    if (is_null($description)) {
      $this->errors['description'] = 'Description input field is empty!';
      return;
    }
  }

  // TODO: function for edit
  // public function validateStatus(?string $status): void {
  //   if (is_null($status)) {
  //     $this->errors['status'] = 'Status input field is empty!';
  //     return;
  //   }
  // }

}