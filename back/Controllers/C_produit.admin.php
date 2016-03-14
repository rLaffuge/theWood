<?php
/**
 * Created by PhpStorm.
 * User: laffu
 * Date: 08/03/2016
 * Time: 09:28
 */

//Définition d'un token pour la sécurité'
$form_token = md5(uniqid('auth', true));
$_SESSION['form_token'] = $form_token;
//Définition de la taille max des fichiers
$_SESSION['MAX_FILE_SIZE'] = 1048576;

include $_SERVER["DOCUMENT_ROOT"] . "/theWood/front/views/V_produits.admin.php";
