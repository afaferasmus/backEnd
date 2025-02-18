<?php

namespace App\Exceptions;

use Illuminate\Validation\ValidationException;

class CustomValidationException extends ValidationException
{
    public function __construct($validator)
{
    parent::__construct($validator);

    $this->errors = [
        'feedback' => $this->getFeedbackMessage(),
    ];
}
private function getFeedbackMessage()
{
    return $this->errors()->first();
}
}