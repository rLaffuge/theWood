<?php
/**
 * Created by PhpStorm.
 * User: laffu
 * Date: 08/02/2016
 * Time: 14:28
 */

$form_token = md5(uniqid('auth', true));
$_SESSION['form_token'] = $form_token;

?>
    <form action="back/Controllers/C_ajout_utilisateur.php" method="post" role="form" class="col-lg-offset-4 col-lg-4">
        <legend>Inscription</legend>

        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" class="form-control" name="nom" id="nom">
        </div>

        <div class="form-group">
            <label for="prenom">Prenom</label>
            <input type="text" class="form-control" name="prenom" id="prenom">
        </div>

        <div class="form-group">
            <label for="login">Login</label>
            <input type="text" class="form-control" name="login" id="login">
        </div>

        <div class="form-group">
            <label for="mdp" class="control-label">Password:</label>
            <input type="password" class="form-control" id="mdp" name="mdp">
        </div>
        <input type="hidden" id="form_token" name="form_token" value="<?php echo $form_token; ?>">
        <button type="submit" class="btn btn-primary pull-right">S'inscrire</button>
    </form>
