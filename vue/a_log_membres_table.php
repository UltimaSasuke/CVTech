<?php
/**
 * Created by PhpStorm.
 * User: Diego
 * Date: 22/01/2017
 * Time: 14:15
 */

echo '<tr>' . "\n";
echo '<td>' . $datas[$i]['email'] . '</td>' . "\n";
echo '<td>' . $datas[$i]['ip'] . '</td>' . "\n";
echo '<td>' . strftime($datas[$i]['date']) . '</td>' . "\n";
echo '<td>' . $datas[$i]['heure'] . '</td>' ."\n";
echo '</tr>' . "\n";


?>