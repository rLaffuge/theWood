<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 23/02/2016
 * Time: 16:11
 */

    require_once $_SERVER["DOCUMENT_ROOT"]."/theWood/back/Models/ConnexionDb.class.php";

    $db = new ConnexionDb();

    $requete_domaine = "SELECT idDomaine,libelleDomaine FROM domaine ORDER BY idDomaine;";

$res_domaine = $db->getConnexion()->prepare($requete_domaine);

$res_domaine->execute();

$domaines = $res_domaine->fetchAll(PDO::FETCH_OBJ);

$requete_theme = "SELECT libelleTheme FROM theme WHERE idDomaine = :domaine";

$res_theme = $db->getConnexion()->prepare($requete_theme);

foreach($domaines as $d)
{
    $res_theme->bindParam(":domaine",$d->idDomaine,PDO::PARAM_INT);

    $res_theme->execute();

    $d->themes = $res_theme->fetchAll(PDO::FETCH_OBJ);
}

?>