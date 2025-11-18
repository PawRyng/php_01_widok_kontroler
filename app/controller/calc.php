<?php
require_once dirname(__FILE__, 2) . '/model/credit_model.php';
require_once __DIR__ . '/credit_validation.php';

use App\Model\Credit_model;
use App\Controller\Credit_validation;

$amount = $_POST['amount'] ?? null;
$years = $_POST['years'] ?? null;
$interest = $_POST['interest'] ?? null;

$validator = new Credit_validation($amount, $years, $interest);
$errors = $validator->validate();


if(empty($errors)) {
	$creditModel = new Credit_model();
	$monthlyPayment = $creditModel->calculateMonthlyPayment($amount, $years, $interest);
	if (is_array($monthlyPayment) && isset($monthlyPayment['error'])) {
		$errors['calculation'] = $monthlyPayment['error'];
	}
} else {
	$monthlyPayment = null;
}

include dirname(__FILE__, 2).'/views/credit/credit_view.php';