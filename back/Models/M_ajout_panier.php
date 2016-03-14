<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 08/03/2016
 * Time: 17:43
 */

require_once "ConnexionDb.class.php";

$db = new ConnexionDb();

$requete_stock = "SELECT stock FROM produit WHERE idProduit = :id;";

$res_stock = $db->getConnexion()->prepare($requete_stock);

$res_stock->bindParam(":id", $id_produit, PDO::PARAM_INT);

$res_stock->execute();

$stock = $res_stock->fetch(PDO::FETCH_OBJ);

$stock_produit = intval($stock->stock);

?>