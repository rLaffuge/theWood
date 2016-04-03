<table class="table table-bordered">
    <thead>
        <tr>
            <th>Produit</th>
            <th>Quantité</th>
            <th>Prix</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $prix_total = 0;
        foreach($infos_prod as $p){ ?>
            <tr>
                <td><?php echo $p->nomProduit; ?></td>
                <?php

                    foreach($panier as $pp)
                          {
                              if(intval($pp["id"]) == $p->idProduit)
                              {
                                  echo "<td><input type='number' min='1' value='".$pp["nb"]."' class='nb_panier' id='article".$pp["id"]."'></td>";
                                  echo "<td class='prixpanier'>".intval($pp["nb"])*$p->prixProduit." €</td>";
                                  echo "<td><button class='btn btn-danger suppr_article' id='".$pp["id"]."'><span class='glyphicon glyphicon-remove'></span></button></td>";
                                  $prix_total = $prix_total + intval($pp["nb"])*$p->prixProduit;
                              }

                          }
                ?>
            </tr>
        <?php } ?>
    </tbody>
</table>
<div class="col-lg-12"><span class="pull-right"> Prix Total : <span id="prixTotal"><?php echo $prix_total; ?></span> €</span></div>
<div class="col-lg-12"><hr></div>
<div class="col-lg-12">
    <form method="post" action="../../theWood/back/Controllers/C_commande.php">
        <button type="submit" class="pull-right btn btn-success"><span>Commander</span></button>
    </form>
</div>
<div class="col-lg-12 alert alert-danger" id="alert_panier"></div>