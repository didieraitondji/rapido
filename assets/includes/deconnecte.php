<?php
session_start();
include_once("functionsAndObjets.php");
$url = '/';
session_destroy();
session_start();
$_SESSION['message'] = "Merci d'avoir utilisé RAPIDO ! ";

echo $_SESSION['type'];
phpRedirect($url);
