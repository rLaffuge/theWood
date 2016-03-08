<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 23/02/2016
 * Time: 16:11
 */

require_once $_SERVER["DOCUMENT_ROOT"]."/theWood/back/Models/ConnexionDb.class.php";

function loadDomaine(){
    $db = new ConnexionDb();

    $requete_domaine = "SELECT idDomaine,libelleDomaine FROM domaine ORDER BY idDomaine;";

    $res_domaine = $db->getConnexion()->prepare($requete_domaine);

    $res_domaine->execute();

    $domaines = $res_domaine->fetchAll(PDO::FETCH_OBJ);
    return $domaines;
}

