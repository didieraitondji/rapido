<?php
session_start();

include_once("functionsAndObjets.php");
$url1 = "/chauffeur/";
$url2 = "/operateur/";
$url3 = "/";
$url4 = "/entreprise/operateurs/";

$id = $_SESSION['info']['id'];

$id_op = $_GET['id'];

if (isset($_SESSION['connect']) && $_SESSION['connect'] == "oui") {
    if ($_SESSION['type'] == "admin") {

        $donnee = array(
            'nom' => $_POST['nom'],
            'prenoms' => $_POST['prenoms'],
            'telephone' => $_POST['telephone'],
            'email' => $_POST["email"],
            'sexe' => $_POST['sexe']
        );

        $base = new Base();

        $Operateur = new Operateur($donnee['telephone'], "", $base);

        if ($Operateur->updateOperateur($donnee, $id_op) == 0) {
            $_SESSION['message'] = " Opérateur modifier avec succès ! ";
            phpRedirect($url4);
        } else if ($Operateur->updateOperateur($donnee, $id_op) == 2) {
            $_SESSION['message'] = " Le numéro existe déjà !";
            phpRedirect($url4);
        } else {
            $_SESSION['message'] = " Modification Impossible ! ";
            phpRedirect($url4);
        }
    } else if ($_SESSION['type'] == "chauffeur") {
        $_SESSION['message'] = "Vous n'est pas Administrateur !";
        phpRedirect($url1);
    } else {
        $_SESSION['message'] = "Vous n'est pas Administrateur !";
        phpRedirect($url2);
    }
} else {
    $_SESSION['message'] = "Veuillez vous connecter !";
    phpRedirect($url3);
}
