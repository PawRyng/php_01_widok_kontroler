<?php
session_start();
require_once __DIR__.'/config.php';
//przekierowanie przeglądarki klienta (redirect)
//header("Location: "._APP_URL."/app/calc_view.php");

//przekazanie żądania do następnego dokumentu ("forward")
// include the calc_view.php located in the app folder (two levels up from this file)
include dirname(__FILE__).'/calc_view.php';