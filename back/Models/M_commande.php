<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 15/03/2016
 * Time: 16:53
 */

    require_once "ConnexionDb.class.php";

    $db = new ConnexionDb();

    $requete = "SELECT nomProduit,stock FROM produit WHERE idProduit = :id;";

    $res = $db->getConnexion()->prepare($requete);

    foreach($panier as $p)
    {
        $res->bindParam(":id",$p["id"],PDO::PARAM_INT);

        $res->execute();

        $stock = $res->fetch(PDO::FETCH_OBJ);

        if($stock->stock < intval($p["nb"]))
        {
            $erreur = 1;
            $produit_erreur = $stock->nomProduit;
            $stock_erreur = $stock->stock;
            break;
        }

        $res->closeCursor();
    }

    if(!isset($erreur))
    {
        $user = $_SESSION["utilisateur"]->login;

        $requete_prix = "SELECT prixProduit FROM produit WHERE idProduit = :id;";

        $res = $db->getConnexion()->prepare($requete_prix);

        $prixtotal = 0;

        foreach($panier as $p)
        {
            $res->bindParam(":id",$p["id"],PDO::PARAM_INT);

            $res->execute();

            $resultat = $res->fetch(PDO::FETCH_OBJ);

            $prixtotal = $prixtotal + (intval($p["nb"])*$resultat->prixProduit);

            $res->closeCursor();
        }

        $requete_commande = "INSERT INTO commande(idUser,prix,dateCommande) VALUES ((SELECT idUser FROM user WHERE login = :login),:prix,CURDATE());";

        $requete_produit_commande = "INSERT INTO commande_produit VALUES (:idp,:idc,:qt);";

        $requete_produit = "UPDATE produit SET stock = stock - :st WHERE idProduit = :id;";

        $res_commande = $db->getConnexion()->prepare($requete_commande);
        $res_commande_produit = $db->getConnexion()->prepare($requete_produit_commande);
        $res_produit = $db->getConnexion()->prepare($requete_produit);

        try {
            $db->getConnexion()->beginTransaction();

            $res_commande->bindParam(":login",$user,PDO::PARAM_STR);
            $res_commande->bindParam(":prix",$prixtotal,PDO::PARAM_STR);

            $res_commande->execute();

            $id_commande = $db->getConnexion()->lastInsertId();

            foreach($panier as $p)
            {
                $res_commande_produit->bindParam(":idc",$id_commande,PDO::PARAM_INT);
                $res_commande_produit->bindParam(":idp",$p["id"],PDO::PARAM_INT);
                $res_commande_produit->bindParam(":qt",$p["nb"],PDO::PARAM_INT);

                $res_commande_produit->execute();


                $res_produit->bindParam(":st",$p["nb"],PDO::PARAM_INT);
                $res_produit->bindParam(":id",$p["id"],PDO::PARAM_INT);

                $res_produit->execute();

            }

            $db->getConnexion()->commit();

        }
        catch(PDOException $e) {
            $db->getConnexion()->rollBack();
            $erreur = 2;
        }


    }


?>