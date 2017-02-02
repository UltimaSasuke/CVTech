<?php
/**
 * Created by PhpStorm.
 * User: d14011479
 * Date: 11/01/17
 * Time: 11:03
 */

include_once ("utils.bdd.inc.php");

//même que les autres
function getTotal() {


    $dbLink = connnectDB();
    $queryTotal = "SELECT COUNT(*) AS total FROM user WHERE compteactive=FALSE;";
    if(!($dbResult = mysqli_query($dbLink, $queryTotal)))

    {

        echo 'Erreur dans requête<br />';
        echo 'Erreur : ' . mysqli_error($dbLink) . '<br/>';
        echo 'Requête : ' . $queryTotal . '<br/>';

        exit();

    }
    return mysqli_fetch_assoc($dbResult)['total'];


}

//même que les autres
function getInfos($premiereEntree, $infosparpage) {

    $dbLink = connnectDB();
    $query = "SELECT * FROM user WHERE compteactive=FALSE ORDER BY id DESC LIMIT ".$premiereEntree.", ".$infosparpage.";";

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

    return isset($datas) ? $datas : null;

}