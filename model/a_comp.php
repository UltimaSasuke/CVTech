<?php
/**
 * Created by PhpStorm.
 * User: d14011479
 * Date: 17/01/17
 * Time: 16:46
 */

//recupere toute les sous_compétences
function getComp() {

    $dbLink = connnectDB();
    $queryComp = "SELECT * FROM competences;";
    if (!($dbResult = mysqli_query($dbLink, $queryComp))) {

        echo 'Erreur dans requête<br />';
        echo 'Erreur : ' . mysqli_error($dbLink) . '<br/>';
        echo 'Requête : ' . $queryComp . '<br/>';

        exit();

    }
    $i = 0;
    while($dbRow = mysqli_fetch_assoc($dbResult))
    {

        $data[$i]['id'] = $dbRow['id_comp'];
        $data[$i]['nom'] = $dbRow['nom_comp'];

        $j = 0;
        $querySousComp = "SELECT *  FROM sous_competences WHERE id_comp=".$dbRow['id_comp'].";";
        if (!($dbResultSousComp = mysqli_query($dbLink, $querySousComp))) {

            echo 'Erreur dans requête<br />';
            echo 'Erreur : ' . mysqli_error($dbLink) . '<br/>';
            echo 'Requête : ' . $querySousComp . '<br/>';

            exit();

        }
        while($dbRowSousComp = mysqli_fetch_assoc($dbResultSousComp))
        {

            $data[$i]['sous_comp'][$j] = $dbRowSousComp['nom_sous_comp'];

            $j = $j +1;
        }

        $i = $i +1;


    }
    return $data;


}