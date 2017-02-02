<?php
/**
 * Created by PhpStorm.
 * User: c15003239
 * Date: 20/01/17
 * Time: 15:07
 */

include_once "utils.bdd.inc.php";

    function getImageFromId($id){
        $dbLink = connnectDB();
        $query = "SELECT chemin FROM PHOTO WHERE idPhoto = '" . $id ."'";
        if (!($dbResult = mysqli_query($dbLink, $query))) {
            echo 'Erreur dans requête<br />';
            echo 'Erreur : ' . mysqli_error($dbLink) . '<br/>';
            echo 'Requête : ' . $query . '<br/>';
        } else {
            $dbRow = mysqli_fetch_assoc($dbResult);
            return $dbRow['chemin'];
        }
    }

    function getContratFromId($id){
        $dbLink = connnectDB();
        $query = "SELECT chemin FROM CONTRAT_ASSURANCE_PRO WHERE idContrat = '" . $id ."'";
        if (!($dbResult = mysqli_query($dbLink, $query))) {
            echo 'Erreur dans requête<br />';
            echo 'Erreur : ' . mysqli_error($dbLink) . '<br/>';
            echo 'Requête : ' . $query . '<br/>';
        } else {
            $dbRow = mysqli_fetch_assoc($dbResult);
            return substr($dbRow['chemin'],22);
        }
    }