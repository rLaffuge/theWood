<?php

    if(isset($_GET["id"]) && is_int(intval($_GET["id"])))
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