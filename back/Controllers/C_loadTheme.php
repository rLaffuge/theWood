<?php
/**
 * Created by PhpStorm.
 * User: laffu
 * Date: 07/03/2016
 * Time: 10:48
 */

include $_SERVER["DOCUMENT_ROOT"] . "/theWood/back/Models/M_theme.php";

if (isset($_POST['idDomaine'])) {

    $idDomaine = htmlentities(intval($_POST['idDomaine']));

    $themes = loadTheme($idDomaine);

    // envoi du résultat au success
    echo json_encode($themes);
}

