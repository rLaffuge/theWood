<?php
/**
 * Created by PhpStorm.
 * User: laffu
 * Date: 08/03/2016
 * Time: 17:26
 */

require_once $_SERVER["DOCUMENT_ROOT"] . "/theWood/back/Models/ConnexionDb.class.php";

function loadCommandes(){
    $db = new ConnexionDb();

    $query = "SELECT idCommande, prix, dateCommande,user.idUser, nom, prenom
              FROM commande
              INNER JOIN user
              ON commande.idUser = user.idUser";

    $res_commande = $db->getConnexion()->prepare($query);
    $res_commande->execute();

    $commandes = $res_commande->fetchAll(PDO::FETCH_OBJ);
    return $commandes;
}