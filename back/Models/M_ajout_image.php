<?php
/**
 * Created by PhpStorm.
 * User: laffu
 * Date: 07/03/2016
 * Time: 14:04
 */
require_once $_SERVER["DOCUMENT_ROOT"] . "/theWood/back/Models/ConnexionDb.class.php";

function ajout_image($imagePath, $idProduit){
    $db = new ConnexionDb();
    $query = "INSERT INTO imageproduit(cheminImage, idProduit) VALUES(:cheminImage, :idProduit);";

    $res_image = $db->getConnexion()->prepare($query);
    $res_image->bindParam(":cheminImage", $imagePath, PDO::PARAM_STR);
    $res_image->bindParam(":idProduit", $idProduit, PDO::PARAM_INT);

    $res_image->execute();
}
