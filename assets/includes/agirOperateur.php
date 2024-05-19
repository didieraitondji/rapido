<?php
session_start();

include_once("functionsAndObjets.php");

$_SESSION['IDparticule'] = $_GET['id'];


phpRedirect("/operateur/");
