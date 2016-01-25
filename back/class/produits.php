<?php

    function getProduits(){

        require "../config/pdo.php";

        $requete_produits = "SELECT * FROM produit";

        $res_produits = $pdo->prepare($requete_produits);

        $res_produits-> execute();

        return $res_produits->fetchAll(PDO::FETCH_OBJ);

    }

    function getProduit($id)
    {
        require "../config/pdo.php";

        $requete_produit = "SELECT * FROM produit WHERE produit.id_produit = :id;";

        $res_produit = $pdo->prepare($requete_produit);

        $res_produit->bindParam(":id", $id, PDO::PARAM_INT);

        $res_produit->execute();

        $produit = $res_produit->fetch(PDO::FETCH_OBJ);

        if($produit === false)
        {
            return null;
        }
        else
        {
            return $produit;
        }
    }

    function insertProduit($id,$nom_produit,$prix,$description,$quantite,$fiche,$type,$theme,$tags = array())
    {
        $requete_produit = "INSERT INTO produit VALUES (:id,:nom_produit,:prix,:description,:)"
    }


    getProduit(2);

?>
