<?php
/**
 * Created by PhpStorm.
 * User: laffu
 * Date: 23/02/2016
 * Time: 15:06
 */
session_start();
include $_SERVER["DOCUMENT_ROOT"] . "/theWood/back/Models/M_connexion_utilisateur.php";

if ($_POST['connexion_token'] != $_SESSION['connexion_token']) {
    unset($_SESSION['connexion_token']);
    die('Formulaire invalide');
}
$utilisateur = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
try{
    $utilisateur_connected = connexion_utilisateur($utilisateur);
    if ($utilisateur_connected != false) {
        $_SESSION['utilisateur'] = $utilisateur_connected;
        unset($_SESSION['connexion_token']);
        header("location:../../index.php");
    }else{
        unset($_SESSION['connexion_token']);
        die("L'utilisateur n'a pas été créé!");
    }
}catch(Exception $ex){
    $message = 'Erreur PDO dans ' . $ex->getFile() . ', ligne ' .
        $ex->getLine() . ' : ' . $ex->getMessage();
    unset($_SESSION['connexion_token']);
    die($message);
}




