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
                                  echo "<td>".$pp["nb"]."</td>";
                                  echo "<td>".intval($pp["nb"])*$p->prixProduit." €</td>";
                                  $prix_total = $prix_total + intval($pp["nb"])*$p->prixProduit;
                              }

                          }
                ?>
            </tr>
        <?php } ?>
    </tbody>
</table>
<div class="col-lg-12"><span class="pull-right"> Prix Total : <?php echo $prix_total; ?> €</span></div>