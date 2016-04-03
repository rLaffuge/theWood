<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 15/03/2016
 * Time: 16:35
 */
    session_start();

    if(isset($_SESSION["utilisateur"])) {

        if (isset($_COOKIE["cart"]))
        {
            $panier = filter_var_array(unserialize($_COOKIE["cart"]),FILTER_SANITIZE_STRING);

            include $_SERVER["DOCUMENT_ROOT"]."/theWood/back/Models/M_commande.php";

            if(isset($erreur))
            {
                if($erreur == 1)
                {
                    $_SESSION["resultat_commande"] = "Le produit ".$produit_erreur." n'est plus disponible dans les quantités demandées - quantité en stock : ".$stock_erreur;
                }
                else if($erreur == 2)
                {
                    $_SESSION["resultat_commande"] = "Erreur lors de la commande - Merci de rééssayer ultérieurement";
                }
            }
            else
            {
                unset($_COOKIE["cart"]);
                setcookie("cart","",time()+1,'/',null,false,true);
                $_SESSION["resultat_commande"] = "Votre commande a bien été enregistrée";
            }
        }
        else
        {
            $_SESSION["resultat_commande"] = "Le panier validé était vide - Merci d'ajouter au moins un article avant de commander";
        }
    }
    else
    {
        $_SESSION["resultat_commande"] = "Vous devez être connecté pour commander";
    }

    include $_SERVER["DOCUMENT_ROOT"] . "/theWood/front/views/V_commande.php";
?>