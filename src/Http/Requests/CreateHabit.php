<?php

namespace Http\Requests;

use Http\Requests\HabitFormValidation;

final class CreateHabit extends HabitFormValidation
{

   public function validateCreateFrom(
      ?string $category,
      ?string $title,
      ?string $description): bool
   {

      $this->validateCategory(category: $category);
      $this->validateTitle(title: $title);
      $this->validateDescription(description: $description);

      return empty($this->errors);
   }

}