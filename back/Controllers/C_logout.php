<?php
/**
 * Created by PhpStorm.
 * User: laffu
 * Date: 23/02/2016
 * Time: 17:31
 */

session_start();
session_destroy();
header('location:../../index.php');