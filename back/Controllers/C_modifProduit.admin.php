<?php
/**
 * Created by PhpStorm.
 * User: laffu
 * Date: 15/03/2016
 * Time: 17:17
 */

include $_SERVER["DOCUMENT_ROOT"] ."/theWood/back/Models/M_input_meta.php";

$inputs = load_input("modif");

//On récupère les données dans les tables si le type est select
foreach ($inputs as $input) {
    if ($input->type == 'select') {
        $input->data_table = load_select($input->table_meta);
    }
}

include $_SERVER["DOCUMENT_ROOT"] ."/theWood/front/views/V_modifProduit.admin.php";
