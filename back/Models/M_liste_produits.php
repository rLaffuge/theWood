<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 08/02/2016
 * Time: 15:05
 */

require "ConnexionDb.class.php";

$db = new ConnexionDb();

$requete_produits = "SELECT * FROM produit";

$res_produits = $db->getConnexion()->prepare($requete_produits);

$res_produits-> execute();

$res_produits->fetchAll(PDO::FETCH_OBJ);

?>