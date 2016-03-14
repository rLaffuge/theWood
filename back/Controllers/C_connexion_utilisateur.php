<?php
/**
 * Created by PhpStorm.
 * User: laffu
 * Date: 23/02/2016
 * Time: 15:06
 */
session_start();
include $_SERVER["DOCUMENT_ROOT"] . "/theWood/back/Models/M_connexion_utilisateur.php";

if (!isset($_POST['login']) && !isset($_POST['mdp'])) {
    unset($_SESSION['connexion_token']);
    die('Formulaire invalide');
} elseif (strlen($_POST['login']) < 4 || strlen($_POST['login']) > 20) {
    unset($_SESSION['connexion_token']);
    die('Le login doit être composé de 5 caractères min et 20 caractères max');
} elseif (strlen($_POST['mdp']) < 4 || strlen($_POST['mdp']) > 20) {
    unset($_SESSION['connexion_token']);
    die('Le mot de passe doit être composé de 5 caractères min et 20 caractères max');
} elseif ($_POST['connexion_token'] != $_SESSION['connexion_token']) {
    unset($_SESSION['connexion_token']);
    die('Formulaire invalide');
}

$utilisateur = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
try {
    $utilisateur_connected = connexion_utilisateur($utilisateur);
    if ($utilisateur_connected != false) {
        $_SESSION['utilisateur'] = $utilisateur_connected;
        unset($_SESSION['connexion_token']);
        header("location:../../index.php");
    } else {
        unset($_SESSION['connexion_token']);
        die("La connexion a échouée!");
    }
} catch (Exception $ex) {
    $message = 'Erreur PDO dans ' . $ex->getFile() . ', ligne ' .
        $ex->getLine() . ' : ' . $ex->getMessage();
    unset($_SESSION['connexion_token']);
    die($message);
}






