<?php


    if(isset($_GET["id"]) && intval($_GET["id"])!==0)
    {
        include("./back/Models/M_produit.php");
        include("./front/views/V_produit.php");
    }
    else
    {
        header("location:index.php");
        exit();
    }

?>