<?php

$fn = isset($_GET['fn']) ? $_GET['fn'] : 0;
$name = $fn;
$UPLOAD_ROOT = "./Files/";


if (! $fn) {
	return;
}

$fn = trim($fn);
$slash = strpos($fn, '/');
$dot = strpos($fn, '.');

if ( ($slash !== false && $slash == 0) ||
	 ($dot !== false && $dot == 0) ) 
{
	
		header('500');
		print '500 internal server error';
		die();
}

header('Content-Length: ' . filesize($UPLOAD_ROOT.$fn)) ;
header('Content-Disposition: filename='.$name) ;
header('Content-Type: application/octet-stream');
readfile($UPLOAD_ROOT.$fn);

?>