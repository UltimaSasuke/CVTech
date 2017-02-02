<?php
/**
 * Created by PhpStorm.
 * User: Diego
 * Date: 22/01/2017
 * Time: 14:14
 */

echo '<tr>' . "\n";
echo '<td>' . $datas[$i]['email'] . '</td>' . "\n";
echo '<td>' . $datas[$i]['nom'] . '</td>' . "\n";
echo '<td>' . $datas[$i]['prenom'] . '</td>' . "\n";
echo '<td>' . $datas[$i]['nbconnection'] . '</td>' ."\n";
echo '<td>' . '<button type="button" class="btn btn-danger" onclick="refreshGlobal(\'#relo\', \'suppmembre.php?id=' . $datas[$i]['id'] .'\'
                        ,\' L utilisateur '. $datas[$i]['nom'] .' a bien été supprimé.\', \'danger\')">Supprimer</button>' . "\n";
echo '</tr>' . "\n";


?>