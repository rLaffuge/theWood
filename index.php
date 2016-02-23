<?php
/**
 * Created by PhpStorm.
 * User: laffu
 * Date: 25/01/2016
 * Time: 15:19
 */

session_start();
include $_SERVER["DOCUMENT_ROOT"]."/theWood/back/Controllers/C_accueil.php";

?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Site de vente">
        <title>The Wood</title>

        <!-- Bootstrap -->
        <link href="./front/css/bootstrap.min.css" rel="stylesheet">
        <link href="./front/css/style.css" rel="stylesheet">


    </head>
    <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php?route=accueil">The Wood</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="index.php?route=accueil">Accueil</a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Produits <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="index.php?route=produits">Tous les produits</a></li>
                            <?php

                                foreach($domaines as $d)
                                {
                                    if(empty($d->themes))
                                    {
                            ?>
                                        <li><a href="index.php?route=produits&domaine=<?php echo $d->libelleDomaine; ?>"><?php echo $d->libelleDomaine; ?></a></li>
                            <?php
                                    }
                                    else
                                    {
                             ?>
                                        <li class="dropdown-submenu">
                                            <a tabindex="-1" href="index.php?route=produits&domaine=<?php echo $d->libelleDomaine; ?>"><?php echo $d->libelleDomaine; ?></a>
                                            <ul class="dropdown-menu">
                                                <?php

                                                    foreach($d->themes as $t)
                                                    {
                                                ?>
                                                        <li><a href="index.php?route=produits&theme=<?php echo $t->libelleTheme; ?>"><?php echo $t->libelleTheme; ?></a></li>
                                                <?php

                                                    }

                                                ?>
                                            </ul>
                                        </li>
                            <?php
                                    }
                                }

                            ?>

                        </ul>
                    </li>
                    <li>
                        <a href="index.php?route=panier">Panier</a>
                    </li>
                    <li>
                        <a href="index.php?route=admin">Admin</a>
                    </li>
                </ul>
                <form class="navbar-form navbar-right">
                    <div class="form-group">
                        <input type="text" placeholder="Login" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="password" placeholder="Password" class="form-control">
                    </div>
                    <a href="index.php?route=inscription" class="btn btn-primary">Inscription</a>
                    <button type="submit" class="btn btn-success">Connexion</button>
                </form>
            </div><!--/.navbar-collapse -->
        </div>
    </nav>
    

        <!-- Contenu du site-->
        <div id="corps" class="container">
            <div class="row">
            <?php
            $route = filter_input(INPUT_GET, 'route');
            if(isset($route)){
                switch ($route){
                    case "accueil":
                        include("back/route/accueil.php");
                        break;
                    case "commande":
                        include("back/route/commande.admin.php");
                        break;
                    case "produits":
                        include("back/route/produits.php");
                        break;
                    case "produit":
                        include("back/route/produit.php");
                        break;
                    case "produitadmin":
                        include("back/route/produit.admin.php");
                        break;
                    case "panier":
                        include("back/route/panier.php");
                        break;
                    case "inscription":
                        include("back/route/inscription.php");
                        break;
                    default:
                        include("back/route/404.php");
                }
            }else{
                include("back/route/accueil.php");
            }


            ?>
            </div>
        </div>

        <!-- jQuery -->
        <script src="front\js\jquery.js"></script>
        <!-- Bootstrap -->
        <script src="front\js\bootstrap.min.js"></script>
    </body>
</html>

