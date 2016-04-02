<?php
/**
 * Created by PhpStorm.
 * User: laffu
 * Date: 15/03/2016
 * Time: 17:30
 */
require_once $_SERVER["DOCUMENT_ROOT"]."/theWood/back/Models/ConnexionDb.class.php";

function load_input($page){
    $db = new ConnexionDb();
    $query = "SELECT * FROM input_meta WHERE page=:page";

    $res_modif = $db->getConnexion()->prepare($query);
    $res_modif->bindParam(":page", $page, PDO::PARAM_STR);
    $res_modif->execute();

    $modif = $res_modif->fetchAll(PDO::FETCH_OBJ);
    return $modif;

}

function load_select($table){
    $db = new ConnexionDb();
    $query = "SELECT * FROM $table";

    $res_table = $db->getConnexion()->prepare($query);
    $res_table->execute();

    $table_select = $res_table->fetchAll(PDO::FETCH_OBJ);
    return $table_select;
}