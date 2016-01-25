<?php

    $db_host="127.0.0.1";
    $db_name="myprod";
    $db_user="root";
    $db_pass="";

    try{
        $pdo = new PDO("mysql:host=".$db_host.";dbname=".$db_name,$db_user,$db_pass,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
    catch(Exception $e)
    {
        $message = 'Erreur PDO dans ' . $e->getFile() . ', ligne ' . $e->getLine() . ' : ' . $e->getMessage();
        die($message);
    }

?>