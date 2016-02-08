<table class="table table-hover table-bordered table-responsive">
    <thead>
        <th>Image Produit</th>
        <th>Produit</th>
        <th>Prix Unitaire</th>
        <th>Theme</th>
        <th>Domaine</th>
    </thead>
    <tbody>

<?php

    foreach($produits as $p)
    {

        echo "<tr>";
        echo "<td><a href=\"index.php?route=produit&id=".$p->idProduit."\"><img src=\"".$p->images[0]->cheminImage."\" class=\"img\"></a></td>";
        echo "<td>".$p->nomProduit."</td>";
        echo "<td>".$p->prixProduit."€</td>";
        echo "<td>".$p->libelleTheme."</td>";
        echo "<td>".$p->libelleDomaine."</td>";
        echo "</tr>";

    }

?>

    </tbody>
</table>