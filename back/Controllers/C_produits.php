<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 23/02/2016
 * Time: 15:44
 */

    $critere_get = null;


    if($_SERVER['REQUEST_METHOD'] == "GET")
    {
        if(isset($_GET["domaine"]))
        {
            $critere_get = array('domaine' => $_GET["domaine"]);
        }
        else if(isset($_GET["theme"]))
        {
            $critere_get = array('theme' => $_GET["theme"]);
        }
    }
    else if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $critere_post = true;

        if(isset($_POST["rech_produit"]) && $_POST["rech_produit"] != "")
        {
            $rech_produit = filter_var($_POST["rech_produit"],FILTER_SANITIZE_STRING);
            $critere_post = true;
        }

        if(isset($_POST["rech_prix_min"]) && preg_match("/^[0-9]+([.]?[0-9]{1,2})$/",$_POST["rech_prix_min"]))
        {
            $rech_prix_min = filter_var($_POST["rech_prix_min"],FILTER_SANITIZE_STRING);
            $critere_post = true;
        }

        if(isset($_POST["rech_prix_max"]) && preg_match("/^[0-9]+([.]?[0-9]{1,2})$/",$_POST["rech_prix_max"]))
        {

            $rech_prix_max = filter_var($_POST["rech_prix_max"],FILTER_SANITIZE_STRING);
            $critere_post = true;
        }

        if(isset($_POST["rech_domaine"]) && $_POST["rech_domaine"] != "")
        {
            $rech_domaine = filter_var($_POST["rech_domaine"],FILTER_SANITIZE_NUMBER_INT);
            $critere_post = true;
        }

        if(isset($_POST["rech_theme"]) && $_POST["rech_theme"] != "")
        {
            $rech_theme = filter_var($_POST["rech_theme"],FILTER_SANITIZE_NUMBER_INT);
            $critere_post = true;
        }

        if(isset($_POST["rech_stock"]))
        {
            $rech_stock = true;
            $critere_post = true;
        }

    }
    else
    {
        die("Requête non autorisée");
    }

    include $_SERVER["DOCUMENT_ROOT"]."/theWood/back/Models/M_liste_produits.php";
    include $_SERVER["DOCUMENT_ROOT"]."/theWood/front/views/V_liste_produits.php";


?>