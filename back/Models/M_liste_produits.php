<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 08/02/2016
 * Time: 15:05
 */

    require_once "ConnexionDb.class.php";

    $db = new ConnexionDb();

    $requete_produits = "SELECT produit.idProduit,
                                    produit.nomProduit,
                                    produit.prixProduit,
                                    theme.libelleTheme,
                                    domaine.libelleDomaine
                             FROM produit
                             INNER JOIN theme ON produit.idTheme = theme.idTheme
                             INNER JOIN domaine ON theme.idDomaine = domaine.idDomaine";

    $requete_image = "SELECT imageproduit.cheminImage
                              FROM imageproduit
                              WHERE idProduit = :id;";


    if($critere_get != null)
    {
        $requete_produits.= " WHERE ".key($critere_get).".libelle".ucwords(key($critere_get))." = :critere;";
    }
    else if(isset($critere_post) && $critere_post != null)
    {
        $premier = true;

        if(isset($rech_produit))
        {
            $requete_produits.= " WHERE nomProduit LIKE :produit ";
            $premier = false;
        }

        if(isset($rech_prix_min))
        {
            if($premier == true)
            {
                $requete_produits.= " WHERE prixProduit >= :prix_min ";
                $premier = false;
            }
            else
            {
                $requete_produits.= " AND prixProduit >= :prix_min ";
            }
        }

        if(isset($rech_prix_max))
        {
            if($premier == true)
            {
                $requete_produits.= " WHERE prixProduit <= :prix_max ";
                $premier = false;
            }
            else
            {
                $requete_produits.= " AND prixProduit <= :prix_max ";
            }
        }

        if(isset($rech_domaine))
        {
            if($premier == true)
            {
                $requete_produits.= " WHERE domaine.idDomaine = :domaine ";
                $premier = false;
            }
            else
            {
                $requete_produits.= " AND domaine.idDomaine = :domaine ";
            }
        }

        if(isset($rech_theme))
        {
            if($premier == true)
            {
                $requete_produits.= " WHERE theme.idTheme = :theme ";
                $premier = false;
            }
            else
            {
                $requete_produits.= " AND theme.idTheme = :theme ";
            }
        }

        if(isset($rech_stock))
        {
            if($premier == true)
            {
                $requete_produits.= " WHERE stock > 0 ";
                $premier = false;
            }
            else
            {
                $requete_produits.= " AND stock > 0 ";
            }
        }

        $requete_produits.= ";";
    }
    else
    {
        $requete_produits.=";";
    }


    $res_produits = $db->getConnexion()->prepare($requete_produits);

    if($critere_get != null)
    {
        $res_produits->bindParam(":critere",$critere_get[key($critere_get)],PDO::PARAM_STR);
    }
    else if(isset($critere_post) && $critere_post != null)
    {
        if(isset($rech_produit))
        {
            $rech_produit = "%".$rech_produit."%";
            $res_produits->bindParam(":produit",$rech_produit,PDO::PARAM_STR);
        }

        if(isset($rech_prix_min))
        {
            $res_produits->bindParam(":prix_min",$rech_prix_min,PDO::PARAM_STR);
        }

        if(isset($rech_prix_max))
        {
            $res_produits->bindParam(":prix_max",$rech_prix_max,PDO::PARAM_STR);
        }

        if(isset($rech_domaine))
        {
            $res_produits->bindParam(":domaine",$rech_domaine,PDO::PARAM_INT);
        }

        if(isset($rech_theme))
        {
            $res_produits->bindParam(":theme",$rech_theme,PDO::PARAM_INT);
        }
    }

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