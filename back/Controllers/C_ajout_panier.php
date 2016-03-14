<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 08/03/2016
 * Time: 17:26
 */
    session_start();

    if(isset($_POST["id_produit"]) && isset($_POST["nb_produit"]))
    {

        $id_produit = filter_var($_POST["id_produit"],FILTER_SANITIZE_NUMBER_INT);
        $nb_produit = filter_var($_POST["nb_produit"], FILTER_SANITIZE_NUMBER_INT);

        $change = 0;

        if(isset($_COOKIE["cart"]))
        {
            $panier = unserialize($_COOKIE["cart"]);
            $num=0;
            $id= 0;

            foreach($panier as $p)
            {
                if($p["id"] == $id_produit)
                {
                    $num = $num + intval($p["nb"]);
                    $change = 1;
                    $id = $p["id"];
                }
            }

            $num = $num + intval($nb_produit);

            $nb_produit = $num;

        }

        include $_SERVER["DOCUMENT_ROOT"] . "/theWood/back/Models/M_ajout_panier.php";

        if($nb_produit <=  $stock_produit)
        {

            if(isset($_COOKIE["cart"]) && $change == 1)
            {
                $panier = unserialize($_COOKIE["cart"]);

                foreach($panier as &$p)
                {
                    if($p["id"] == $id_produit)
                    {
                        $p["nb"] = $nb_produit;
                    }
                }

            }
            else if(isset($_COOKIE["cart"]) && $change == 0)
            {
                $panier = unserialize($_COOKIE["cart"]);
                array_push($panier,array("id" => $id_produit, "nb" => $nb_produit));
            }
            else if(!isset($_COOKIE["cart"]))
            {
                $panier = array(array("id" => $id_produit, "nb" => $nb_produit));
            }

            $p = serialize($panier);
            setcookie("cart",$p,time()+86400*2,'/theWood/',null,false,true);

        }
        else
        {
            $_SESSION["overstock"] = "La quantité demandée n'est pas disponible ; quantité en stock : $stock_produit";
        }

        header("location:../../index.php?route=produit&id=$id_produit");
        exit();

    }
    else
    {
        header("location:../../index.php?route=produit&id=$id_produit");
        exit();
    }

?>