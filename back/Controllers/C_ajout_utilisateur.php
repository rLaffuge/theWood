<?php
/**
 * Created by PhpStorm.
 * User: laffu
 * Date: 08/02/2016
 * Time: 15:20
 */
session_start();

include $_SERVER["DOCUMENT_ROOT"] . "/theWood/back/Models/M_ajout_utilisateur.php";


//On check les champs du formulaire
if (!isset($_POST['login'], $_POST['mdp'], $_POST['nom'], $_POST['prenom'], $_POST['form_token'])) {
    $message = 'Veuillez entrer un login et un mot de passe valide!';
    escape($message);
} elseif ($_POST['form_token'] != $_SESSION['form_token']) {
    //On check le Token
    $message = 'Formulaire invalide!';
    escape($message);
} elseif (strlen($_POST['login']) < 5 || strlen($_POST['login']) > 20) {
    $message = 'Le login doit être composé de 5 caractères min et 20 caractères max';
    escape($message);
} elseif (strlen($_POST['mdp']) < 5 || strlen($_POST['mdp']) > 20) {
    $message = 'Le mot de passe doit être composé de 5 caractères min et 20 caractères max';
    escape($message);
} elseif (strlen($_POST['nom']) < 3 || strlen($_POST['nom']) > 20) {
    $message = 'Le nom doit être composé de 5 caractères min et 20 caractères max';
    escape($message);
} elseif (strlen($_POST['prenom']) < 3 || strlen($_POST['prenom']) > 20) {
    $message = 'Le prenom doit être composé de 5 caractères min et 20 caractères max';
    escape($message);
} else {
    $utilisateur = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    try {
        ajouter_utilisateur($utilisateur);
        unset($_SESSION['form_token']);
        header("location:../../index.php");
    } catch (Exception $ex) {
        $message = 'Erreur PDO dans ' . $ex->getFile() . ', ligne ' .
            $ex->getLine() . ' : ' . $ex->getMessage();
        escape($message);
    }
}

function escape($m)
{
    unset($_SESSION['form_token']);
    die($m);
}




