<?php
/**
 * Created by PhpStorm.
 * User: laffu
 * Date: 08/03/2016
 * Time: 15:07
 */
require_once $_SERVER["DOCUMENT_ROOT"]."/theWood/back/Models/ConnexionDb.class.php";

function loadUtilisateurs(){
    $db = new ConnexionDb();
    $query = "SELECT idUser, nom, prenom FROM user WHERE idUser<>666";

    $res_utilisateur = $db->getConnexion()->prepare($query);
    $res_utilisateur->execute();

    $utilisateurs = $res_utilisateur->fetchAll(PDO::FETCH_OBJ);
    return $utilisateurs;
}

function loadDroits(){
    $db = new ConnexionDb();

    $query = "SELECT idTypeUser, libelle FROM typeuser";

    $res_droit = $db->getConnexion()->prepare($query);
    $res_droit->execute();

    $droits = $res_droit->fetchAll(PDO::FETCH_OBJ);
    return $droits;
}

function updateUtilisateur($idUser, $idDroit){
    $db = new ConnexionDb();

    $query = "UPDATE user SET idTypeUser=:idTypeDroit WHERE idUser=:idUser";

    $res_update = $db->getConnexion()->prepare($query);

    $res_update->bindParam(':idTypeDroit', $idDroit, PDO::PARAM_INT);
    $res_update->bindParam(':idUser', $idUser, PDO::PARAM_INT);

    $res_update->execute();
}