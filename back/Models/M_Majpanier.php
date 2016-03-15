<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 15/03/2016
 * Time: 14:46
 */

    require_once "ConnexionDb.class.php";

    $db = new ConnexionDb();

    $requete_stock = "SELECT stock,prixProduit FROM produit WHERE idProduit = :id AND stock>= :nb;";

    $res_stock = $db->getConnexion()->prepare($requete_stock);

    $res_stock->bindParam(":id", $id, PDO::PARAM_INT);
    $res_stock->bindParam(":nb", $nb, PDO::PARAM_INT);

    $res_stock->execute();

    $valeur = $res_stock->fetch(PDO::FETCH_OBJ);

    if($valeur === false)
    {
        $valeur = null;
    }


?>