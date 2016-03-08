<?php
/**
 * Created by PhpStorm.
 * User: laffu
 * Date: 25/01/2016
 * Time: 15:19
 */

session_start();
include $_SERVER["DOCUMENT_ROOT"] . "/theWood/back/Controllers/C_accueil.php";
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
    <link href="./front/fonts/glyphicons-halflings-regular.eot">
    <link href="./front/fonts/glyphicons-halflings-regular.svg">
    <link href="./front/fonts/glyphicons-halflings-regular.woff">
    <link href="./front/fonts/glyphicons-halflings-regular.woff2">
    <link href="./front/fonts/glyphicons-halflings-regular.ttf">
    <link href="./front/css/style.css" rel="stylesheet">

    <!-- jQuery -->
    <script src="front\js\jquery.js"></script>
    <!-- Bootstrap -->
    <script src="front\js\bootstrap.min.js"></script>

</head>
<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="index.php?route=produits">The Wood</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">Produits <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="index.php?route=produits">Tous les produits</a></li>
                        <?php

                        foreach ($domaines as $d) {
                            if (empty($d->themes)) {
                                ?>
                                <li>
                                    <a href="index.php?route=produits&domaine=<?php echo $d->libelleDomaine; ?>"><?php echo $d->libelleDomaine; ?></a>
                                </li>
                                <?php
                            } else {
                                ?>
                                <li class="dropdown-submenu">
                                    <a tabindex="-1"
                                       href="index.php?route=produits&domaine=<?php echo $d->libelleDomaine; ?>"><?php echo $d->libelleDomaine; ?></a>
                                    <ul class="dropdown-menu">
                                        <?php

                                        foreach ($d->themes as $t) {
                                            ?>
                                            <li>
                                                <a href="index.php?route=produits&theme=<?php echo $t->libelleTheme; ?>"><?php echo $t->libelleTheme; ?></a>
                                            </li>
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
                    <a href="#modal-rech" data-toggle="modal">Recherche</a>
                </li>
                <li>
                    <a href="index.php?route=panier">Panier</a>
                </li>
                <?php if (isset($_SESSION['utilisateur'])) {

                    if ($_SESSION['utilisateur']->niveau == '1') { ?>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Administration <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li class="dropdown-header">Produits</li>
                                <li><a href="index.php?route=ajout_produit">Ajouter produit</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something else here</a></li>
                                <li role="separator" class="divider"></li>
                                <li class="dropdown-header">Utilisateurs</li>
                                <li><a href="#">Separated link</a></li>
                                <li><a href="#">One more separated link</a></li>
                            </ul>
                        </li>
                        <?php
                    }
                } ?>
            </ul>
            <?php
            if (isset($_SESSION['utilisateur'])) {
                ?>
                <div class="navbar-form navbar-right">
                    <span
                        class="bonjour text-center">Bonjour <?php echo $_SESSION['utilisateur']->prenom . ' ' . $_SESSION['utilisateur']->nom; ?> </span>
                    <a class="btn btn-danger" href="back/Controllers/C_logout.php">Se déconnecter</a>
                </div>
                <?php
            } else {
                ?>
                <form class="navbar-form navbar-right" method="post"
                      action="back/Controllers/C_connexion_utilisateur.php">
                    <div class="form-group">
                        <input name="login" type="text" placeholder="Login" class="form-control">
                    </div>
                    <div class="form-group">
                        <input name="mdp" type="password" placeholder="Password" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-success">Connexion</button>
                    <a href="index.php?route=inscription" class="btn btn-primary">Inscription</a>
                </form>
            <?php } ?>
        </div><!--/.navbar-collapse -->
    </div>
</nav>


<!-- Contenu du site-->
<div id="corps" class="container">
    <div class="row">
        <?php
        //Définition des routes
        $route = filter_input(INPUT_GET, 'route');
        if (isset($route)) {
            switch ($route) {
                case "commande":
                    include("back/route/commande.admin.php");
                    break;
                case "produits":
                    include("back/route/produits.php");
                    break;
                case "produit":
                    include("back/route/produit.php");
                    break;
                case "ajout_produit":
                    //Verification des droits
                    if (isset($_SESSION['utilisateur']->niveau)) {
                        if ($_SESSION['utilisateur']->niveau == 1) {
                            include("back/route/produit.admin.php");
                        }else{
                            include("back/route/pasDroit.php");
                        }
                    }else{
                        include("back/route/pasDroit.php");
                    }
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
        } else {
            include("back/route/produits.php");
        }

        ?>
    </div>
</div>

<div class="modal fade" id="modal-rech">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Recherche Avancée</h4>
			</div>
            <form method="post" action="index.php?route=produits">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="rech_produit">Produit : </label>
                        <input type="text" id="rech_produit" name="rech_produit" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="rech_prix_min">Prix Min : </label>
                        <input type="text" id="rech_prix_min" name="rech_prix_min" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="rech_prix_max">Prix Max : </label>
                        <input type="text" id="rech_prix_max" name="rech_prix_max" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="rech_domaine">Domaine : </label>
                        <select name="rech_domaine" id="rech_domaine" class="form-control">
                            <option value="">---Domaine---</option>
                            <?php foreach($domaines as $d){echo "<option value='$d->idDomaine'>$d->libelleDomaine</option>";} ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="rech_theme">Theme : </label>
                        <select name="rech_theme" id="rech_theme" class="form-control">
                        </select>
                    </div>
                    <div class="form-inline">
                        <label for="rech_stock">Afficher uniquement les produits en stock : </label>
                        <input type="checkbox" class="checkbox" id="rech_stock" name="rech_stock">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Rechercher</button>
                </div>
            </form>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script src="./front/js/app.js"></script>
</body>
</html>
