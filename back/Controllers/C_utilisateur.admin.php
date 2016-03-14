<?php
/**
 * Created by PhpStorm.
 * User: laffu
 * Date: 08/03/2016
 * Time: 14:35
 */

//Définition d'un token pour la sécurité'
$connexion_token = hash('sha512',uniqid('5rDM6y8OP$9A5<8gxù', true));
$_SESSION['utilisateur_token'] = $connexion_token;

include $_SERVER["DOCUMENT_ROOT"] . "/theWood/back/Models/M_utilisateur.php";
$utilisateurs = loadUtilisateurs();
$droits = loadDroits();
include $_SERVER["DOCUMENT_ROOT"] . "/theWood/front/views/V_utilisateur.admin.php";