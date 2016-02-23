<?php

/**
 * Created by PhpStorm.
 * User: laffu
 * Date: 25/01/2016
 * Time: 14:11
 */
class ConnexionDb
{
    private $connexion;
    private $db;

    /**
     * ConnexionDb constructor.
     */
    public function __construct()
    {
        // Récupération des informations de connexion contenu dans le fichier database.ini

        $iniFile = $_SERVER["DOCUMENT_ROOT"] . "/theWood/back/config/database.ini";

        if(file_exists($iniFile)){
            $this->db = parse_ini_file($iniFile);
        }

        try{
            $this->connexion= new PDO($this->db['db_connexion'],$this->db['db_login'],$this->db['db_password'], array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
        }catch(Exception $ex){
            $message = 'Erreur PDO dans ' . $ex->getFile() . ', ligne ' .
            $ex->getLine() . ' : ' . $ex->getMessage();
            die($message);
        }
    }

    /**
     * @return PDO
     */
    public function getConnexion()
    {
        return $this->connexion;
    }


}



