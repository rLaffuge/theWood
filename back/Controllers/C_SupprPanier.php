<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 15/03/2016
 * Time: 16:02
 */
    $panier = unserialize($_COOKIE["cart"]);

    if(isset($_POST["id"]))
    {
        $id = filter_var($_POST["id"],FILTER_SANITIZE_NUMBER_INT);

        foreach($panier as $key => &$p)
        {
            if($id == intval($p["id"]))
            {
                unset($panier[$key]);
            }
        }

        if(empty($panier))
        {
            unset($_COOKIE["cart"]);
            setcookie("cart","",time()+1,'/',null,false,true);
        }
        else
        {
            $p = serialize($panier);
            setcookie("cart",$p,time()+86400*2,'/',null,false,true);
        }


        echo "1";
    }
    else
    {
        echo "0";
    }

?>