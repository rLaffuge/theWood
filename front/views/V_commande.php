<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Site de vente">
    <title>The Wood</title>

    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../fonts/glyphicons-halflings-regular.eot">
    <link href="../fonts/glyphicons-halflings-regular.svg">
    <link href="../fonts/glyphicons-halflings-regular.woff">
    <link href="../fonts/glyphicons-halflings-regular.woff2">
    <link href="../fonts/glyphicons-halflings-regular.ttf">
    <link href="../css/style.css" rel="stylesheet">

    <!-- jQuery -->
    <script src="../js/jquery.js"></script>
    <!-- Bootstrap -->
    <script src="../js/bootstrap.min.js"></script>

</head>
<body>
<div class="container">
    <div class="jumbotron">
        <?php echo "<span class='glyphicon glyphicon-warning-sign'></span> ".$_SESSION["resultat_commande"]; ?>
    </div>

    <div class="container">
        <a href="../../index.php?route=produits">Retour à l'accueil</a>
    </div>
</div>
    <?php
        unset($_SESSION["resultat_commande"]);
    ?>

</body>
</html>
