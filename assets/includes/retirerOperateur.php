<?php
session_start();
include_once("functionsAndObjets.php");

$id = $_GET['id'];

$base = new Base();

$operateur = new Operateur("", "", $base);

$retour = $operateur->retirerOperateur($id);

if ($retour == 1) {
    $_SESSION['message'] = " Operateur mise à pied avec succès !";
} else {
    $_SESSION['message'] = " Impossible de retirer cet opérateur. ";
}

phpRedirect("/entreprise/operateurs/");
