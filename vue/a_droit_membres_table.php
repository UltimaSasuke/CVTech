<?php
/**
 * Created by PhpStorm.
 * User: Diego
 * Date: 22/01/2017
 * Time: 14:13
 */


echo '<form class="form" role="form" method="post" action="modif_droit_user.php?id='.$datas[$i]['id'].'">' . "\n";
echo '<tr>' . "\n";
echo '<td>' . $datas[$i]['email'] . '</td>' . "\n";
echo '<td>' . $datas[$i]['nom'] . '</td>' . "\n";
echo '<td>' . $datas[$i]['prenom'] . '</td>' . "\n";
echo '<td>' . $datas[$i]['nom_droit'] . '</td>' . "\n";
echo '<td>' . "<select class=\"form-control\" name=\"id_droit\">";

for($j = 0; $j < count($droits); $j = $j +1) { ?>
    <option value="<?php echo $droits[$j]['id_droit']; ?>" <?php if($datas[$i]['nom_droit'] == $droits[$j]['nom_droit']) echo " selected" ?> > <?php echo $droits[$j]['nom_droit']; ?></option >

<?php }
echo "</select>" . '</td>' . "\n";
echo '<td><input type="submit" class="btn-group"></td>';
echo '</tr>' . "\n";
echo '</form>' . "\n";


?>