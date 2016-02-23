<?php
/**
 * Created by PhpStorm.
 * User: laffu
 * Date: 08/02/2016
 * Time: 15:18
 */

require "ConnexionDb.class.php";

function ajouter_utilisateur($utilisateur){
    $db = new ConnexionDb();
    $stmt = $db->getConnexion()->prepare("INSERT INTO user(nom,prenom,login,mdp) VALUES (:nom, :prenom, :login, :mdp);");

    //Encodage du password
    if (isset($utilisateur['mdp'])) {
        $utilisateur['mdp'] = password_hash($utilisateur['mdp'], PASSWORD_DEFAULT);
    }

    $stmt->bindParam(':nom', $utilisateur['nom'], PDO::PARAM_STR);
    $stmt->bindParam(':prenom', $utilisateur['prenom'], PDO::PARAM_STR);
    $stmt->bindParam(':login', $utilisateur['login'], PDO::PARAM_STR);
    $stmt->bindParam(':mdp', $utilisateur['mdp'], PDO::PARAM_STR);
    $stmt->execute();
}

?>