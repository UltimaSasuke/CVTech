<?php
/**
 * Created by PhpStorm.
 * User: Junior
 * Date: 15/01/2017
 * Time: 12:49
 */

include_once  "utils.bdd.inc.php";

    function getPathFromName($Crypte){
        $dbLink = connnectDB();
        $query = "SELECT * FROM CV WHERE chemin = '".$Crypte ."'";
        if(!($dbResult = mysqli_query($dbLink, $query))){
            echo 'Erreur dans requête<br />';
            echo 'Erreur : ' . mysqli_error($dbLink) . '<br/>';
            echo 'Requête : ' . $query . '<br/>';
            exit();

        }
        while($dbRow = mysqli_fetch_assoc($dbResult))
            return $dbRow['nomCV'];
    }

    function telecharger($cv,$nomCrypte){
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header("Content-Type: application/force-download");
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        header('Content-Length: '. filesize("../fichier/cvPDF/".$nomCrypte));
        header("Content-disposition: attachment; filename=\"".$cv ."\"");
        ob_clean();
        flush();
        readfile("../fichier/cvPDF/".$nomCrypte);
    }

