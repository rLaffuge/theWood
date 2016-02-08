<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 08/02/2016
 * Time: 15:08
 */

require "ConnexionDb.class.php";

$db = new ConnexionDb();

$requete_produit = "INSERT INTO produit VALUES (:id,:nom_produit,:prix,:description,:)";


?>