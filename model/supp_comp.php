<?php
/**
 * Created by PhpStorm.
 * User: Diego
 * Date: 22/01/2017
 * Time: 13:37
 */
include_once 'utils.bdd.inc.php';

function suppComp($id) {

    $dbLink = connnectDB();
    $query = "DELETE FROM competences WHERE id_comp= $id";

    if (!($dbResult = mysqli_query($dbLink, $query))) {

        echo 'Erreur dans requête<br />';
        echo 'Erreur : ' . mysqli_error($dbLink) . '<br/>';
        echo 'Requête : ' . $query. '<br/>';

        exit();

    }

}