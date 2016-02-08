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
        <title>Page Title</title>

        <!-- Bootstrap -->
        <link href="front\css\bootstrap.min.css" rel="stylesheet">


    </head>
    <body>
        <nav class="navbar navbar-inverse">
        	<a class="navbar-brand" href="#">The Wood</a>
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
        </nav>

        <!-- Contenu du site-->
        <div class="container-fluid">
            <?php
            $route = filter_input(INPUT_GET, 'route');
            if(isset($route)){
                switch ($route){
                    case "accueil":
                        include("back/route/home.php");
                        break;
                    case "admin":
                        include("back/route/admin.php");
                        break;
                    case "panier":
                        include("back/route/panier.php");
                        break;
                    default:
                        include("back/route/404.php");
                }
            }else{
                include("back/route/home.php");
            }


            ?>
        </div>
        <!-- jQuery -->
        <script src="front\js\jquery.js"></script>
        <!-- Bootstrap -->
        <script src="front\js\bootstrap.min.js"></script>
    </body>
</html>

