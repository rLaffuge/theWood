<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 08/02/2016
 * Time: 15:08
 */

require_once $_SERVER["DOCUMENT_ROOT"] . "/theWood/back/Models/ConnexionDb.class.php";



function ajout_produit($produit){
    $db = new ConnexionDb();
    $query = "INSERT INTO produit(nomProduit, prixProduit, description, stock, idTheme) VALUES(:nomProduit, :prixProduit, :description, :stock, :idTheme);";

    $res_produit = $db->getConnexion()->prepare($query);
    $res_produit->bindParam(":nomProduit", $produit["nom"], PDO::PARAM_STR);
    $res_produit->bindParam(":prixProduit", $produit["prix"], PDO::PARAM_STR);
    $res_produit->bindParam(":description", $produit["description"], PDO::PARAM_STR);
    $res_produit->bindParam(":stock", $produit["stock"], PDO::PARAM_INT);
    $res_produit->bindParam(":idTheme", $produit["theme"], PDO::PARAM_INT);

    $res_produit->execute();
    return $db->getConnexion()->lastInsertId();
}

?>