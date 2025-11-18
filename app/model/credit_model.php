<?php
namespace App\Model;

class Credit_model {
    public function calculateMonthlyPayment($amount, $years, $interest) {
        if ($amount > 0 && $years > 0 && $interest !== null) {
            $months = intval($years * 12);
            $monthlyRate = ($interest / 100) / 12;

            if ($monthlyRate == 0.0) {
                $result = $amount / $months;
            } else {
                // wzór na ratę annuitetową
                $result = $amount * $monthlyRate / (1 - pow(1 + $monthlyRate, -$months));
            }

            $result = round($result, 2);
            return $result;
        }
        else {
            return ['error' => 'Invalid input values'];
        }
    }
}