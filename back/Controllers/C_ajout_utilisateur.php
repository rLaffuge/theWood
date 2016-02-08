<?php
/**
 * Created by PhpStorm.
 * User: laffu
 * Date: 08/02/2016
 * Time: 15:20
 */

include("../Models/M_ajout_utilisateur.php");

$new_utilisateur = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
try{
    ajouter_utilisateur($new_utilisateur);
    header("location:../../index.php");
}catch(Exception $ex){
    $message = 'Erreur PDO dans ' . $ex->getFile() . ', ligne ' .
        $ex->getLine() . ' : ' . $ex->getMessage();
    die($message);
}



