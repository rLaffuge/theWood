<?php
/**
 * Created by PhpStorm.
 * User: laffu
 * Date: 25/01/2016
 * Time: 15:19
 */

session_start();
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Site de vente">
        <title>The Wood</title>

        <!-- Bootstrap -->
        <link href="front\css\bootstrap.min.css" rel="stylesheet">


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
        <div class="container-fluid">
            <?php
            $route = filter_input(INPUT_GET, 'route');
            if(isset($route)){
                switch ($route){
                    case "accueil":
                        include("back/route/acceuil.php");
                        break;
                    case "commande":
                        include("back/route/commande.admin.php");
                        break;
                    case "produit":
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
                include("back/route/acceuil.php");
            }


            ?>
        </div>
        <!-- jQuery -->
        <script src="front\js\jquery.js"></script>
        <!-- Bootstrap -->
        <script src="front\js\bootstrap.min.js"></script>
    </body>
</html>

