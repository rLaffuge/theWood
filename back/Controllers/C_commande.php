<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 15/03/2016
 * Time: 16:35
 */

    if(isset($_SESSION["utilisateur"])) {

        if (isset($_COOKIE["cart"]))
        {
            $panier = filter_var_array(unserialize($_COOKIE["cart"]),FILTER_SANITIZE_STRING);

            include $_SERVER["DOCUMENT_ROOT"]."/theWood/back/Models/M_commande.php";

            if(isset($erreur))
            {
                if($erreur == 1)
                {
                    $resultat = "Le produit ".$produit_erreur." n'est plus disponible dans les quantités demandées - quantité en stock : ".$stock_erreur;
                }
                else if($erreur == 2)
                {
                    $resultat = "Erreur lors de la commande - Merci de rééssayer ultérieurement";
                }
            }
            else
            {
                unset($_COOKIE["cart"]);
                setcookie("cart","",time()+1);
                $resultat = "Votre commande a bien été enregistrée";
            }
        }
        else
        {
            $resultat = "Le panier validé était vide - Merci d'ajouter au moins un article avant de commander";
        }
    }
    else
    {
        $resultat = "Vous devez être connecté pour commander";
    }

    include $_SERVER["DOCUMENT_ROOT"] . "/theWood/front/views/V_commande.php";
?>