<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 08/02/2016
 * Time: 15:05
 */

    require "ConnexionDb.class.php";

    $db = new ConnexionDb();

    $requete_produits = "SELECT produit.idProduit,
                                    produit.nomProduit,
                                    produit.prixProduit,
                                    theme.libelleTheme,
                                    domaine.libelleDomaine
                             FROM produit
                             INNER JOIN theme ON produit.idTheme = theme.idTheme
                             INNER JOIN domaine ON theme.idDomaine = domaine.idDomaine;";

    $requete_image = "SELECT imageproduit.cheminImage
                          FROM imageproduit
                          WHERE idProduit = :id;";

    $res_produits = $db->getConnexion()->prepare($requete_produits);

    $res_produits->execute();

    $produits = $res_produits->fetchAll(PDO::FETCH_OBJ);

    $res_image = $db->getConnexion()->prepare($requete_image);

    foreach ($produits as $p)
    {
        $res_image->bindParam(":id", $p->idProduit, PDO::PARAM_INT);
        $res_image->execute();
        $p->images = $res_image->fetchAll(PDO::FETCH_OBJ);
    }


?>