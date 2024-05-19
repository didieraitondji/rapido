<?php
session_start();
include_once("functionsAndObjets.php");

$id = $_GET['id'];

$base = new Base();

$chauffeur = new Chauffeur("", "", $base);

$retour = $chauffeur->retirerChauffeur($id);


if ($retour == 1) {
    $_SESSION['message'] = " Chauffeur mise à pied avec succès !";
} else {
    $_SESSION['message'] = " Impossible de retirer ce chauffeur. <br> Le Chauffeur est lié à une course ! ";
}


phpRedirect("/entreprise/chauffeurs/");
