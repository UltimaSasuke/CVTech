<?php
/**
 * Created by PhpStorm.
 * User: Diego
 * Date: 11/01/2017
 * Time: 17:53
 */

include_once ("utils.bdd.inc.php");

//recupere le nombre de log
function getTotal() {


    $dbLink = connnectDB();
    $queryTotal = "SELECT COUNT(*) AS total FROM log_connexion;";
    if(!($dbResult = mysqli_query($dbLink, $queryTotal)))

    {

        echo 'Erreur dans requête<br />';
        echo 'Erreur : ' . mysqli_error($dbLink) . '<br/>';
        echo 'Requête : ' . $queryTotal . '<br/>';

        exit();

    }
    return mysqli_fetch_assoc($dbResult)['total'];


}
//recupere tout les logs (entre $premierEntree et $infosparpage)
function getInfos($premiereEntree, $infosparpage) {

    $dbLink = connnectDB();
    $query = "SELECT * FROM log_connexion ORDER BY id_log DESC LIMIT ".$premiereEntree.", ".$infosparpage.";";

    if(!($dbResult = mysqli_query($dbLink, $query)))

    {

        echo 'Erreur dans requête<br />';
        echo 'Erreur : ' . mysqli_error($dbLink) . '<br/>';
        echo 'Requête : ' . $query . '<br/>';

        exit();

    }


    $i=0;
    while($dbRow = mysqli_fetch_assoc($dbResult))
    {

        $datas[$i] = $dbRow;
        $i = $i +1;


    }

    return $datas;

}

?>