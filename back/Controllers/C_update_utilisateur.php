<?php
/**
 * Created by PhpStorm.
 * User: laffu
 * Date: 08/03/2016
 * Time: 16:07
 */
session_start();
include $_SERVER["DOCUMENT_ROOT"] . "/theWood/back/Models/M_utilisateur.php";

if (!isset($_POST['droit']) && !isset($_POST['utilisateur']) && !isset($_POST['utilisateur_token'])) {
    escape("Champs manquant!");
}elseif($_POST['utilisateur_token'] != $_SESSION['utilisateur_token']){
    escape("Formulaire invalide!");
}elseif(!is_numeric($_POST['droit'])){
    escape('');
}elseif(!is_numeric($_POST['utilisateur'])){
    escape('');
}else{
    $idUtilisateur = filter_input(INPUT_POST, 'utilisateur', FILTER_SANITIZE_NUMBER_INT);
    $idDroit = filter_input(INPUT_POST, 'droit', FILTER_SANITIZE_NUMBER_INT);
    try{
        updateUtilisateur($idUtilisateur, $idDroit);
        unset($_SESSION['utilisateur_token']);
        header("location:../../index.php?route=droits_utilisateurs");
    }catch(Exception $ex){
        $message = 'Erreur PDO dans ' . $ex->getFile() . ', ligne ' .
            $ex->getLine() . ' : ' . $ex->getMessage();
        escape($message);
    }
}

function escape($m){
    unset($_SESSION['utilisateur_token']);
    die($m);
}