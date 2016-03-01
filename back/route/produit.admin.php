<?php
/**
 * Created by PhpStorm.
 * User: laffu
 * Date: 08/02/2016
 * Time: 14:08
 */

$form_token = md5(uniqid('auth', true));
$_SESSION['form_token'] = $form_token;

?>

<form action="back/Controllers/C_" method="post" >

</form>
