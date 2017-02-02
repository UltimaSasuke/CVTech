<?php
/**
 * Created by PhpStorm.
 * User: Diego
 * Date: 17/01/2017
 * Time: 19:19
 */

include_once ("utils.bdd.inc.php");


//creer une compétence
function ajouterComp($nom) {


    $dbLink = connnectDB();
    $queryComp = "INSERT INTO competences (nom_comp) VALUES ('".$nom."');";
    if (!($dbResult = mysqli_query($dbLink, $queryComp))) {

        echo 'Erreur dans requête<br />';
        echo 'Erreur : ' . mysqli_error($dbLink) . '<br/>';
        echo 'Requête : ' . $queryComp . '<br/>';

        exit();

    }


}