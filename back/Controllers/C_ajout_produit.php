<?php
/**
 * Created by PhpStorm.
 * User: laffu
 * Date: 01/03/2016
 * Time: 16:28
 */
session_start();
include $_SERVER["DOCUMENT_ROOT"] . "/theWood/back/Models/M_ajout_produit.php";
include $_SERVER["DOCUMENT_ROOT"] . "/theWood/back/Models/M_ajout_image.php";

var_dump($_POST);
$target_dir = $_SERVER["DOCUMENT_ROOT"] . "/theWood/back/images/";


if (!isset($_POST['nom']) && !isset($_POST['theme']) && !isset($_POST['domaine']) && !isset($_POST['prix']) && !isset($_POST['stock']) && !isset($_POST['description']) && !isset($_POST['form_token'])) {
    $message = "Veuillez remplir tout les champs!";
    die($message);
} elseif ($_POST['form_token'] != $_SESSION['form_token']) {
    // On check le token
    $message = "Formulaire invalide!";
    die($message);
} elseif (strlen($_POST['nom']) < 4 || strlen($_POST['nom']) > 20) {
    $message = "fef";
    die($message);
} elseif (!is_numeric($_POST['prix'])) {
    $message = "Le prix doit etre un nombre à virgule";
    die($message);
} elseif (!is_numeric($_POST['stock'])) {
    $message = "Le Stock doit être un nombre!";
    die($message);
} elseif (!is_string($_POST['description'])) {
    $message = "Description invalide!";
    die($message);
} elseif (isset($_FILES['images']) && $_SESSION['MAX_FILE_SIZE'] != $_POST['MAX_FILE_SIZE']) {
    $message = "Un problème est survenu avec les images";
    die($message);
} else {
    $produit = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    var_dump($_FILES['images']);

    try {
        $idProduit = ajout_produit($produit);
        $count_file = count($_FILES["images"]["name"]);
        for ($i = 0; $i < $count_file; $i++) {
            $image_unique = md5(uniqid('image', true));
            $target_file = $target_dir . basename($_FILES["images"]["name"][$i]);
            $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
            $check = getimagesize($_FILES["images"]["tmp_name"][$i]);
            if ($check === false) {
                die("Les fichier envoyé ne sont pas des images!");
            }
            if ($_FILES["images"]["size"][$i] > $_SESSION["MAX_FILE_SIZE"]) {
                die("Taille du fichier trop gande!");
            }
            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
                die("Seul les jpg, png, et jpeg sont acceptés!");
            }

            try {
                $imagePath = $target_dir . $image_unique . '.' . $imageFileType;
                ajout_image("./back/images/" . $image_unique . '.' . $imageFileType , $idProduit);
            } catch (Exception $ex) {
                $message = 'Erreur PDO dans ' . $ex->getFile() . ', ligne ' .
                    $ex->getLine() . ' : ' . $ex->getMessage();
                die($message);
            }
            move_uploaded_file($_FILES["images"]["tmp_name"][$i], $target_dir . $image_unique . '.' . $imageFileType);
        }

        unset($_SESSION['MAX_FILE_SIZE']);
        unset($_SESSION['form_token']);
        header(header("location:../../index.php"));

    } catch (Exception $ex) {
        $message = 'Erreur PDO dans ' . $ex->getFile() . ', ligne ' .
            $ex->getLine() . ' : ' . $ex->getMessage();
        die($message);
    }
}