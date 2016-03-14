<h2><?php echo $produit->nomProduit; ?></h2>
<div class="row">

    <div class="col-lg-6">
        <p>
            <a href="#modal-id" data-toggle="modal"><img src="<?php echo $produit->images[0]->cheminImage; ?>" alt="image principale" class="image_principale" /></a>
        </p>

        <div class="images_secondaires">
            <?php for($i=1;$i<sizeof($produit->images);$i++){ ?>
            <a href="#modal-id" data-toggle="modal"><img src="<?php echo $produit->images[$i]->cheminImage; ?>" /></a>
            <?php } ?>
        </div>

        <div class="tags">
            <?php foreach($produit->tags as $tag){ echo $tag->libelleTag." ; "; } ?>
        </div>
    </div>

    <div class="col-lg-6">
        <form method="post" action="../../theWood/back/Controllers/C_ajout_panier.php">
        <table class="table table-bordered">
            <tr>
                <td>Référence</td>
                <td><?php echo $produit->idProduit; ?><input type="hidden" name="id_produit" value="<?php echo $produit->idProduit; ?>"/></td>
            </tr>
            <tr>
                <td>description</td>
                <td><?php echo $produit->description; ?></td>
            </tr>
            <tr>
                <td>prix unitaire</td>
                <td><?php echo $produit->prixProduit; ?> €</td>
            </tr>
            <tr>
                <td><input class="form-control" type="number" name="nb_produit" value="1" /></td>
                <td><button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-shopping-cart"></i> Ajouter au Panier</button></td>
            </tr>
        </table>
        </form>
        <?php if(isset($_SESSION["overstock"]) && $_SESSION["overstock"] != "")
        {
        ?>
            <div class="col-lg-12 alert alert-danger"><?php echo $_SESSION["overstock"]; ?></div>
        <?php
            unset($_SESSION["overstock"]);
        }
        ?>
    </div>

    <div class="modal fade" id="modal-id">
    	<div class="modal-dialog">
    		<div class="modal-content">
    			<div class="modal-header">
                    Images - <?php echo $produit->nomProduit; ?>
    				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    			</div>
    			<div class="modal-body">
                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#myCarousel" class="active" data-slide-to="0"></li>
                            <?php for($i=1;$i<sizeof($produit->images);$i++){ ?>
                            <li data-target="#myCarousel" data-slide-to="<?php echo $i; ?>" ></li>
                            <?php } ?>
                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                            <div class="item active">
                                <img src="<?php echo $produit->images[0]->cheminImage; ?>">
                            </div>
                            <?php for($i=1;$i<sizeof($produit->images);$i++){ ?>
                                <div class="item">
                                    <img src="<?php echo $produit->images[$i]->cheminImage; ?>">
                                </div>
                            <?php } ?>
                        </div>

                        <!-- Left and right controls -->
                        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
    			</div>
    		</div><!-- /.modal-content -->
    	</div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

</div>
