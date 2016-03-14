<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 14/03/2016
 * Time: 16:10
 */

    require_once "ConnexionDb.class.php";

    $db = new ConnexionDb();

    $requete = "SELECT idProduit,nomProduit,prixProduit FROM produit WHERE FIND_IN_SET(idProduit, :produits);";

    $res = $db->getConnexion()->prepare($requete);

    $produits = implode(",",$array_prod);

    $res->bindParam(":produits",$produits,PDO::PARAM_INT);

    $res->execute();

    $infos_prod = $res->fetchAll(PDO::FETCH_OBJ);

?>