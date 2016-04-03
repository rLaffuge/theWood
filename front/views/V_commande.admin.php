<?php
/**
 * Created by PhpStorm.
 * User: laffu
 * Date: 08/03/2016
 * Time: 17:23
 */
?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title text-center">Consulter commandes</h3>
    </div>
    <div class="panel-body">
        <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <th>ID commande</th>
                <th>Destinataire</th>
                <th>Date de commande</th>
                <th>Prix</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($commandes as $c) {
                ?>
                <tr>
                    <td><?php echo $c->idCommande; ?></td>
                    <td><?php echo $c->nom . ' ' . $c->prenom; ?></td>
                    <td><?php echo $c->dateCommande; ?></td>
                    <td><?php echo $c->prix; ?> €</td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    </div>
</div>
