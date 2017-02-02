<?php
/**
 * Created by PhpStorm.
 * User: c15003239
 * Date: 11/01/17
 * Time: 08:59
 */

include_once "utils.bdd.inc.php";

    function stockerUploadCVBD($nom,$chemin,$idcv){
        $cpt = 0;
        while($cpt < 10){
            if(addCV($nom,$chemin,$idcv) == "ok") break;
            $cpt++;
        }
    }

    function stockerUploadPhotoBD($chemin,$taille){
        $cpt = 0;
        while($cpt < 10){
            if(addPhoto($chemin,$taille) == "ok") break;
            $cpt++;
        }
    }

    function stockerUploadContratAssuranceBD($chemin){
        $cpt = 0;
        while($cpt < 10){
            if(addContratAssurance($chemin) == "ok") break;
            $cpt++;
        }
    }

    function getIdPhotoFromPath($chemin){
        $dbLink = connnectDB();
        $query = "SELECT idPhoto FROM PHOTO WHERE chemin = '".$chemin ."'";
        if(!($dbResult = mysqli_query($dbLink, $query))) {
            echo 'Erreur dans requête<br />';
            echo 'Erreur : ' . mysqli_error($dbLink) . '<br/>';
            echo 'Requête : ' . $query . '<br/>';
            exit();
        }
        $dbRow = mysqli_fetch_assoc($dbResult);
        return $dbRow['idPhoto'];
    }

    function getIdContratFromPath($chemin){
        $dbLink = connnectDB();
        $query = "SELECT idContrat FROM CONTRAT_ASSURANCE_PRO WHERE chemin = '".$chemin ."'";
        if(!($dbResult = mysqli_query($dbLink, $query))) {
            echo 'Erreur dans requête<br />';
            echo 'Erreur : ' . mysqli_error($dbLink) . '<br/>';
            echo 'Requête : ' . $query . '<br/>';
            exit();
        }
        $dbRow = mysqli_fetch_assoc($dbResult);
        return $dbRow['idContrat'];
    }

    function traiterCV($cv,$idcv){
        $tmp = $cv['tmp_name'][0];
        $fichier = $cv['name'][0];
        $path = '../fichier/cvPDF/';
        $fichier = preg_replace("` `i", "", $fichier);
        $nom_final = uniqid("", false);
        move_uploaded_file($tmp, $path . $nom_final . ".pdf");
        $path = "/projet/fichier/cvPDF/";
        stockerUploadCVBD($fichier, $path . $nom_final . ".pdf", $idcv);
    }

    function traiterCvMultiple($tabCV,$idcv){
        $nbFic = count($tabCV['name']);
        for($i=0; $i < $nbFic; ++$i) {
            $tmp = $tabCV['tmp_name'][$i];
            $fichier = $tabCV['name'][$i];
            $path = '../fichier/cvPDF/';
            $fichier = preg_replace("` `i", "", $fichier);
            $nom_final = uniqid("", false);
            move_uploaded_file($tmp, $path . $nom_final . ".pdf");
            $path = "/projet/fichier/cvPDF/";
            stockerUploadCVBD($fichier, $path . $nom_final . ".pdf", $idcv);
        }
    }

    function traiterPhoto($photo){
        $tmp = $photo['tmp_name'];
        $extension = "." . strtolower(  substr(  strrchr($photo['name'], '.')  ,1)  );
        $taille = $photo['size'];
        $path = '../fichier/photo/';
        $nom_final = uniqid("", false);
        move_uploaded_file($tmp, $path . $nom_final .$extension);
        $path = "/projet/fichier/photo/";
        stockerUploadPhotoBD($path . $nom_final . $extension,$taille);
        return getIdPhotoFromPath($path . $nom_final . $extension);
    }

    function traiterContratAssurance($contratAssurance){
        $tmp = $contratAssurance['tmp_name'];
        $path = '../fichier/contratAssurancePDF/';
        $nom_final = uniqid("", false);
        move_uploaded_file($tmp, $path . $nom_final . ".pdf");
        $path = "/projet/fichier/contratAssurancePDF/";
        stockerUploadContratAssuranceBD($path . $nom_final . ".pdf");
        return getIdContratFromPath($path . $nom_final . ".pdf");
    }

    function supprimerAnciennePhoto($idPhoto){
        $dbLink = connnectDB();
        $query = "SELECT chemin FROM PHOTO WHERE idPhoto = '".$idPhoto ."'";
        if(!($dbResult = mysqli_query($dbLink, $query))) {
            echo 'Erreur dans requête<br />';
            echo 'Erreur : ' . mysqli_error($dbLink) . '<br/>';
            echo 'Requête : ' . $query . '<br/>';
            exit();
        }
        $dbRow = mysqli_fetch_assoc($dbResult);
        $nomfic = substr($dbRow['chemin'],22);
        if ($handle = opendir('../fichier/photo/')) {
            while (false !== ($entry = readdir($handle))) {
                if ($entry != "." && $entry != ".." && $entry == $nomfic) {
                    unlink($entry);
                }
            }
            closedir($handle);
        }
        $query = "DELETE FROM PHOTO WHERE idPhoto = '".$idPhoto ."'";
        if(!($dbResult = mysqli_query($dbLink, $query))) {
            echo 'Erreur dans requête<br />';
            echo 'Erreur : ' . mysqli_error($dbLink) . '<br/>';
            echo 'Requête : ' . $query . '<br/>';
            exit();
        }
    }

    function supprimerAncienContrat($idContrat){
        $dbLink = connnectDB();
        $query = "SELECT chemin FROM CONTRAT_ASSURANCE_PRO WHERE idContrat = '".$idContrat ."'";
        if(!($dbResult = mysqli_query($dbLink, $query))) {
            echo 'Erreur dans requête<br />';
            echo 'Erreur : ' . mysqli_error($dbLink) . '<br/>';
            echo 'Requête : ' . $query . '<br/>';
            exit();
        }
        $dbRow = mysqli_fetch_assoc($dbResult);
        $nomfic = substr($dbRow['chemin'],37);
        if ($handle = opendir('../fichier/contratAssurancePDF/')) {
            while (false !== ($entry = readdir($handle))) {
                if ($entry != "." && $entry != ".." && $entry == $nomfic) {
                    unlink($entry);
                }
            }
            closedir($handle);
        }
        $query = "DELETE FROM CONTRAT_ASSURANCE_PRO WHERE idContrat = '".$idContrat ."'";
        if(!($dbResult = mysqli_query($dbLink, $query))) {
            echo 'Erreur dans requête<br />';
            echo 'Erreur : ' . mysqli_error($dbLink) . '<br/>';
            echo 'Requête : ' . $query . '<br/>';
            exit();
        }
    }