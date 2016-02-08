<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 08/02/2016
 * Time: 15:07
 */

require "ConnexionDb.class.php";

$db = new ConnexionDb();

$requete_produit = "SELECT * FROM produit WHERE produit.id_produit = :id;";

$res_produit = $db->getConnexion()->prepare($requete_produit);

$res_produit->bindParam(":id", $id, PDO::PARAM_INT);

$res_produit->execute();

$produit = $res_produit->fetch(PDO::FETCH_OBJ);

?>