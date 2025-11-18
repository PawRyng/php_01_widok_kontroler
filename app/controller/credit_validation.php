<?php
namespace App\Controller;

class Credit_validation {
    private $amount;
    private $years;
    private $interest;

    public function __construct($amount, $years, $interest) {
        $this->amount = $amount;
        $this->years = $years;
        $this->interest = $interest;
    }

    private function isValidNumber($value): bool {
        return is_numeric($value) && $value > 0;
    }

    public function validate(): array {
        $errors = [];

        if (!$this->isValidNumber($this->amount)) {
            $errors['amount'] = 'Amount must be a positive number.';
        }

        if (!$this->isValidNumber($this->years)) {
            $errors['years'] = 'Years must be a positive integer.';
        }

        if (!is_numeric($this->interest) || $this->interest < 0) {
            $errors['interest'] = 'Interest rate must be a non-negative number.';
        }

        return $errors;
    }
}