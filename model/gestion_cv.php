<?php
/**
 * Created by PhpStorm.
 * User: Diego
 * Date: 18/01/2017
 * Time: 12:04
 */


function getComps() {

    $dbLink = connnectDB();
    $queryComp = "SELECT * FROM competences;";
    if (!($dbResult = mysqli_query($dbLink, $queryComp))) {

        echo 'Erreur dans requête<br />';
        echo 'Erreur : ' . mysqli_error($dbLink) . '<br/>';
        echo 'Requête : ' . $queryComp . '<br/>';

        exit();

    }
    $i=0;
    while($dbRow = mysqli_fetch_assoc($dbResult)) {

        $datas[$i] = $dbRow;
        ++$i;
    }

    return $datas;



}


function getSousComps($id_comp) {


    $dbLink = connnectDB();
    $queryComp = "SELECT * FROM sous_competences WHERE id_comp =".$id_comp.";";
    if (!($dbResult = mysqli_query($dbLink, $queryComp))) {

        echo 'Erreur dans requête<br />';
        echo 'Erreur : ' . mysqli_error($dbLink) . '<br/>';
        echo 'Requête : ' . $queryComp . '<br/>';

        exit();

    }
    $i=0;
    while($dbRow = mysqli_fetch_assoc($dbResult)) {

        $datas[$i] = $dbRow;
        ++$i;
    }

    return isset($datas) ? $datas : null;

}