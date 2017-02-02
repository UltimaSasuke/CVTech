<?php
/**
 * Created by PhpStorm.
 * User: Diego
 * Date: 22/01/2017
 * Time: 14:13
 */

echo '<form class="form" role="form" method="post" action="save_droit.php?id='.$droitDatas[$i]['id_droit'].'">' . "\n";
echo '<tr>' . "\n";
echo '<td>' . $droitDatas[$i]['nom_droit'] . '</td>' . "\n";
echo '<td><input type="checkbox" name="datas[panel_administration]" value="1"';
if($droitDatas[$i]['panel_administration'])
    echo ' checked';
echo  '>' . '</td>' . "\n";
echo '<td><input type="checkbox" name="datas[modifier_regle_droit]" value="1"';
if($droitDatas[$i]['modifier_regle_droit'])
    echo ' checked';
echo  '>' . '</td>' . "\n";
echo '<td><input type="checkbox" name="datas[modifier_droits]" value="1"';
if($droitDatas[$i]['modifier_droits'])
    echo ' checked';
echo  '>' . '</td>' . "\n";
echo '<td><input type="checkbox" name="datas[valider_membre]" value="1"';
if($droitDatas[$i]['valider_membre'])
    echo ' checked';
echo  '>' . '</td>' . "\n";
echo '<td><input type="checkbox" name="datas[supprimer_membre]" value="1"';
if($droitDatas[$i]['supprimer_membre'])
    echo ' checked';
echo  '>' . '</td>' . "\n";
echo '<td><input type="checkbox" name="datas[creer_cv]" value="1"';
if($droitDatas[$i]['creer_cv'])
    echo ' checked';
echo  '>' . '</td>' . "\n";
echo '<td><input type="checkbox" name="datas[modifier_cv]" value="1"';
if($droitDatas[$i]['modifier_cv'])
    echo ' checked';
echo  '>' . '</td>' . "\n";
echo '<td><input type="checkbox" name="datas[supprimer_cv]" value="1"';
if($droitDatas[$i]['supprimer_cv'])
    echo ' checked';
echo  '>' . '</td>' . "\n";
echo '<td><input type="submit" class="btn-group"></td>';
echo '</tr>' . "\n";
echo '</form>'."\n";


?>