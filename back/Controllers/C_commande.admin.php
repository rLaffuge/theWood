<?php
/**
 * Created by PhpStorm.
 * User: laffu
 * Date: 08/03/2016
 * Time: 17:24
 */
include $_SERVER["DOCUMENT_ROOT"] . "/theWood/back/Models/M_commande.admin.php";
$commandes = loadCommandes();
include $_SERVER["DOCUMENT_ROOT"] . "/theWood/front/views/V_commande.admin.php";
