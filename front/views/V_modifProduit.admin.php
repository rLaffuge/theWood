<?php
/**
 * Created by PhpStorm.
 * User: laffu
 * Date: 22/03/2016
 * Time: 11:44
 */

?>

<form action="" method="post" role="form">
	<legend>Modification d'un produit (meta-data)</legend>
    <?php

    foreach ($inputs as $i) {
        switch ($i->type){
            case 'select':
                echo '<div class="form-group">
                        <label>'. $i->label .'</label>
                        <select id="'. $i->id .'"class="'. $i->class .'" name="'. $i->name.'"';
                if ($i->required == 'true') {
                    echo 'required >';
                }else{
                    echo '>';
                }
                foreach ($i->data_table as $d){
                    $d_array = (array)$d;
                    echo '<option value="'.$d_array[$i->option_value].'">'. $d_array[$i->option_input] .'</option>';
                }
                echo    '</select>
                        </div>';
                break;
            case 'textarea':
                echo '<div class="form-group">
                        <label>'. $i->label .'</label>
                        <textarea  class="'.$i->class.'" rows="5" name="'.$i->name.'" id="'.$i->id.'" type="'.$i->type.'"';
                if ($i->required == 'true') {
                    echo 'required></textarea>';
                }else{
                    echo '>';
                }
                echo'</div>';
                break;
            default:
                echo '<div class="form-group">
                        <label>'. $i->label .'</label>
                        <input  class="'.$i->class.'" name="'.$i->name.'" id="'.$i->id.'" type="'.$i->type.'"';
                if ($i->required == 'true') {
                    echo 'required >';
                }else{
                    echo '>';
                }
                 echo'</div>';
        }
    }









    ?>
	<button type="submit" class="btn btn-primary">Modifier</button>
</form>