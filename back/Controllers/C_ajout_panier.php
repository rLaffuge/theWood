<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 08/03/2016
 * Time: 17:26
 */

    if(isset($_POST["id_produit"]) && isset($_POST["nb_produit"]))
    {
        $id_produit = filter_var($_POST["id_produit"],FILTER_SANITIZE_NUMBER_INT);

        include $_SERVER["DOCUMENT_ROOT"] . "/theWood/back/Models/M_ajout_panier.php";

        if(intval($_POST["nb_produit"]) <=  $stock_produit)
        {
            setcookie();
        }
        else
        {
            $_SESSION["overstock"]= "La quantité demandée n'est pas disponible ; qt en stock : $stock_produit";
        }

    }
    else
    {
        header("location:index.php?route=produits");
    }