<?php

$amount = $_POST['amount'] ?? null;
$years = $_POST['years'] ?? null;
$interest = $_POST['interest'] ?? null;

if($amount !== null) $amount = floatval($amount);
if($years !== null) $years = intval($years);
if($interest !== null) $interest = floatval($interest);

if ($amount > 0 && $years > 0 && $interest !== null) {
	$months = intval($years * 12);
	// miesięczna stopa procentowa
	$monthlyRate = ($interest / 100) / 12;

	if ($monthlyRate == 0.0) {
		// brak odsetek
		$result = $amount / $months;
	} else {
		// wzór na ratę annuitetową
		$result = $amount * $monthlyRate / (1 - pow(1 + $monthlyRate, -$months));
	}

	// zaokrąglenie do 2 miejsc
	$result = round($result, 2);
}

include 'credit_view.php';