<?php
/**
 * Created by PhpStorm.
 * User: Diego
 * Date: 22/01/2017
 * Time: 14:16
 */

echo '<tr>' . "\n";
echo '<td>' . $datas[$i]['email'] . '</td>' . "\n";
echo '<td>' . $datas[$i]['nom'] . '</td>' . "\n";
echo '<td>' . $datas[$i]['prenom'] . '</td>' . "\n";
echo '<td>' . '<button type="button" class="btn btn-success" onclick="refresh('. $datas[$i]['id'] .',\''. $datas[$i]['nom'] .'\')">Valider</button>' . "\n";
echo '</tr>' . "\n";

?>