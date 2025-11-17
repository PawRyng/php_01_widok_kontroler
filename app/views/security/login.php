<?php
function getParamsLogin(&$form){
	$form['login'] = isset ($_REQUEST ['login']) ? $_REQUEST ['login'] : null;
	$form['pass'] = isset ($_REQUEST ['pass']) ? $_REQUEST ['pass'] : null;
}

function validateLogin(&$form,&$messages){
	if ( ! (isset($form['login']) && isset($form['pass']))) {
		return false;
	}
	if ( $form['login'] == "") {
		$messages [] = 'Nie podano loginu';
	}
	if ( $form['pass'] == "") {
		$messages [] = 'Nie podano hasła';
	}

	if (count ( $messages ) > 0) return false;

	// sprawdzenie, czy dane logowania są poprawne
	if ($form['login'] == "admin" && $form['pass'] == "admin") {
		session_start();
		$_SESSION['role'] = 'admin';
		return true;
	}
	if ($form['login'] == "user" && $form['pass'] == "user") {
		session_start();
		$_SESSION['role'] = 'user';
		return true;
	}
	
	$messages [] = 'Niepoprawny login lub hasło';
	return false; 
}

//inicjacja potrzebnych zmiennych
$form = array();
$messages = array();

// pobierz parametry i podejmij akcję
getParamsLogin($form);

if (!validateLogin($form,$messages)) {
	//jeśli błąd logowania to wyświetl formularz z tekstami z $messages
	include __DIR__.'/login_view.php';
} else { 
	header("Location: /app/views/credit");
}