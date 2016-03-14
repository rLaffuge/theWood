<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 14/03/2016
 * Time: 16:01
 */

    if(isset($_COOKIE["cart"]))
    {
        $p = unserialize($_COOKIE["cart"]);
        $panier = filter_var_array($p,FILTER_SANITIZE_STRING);

        $array_prod = array();

        foreach($panier as $produit)
        {
            array_push($array_prod,$produit["id"]);
        }

        include $_SERVER["DOCUMENT_ROOT"]."/theWood/back/Models/M_panier.php";
        include $_SERVER["DOCUMENT_ROOT"]."/theWood/front/views/V_panier.php";
    }
    else
    {
        echo "<div class='jumbotron'>Panier vide</div>";
    }

?>