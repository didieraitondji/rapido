<?php
session_start();
include_once("functionsAndObjets.php");

$id = $_GET['id'];

$base = new Base();

$operateur = new Operateur("", "", $base);

$retour = $operateur->considererOperateur($id);

if ($retour == 1) {
    $_SESSION['message'] = " Operateur considérer avec succès !";
} else {
    $_SESSION['message'] = " Impossible de considérer cet opérateur. ";
}

phpRedirect("/entreprise/operateurs-retirer/");
