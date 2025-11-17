<?php
define('_CALC_PATH', '/app/views/calc');
define('_CREDIT_PATH', '/app/views/credit');
define('_APP_URL', 'http://localhost:8080');

// Optional: initialize Twig if Composer autoload is available
$vendorAutoload = __DIR__ . '/vendor/autoload.php';
if (file_exists($vendorAutoload)) {
	require_once $vendorAutoload;

	try {
		$twigLoader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/app/views');
		// disable cache for development; change to __DIR__.'/var/cache' for production
		$twig = new \Twig\Environment($twigLoader, [
			'cache' => false,
		]);
	} catch (Throwable $e) {
		// If Twig classes are not found or other errors, skip initialization
		$twig = null;
	}
} else {
	$twig = null;
}