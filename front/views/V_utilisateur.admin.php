<?php
/**
 * Created by PhpStorm.
 * User: laffu
 * Date: 08/03/2016
 * Time: 14:36
 */


?>

<div class="panel panel-default">
    <div class="panel-body">
        <form action="./back/Controllers/C_update_utilisateur.php" method="post" role="form">
            <legend>Droits utilisateurs</legend>

            <div class="form-group">
                <label for="utilisateur">Utilisateur:</label>
                <select class="form-control" name="utilisateur" id="utilisateur">
                    <?php
                    foreach ($utilisateurs as $u) {
                        ?>
                        <option value="<?php echo $u->idUser; ?>"><?php echo $u->nom . ' ' . $u->prenom; ?></option>
                        <?php
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="droit">Droit:</label>
                <select class="form-control" name="droit" id="droit">
                    <?php
                    foreach ($droits as $d) {
                        ?>
                        <option value="<?php echo $d->idTypeUser; ?>"><?php echo $d->libelle; ?></option>
                        <?php
                    }
                    ?>
                </select>
            </div>
            <input type="hidden" id="utilisateur_token" name="utilisateur_token"
                   value="<?php echo $_SESSION['utilisateur_token']; ?>">
            <button type="submit" class="btn btn-primary pull-right"><i class="glyphicon glyphicon-pencil"></i> Modifier
            </button>
        </form>
    </div>
</div>

