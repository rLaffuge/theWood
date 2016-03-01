<?php
/**
 * Created by PhpStorm.
 * User: laffu
 * Date: 23/02/2016
 * Time: 15:06
 */

require_once $_SERVER["DOCUMENT_ROOT"] . "/theWood/back/Models/ConnexionDb.class.php";

function connexion_utilisateur($utilisateur)
{
    $db = new ConnexionDb();
    $stmt = $db->getConnexion()->prepare("SELECT login, mdp, nom, prenom, niveau FROM user
                                          INNER JOIN typeuser
                                          ON user.idTypeUser = typeuser.idTypeUser
                                          INNER JOIN droit
                                          ON typeuser.idDroit = droit.idDroit
                                          WHERE login=:login;");

    $stmt->bindParam(':login', $utilisateur['login'], PDO::PARAM_STR);
    $stmt->execute();
    $registered_utilisateur = $stmt->fetch(PDO::FETCH_OBJ);
    if (password_verify($utilisateur['mdp'], $registered_utilisateur->mdp)) {
        return $registered_utilisateur;
    } else {
        return false;
    }

}


