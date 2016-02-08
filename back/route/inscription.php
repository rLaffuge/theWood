<?php
/**
 * Created by PhpStorm.
 * User: laffu
 * Date: 08/02/2016
 * Time: 14:28
 */

?>

<div class="row">
    <form action="gestion_utilisateur?action=inscription" method="post" role="form" class="col-lg-offset-2 col-lg-4">
        <legend>Inscription</legend>

        <div class="form-group">
            <label for="login">Login</label>
            <input type="text" class="form-control" name="login" id="login">
        </div>

        <div class="form-group">
            <label for="password" class="control-label">Password:</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>

        <button type="submit" class="btn btn-primary">S'inscrire</button>
    </form>
</div>
