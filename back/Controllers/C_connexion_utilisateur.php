<?php
/**
 * Created by PhpStorm.
 * User: laffu
 * Date: 23/02/2016
 * Time: 15:06
 */
session_start();
include $_SERVER["DOCUMENT_ROOT"] . "/theWood/back/Models/M_connexion_utilisateur.php";

$utilisateur = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
$utilisateur_connected = connexion_utilisateur($utilisateur);
if ($utilisateur_connected != false) {
    $_SESSION['utilisateur'] = $utilisateur_connected;
    header("location:../../index.php");
}else{
    header("location:../../index.php");
}



