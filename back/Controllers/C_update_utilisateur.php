<?php
/**
 * Created by PhpStorm.
 * User: laffu
 * Date: 08/03/2016
 * Time: 16:07
 */

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
}

function escape($m){
    unset($_SESSION['utilisateur_token']);
    die($m);
}