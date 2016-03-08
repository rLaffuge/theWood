<?php
/**
 * Created by PhpStorm.
 * User: laffu
 * Date: 08/03/2016
 * Time: 09:21
 */
//Définition d'un token pour la sécurité'
$form_token = md5(uniqid('auth', true));
$_SESSION['form_token'] = $form_token;
//Définition de la taille max des fichiers
$_SESSION['MAX_FILE_SIZE'] = 1048576;
?>
<form action="./back/Controllers/C_ajout_produit.php" method="post" role="form" enctype="multipart/form-data">
    <legend>Ajout d'un produit</legend>

    <div class="form-group">
        <label for="nom">Nom du produit:</label>
        <input type="text" class="form-control" name="nom" id="nom" placeholder="Entrer un nom..."
               required="required">
    </div>

    <div class="form-group">
        <label for="prix">Prix du produit:</label>
        <input type="number" name="prix" id="prix" class="form-control" required="required"
               placeholder="Entrer un prix...">
    </div>

    <div class="form-group">
        <label for="stock">Stock:</label>
        <input type="number" name="stock" id="stock" class="form-control" required="required"
               placeholder="Entrer un nombre de produit en stock...">
    </div>

    <div class="form-group">
        <label for="domaine">Domaine:</label>
        <select name="domaine" id="domaine" class="form-control" required>
            <?php
            foreach ($domaines as $d) {
                ?>
                <option value="<?php echo $d->idDomaine; ?>"><?php echo $d->libelleDomaine; ?></option>
                <?php
            }
            ?>
        </select>
    </div>

    <div class="form-group">
        <label for=theme">Thème:</label>
        <select name="theme" id="theme" class="form-control" required>
        </select>
    </div>

    <div class="form-group">
        <label for="images">Photo(s) du produit (JPG, PNG ou GIF | max. 1 Mo)</label>
        <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo $_SESSION['MAX_FILE_SIZE'];?>" />
        <input type="file" id="images" name="images[]" multiple>
    </div>

    <div class="form-group">
        <label for="description">Description du produit:</label>
        <textarea class="form-control" name="description" id="description" cols="30" rows="10"
                  placeholder="Entrer une description"></textarea>
    </div>

    <input type="hidden" id="form_token" name="form_token" value="<?php echo $form_token; ?>">

    <button type="submit" class="btn btn-primary pull-right"><i class="glyphicon glyphicon-plus"></i>
        Ajouter
    </button>
</form>
<script type="application/javascript">
    $(document).ready(function () {
        var domaines = $('#domaine');
        var themes = $('#theme');

        // à la sélection d une région dans la liste
        domaines.on('change', function () {
            var val = $(this).val(); // on récupère la valeur de la région
            if (val != '') {
                themes.empty(); // on vide la liste des départements

                $.post("/theWood/back/Controllers/C_loadTheme.php", {
                    "idDomaine": val
                }).done(function (json) {
                    json = JSON.parse(json);
                    $.each(json, function(key, val){
                        themes.append('<option value="' + val.idTheme + '">' + val.libelleTheme + '</option>');
                    })
                });
            }
        });
    });

</script>