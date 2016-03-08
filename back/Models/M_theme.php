<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 23/02/2016
 * Time: 16:11
 */

require_once $_SERVER["DOCUMENT_ROOT"] . "/theWood/back/Models/ConnexionDb.class.php";


function loadTheme($idDomaine){
    $db = new ConnexionDb();
    $requete_theme = "SELECT idTheme, libelleTheme FROM theme WHERE idDomaine = :domaine";

    $res_theme = $db->getConnexion()->prepare($requete_theme);

    $res_theme->bindParam(":domaine", $idDomaine, PDO::PARAM_INT);

    $res_theme->execute();

    $themes = $res_theme->fetchAll(PDO::FETCH_OBJ);

    return $themes;
}

?>