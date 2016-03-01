<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 08/02/2016
 * Time: 15:07
 */

    require_once "ConnexionDb.class.php";

    $id = $_GET["id"];

    $db = new ConnexionDb();

    $requete_produit = "SELECT produit.idProduit,
                               produit.nomProduit,
                               produit.description,
                               produit.prixProduit,
                               produit.stock,
                               theme.libelleTheme,
                               domaine.libelleDomaine
                        FROM produit
                        INNER JOIN theme ON produit.idTheme = theme.idTheme
                        INNER JOIN domaine ON theme.idDomaine = domaine.idDomaine
                        WHERE produit.idProduit = :id;";

    $requete_image = "SELECT imageproduit.cheminImage
                      FROM imageproduit
                      WHERE idProduit = :id;";

    $requete_tag = "SELECT libelleTag FROM tag
                    INNER JOIN produit_tag ON tag.idTag = produit_tag.idTag
                    WHERE idProduit = :id;";

    $res_produit = $db->getConnexion()->prepare($requete_produit);

    $res_produit->bindParam(":id", $id, PDO::PARAM_INT);

    $res_produit->execute();

    $produit = $res_produit->fetch(PDO::FETCH_OBJ);

    $res_image = $db->getConnexion()->prepare($requete_image);

    $res_image->bindParam(":id", $produit->idProduit, PDO::PARAM_INT);

    $res_image->execute();

    $produit->images = $res_image->fetchAll(PDO::FETCH_OBJ);

    $res_tag = $db->getConnexion()->prepare($requete_tag);

    $res_tag->bindParam(":id", $produit->idProduit, PDO::PARAM_INT);

    $res_tag->execute();

    $produit->tags = $res_tag->fetchAll(PDO::FETCH_OBJ);

?>