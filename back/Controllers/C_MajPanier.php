<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 15/03/2016
 * Time: 14:42
 */

    $panier = unserialize($_COOKIE["cart"]);

    if(isset($_POST["id"]) && isset($_POST["nb"]) && $_POST["nb"] != 0)
    {


        $id = filter_var($_POST["id"],FILTER_SANITIZE_NUMBER_INT);
        $nb = filter_var($_POST["nb"],FILTER_SANITIZE_NUMBER_INT);

        include $_SERVER["DOCUMENT_ROOT"]."/theWood/back/Models/M_MajPanier.php";

        if($valeur == null)
        {
            foreach($panier as $p)
            {
                if($id == intval($p["id"]))
                {
                    echo json_encode((object)array("ok" => "2","nb" => $p["nb"],"overstock" => "1"));
                }
            }
        }
        else
        {
            foreach($panier as &$p)
            {
                if($id == intval($p["id"]))
                {
                    $p["nb"] = $nb;
                    $p = serialize($panier);
                    setcookie("cart",$p,time()+86400*2,'/theWood/',null,false,true);
                    echo json_encode((object)array("ok" => "1" ,"prix" => $nb*$valeur->prixProduit));
                }
            }
        }
    }
    else
    {
        foreach($panier as $p)
        {
            if(filter_var($_POST["id"],FILTER_SANITIZE_NUMBER_INT) == intval($p["id"]))
            {
                echo json_encode((object)array("ok" => "3","nb" => $p["nb"]));
            }
        }
    }

?>