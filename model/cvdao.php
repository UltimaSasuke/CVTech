<?php

/**
 * Created by PhpStorm.
 * User: Diego
 * Date: 13/01/2017
 * Time: 21:00
 */

include_once ('cv.php');

//comprend toutes les méthodes afin de récuperer les infos d'un CV et les mettre à jour

class CVDAO
{

    function getCV($id) {

        $dbLink = connnectDB();
        $query = "SELECT * FROM infos_cv WHERE id='". $id."';";
        if(!($dbResult = mysqli_query($dbLink, $query)))
        {

            echo 'Erreur dans requête<br />';
            echo 'Erreur : ' . mysqli_error($dbLink) . '<br/>';
            echo 'Requête : ' . $query . '<br/>';

            exit();

        }
        while ($dbRow = mysqli_fetch_assoc($dbResult)) {


            $cvDatas =$dbRow;
            $queryCVPDF = "SELECT chemin FROM CV WHERE idLienCV='".$id."';";
            if(!($dbResult = mysqli_query($dbLink, $queryCVPDF)))
            {

                echo 'Erreur dans requête<br />';
                echo 'Erreur : ' . mysqli_error($dbLink) . '<br/>';
                echo 'Requête : ' . $query . '<br/>';

                exit();

            }
            $i = 0;
            while ($dbRow = mysqli_fetch_assoc($dbResult)) {

                $cvDatas['cv_pdf'][$i] = $dbRow['chemin'];
                ++$i;
            }


        }






        $queryD = "SELECT nom_sous_comp, value FROM sous_competences AS SC 
                  RIGHT JOIN sous_comp_user AS SCU ON SC.id_sous_comp = SCU.id_sous_comp 
                  RIGHT JOIN infos_cv AS ICV ON SCU.id_user = ICV.id 
                  WHERE ICV.id = '".$id."' ORDER BY value DESC;";
        if(!($dbResultD = mysqli_query($dbLink, $queryD)))
        {

            echo 'Erreur dans requête<br />';
            echo 'Erreur : ' . mysqli_error($dbLink) . '<br/>';
            echo 'Requête : ' . $queryD . '<br/>';

            exit();

        }
        $i =0;
        while ($dbRow = mysqli_fetch_assoc($dbResultD)) {

            $cvDatas['comp'][$i] = $dbRow;
            ++$i;
        }

        return $cvDatas;

    }

    public function update($cv) {

        $dbLink = connnectDB();
        $query = 'UPDATE infos_cv SET nom="'.$cv->getNom() . '", prenom="'.$cv->getPrenom() . '", sexe=' . $cv->getSexe() .
                 ', pseudonyme="'.$cv->getPseudonyme().'", email="'.$cv->getEmail().'", type="'.$cv->getType().'", securite_social="'.$cv->getSecuSocial()
                .'", contrat_assurance_pro="' . $cv->getContratAssurancePro() . '", telephone_portable="'.$cv->getTel().'", telephone_fixe="'.$cv->getTelFixe().
                 '", adresse="'.$cv->getAdresse() . '", code_postale="' . $cv->getCodePostale() . '", ville="' . $cv->getVille() . '", remarque="'.$cv->getRemarques() .
                 '", modif_date=NOW() WHERE id='.$cv->getId().';';



        if(!($dbResult = mysqli_query($dbLink, $query)))
        {

            echo 'Erreur dans requête<br />';
            echo 'Erreur : ' . mysqli_error($dbLink) . '<br/>';
            echo 'Requête : ' . $query . '<br/>';

            exit();

        }



    }

    public function updatePhoto($id,$idPhoto){
        $dbLink = connnectDB();
        $query = "UPDATE infos_cv SET photo_image=" . $idPhoto ." WHERE id=$id;";
        if(!($dbResult = mysqli_query($dbLink, $query))) {
            echo 'Erreur dans requête<br />';
            echo 'Erreur : ' . mysqli_error($dbLink) . '<br/>';
            echo 'Requête : ' . $query . '<br/>';
            exit();
        }
    }

    public function updateContrat($id,$idContrat){
        $dbLink = connnectDB();
        $query = "UPDATE infos_cv SET contra_assurance_pro_pdf=" . $idContrat ." WHERE id=$id;";
        if(!($dbResult = mysqli_query($dbLink, $query))) {
            echo 'Erreur dans requête<br />';
            echo 'Erreur : ' . mysqli_error($dbLink) . '<br/>';
            echo 'Requête : ' . $query . '<br/>';
            exit();
        }
    }

    public function delete($id) {


        $dbLink = connnectDB();
        $query = "DELETE FROM infos_cv WHERE id=" . $id .";";



        if(!($dbResult = mysqli_query($dbLink, $query)))
        {

            echo 'Erreur dans requête<br />';
            echo 'Erreur : ' . mysqli_error($dbLink) . '<br/>';
            echo 'Requête : ' . $query . '<br/>';

            exit();

        }

    }

    public function updateSousComp($comps, $value, $id) {

        $dbLink = connnectDB();
        $queryComp = "SELECT * FROM sous_comp_user WHERE id_user=".$id.";";
        if (!($dbResult = mysqli_query($dbLink, $queryComp))) {

            echo 'Erreur dans requête<br />';
            echo 'Erreur : ' . mysqli_error($dbLink) . '<br/>';
            echo 'Requête : ' . $queryComp . '<br/>';

            exit();

        }
        $i = 0;
        while($dbRow = mysqli_fetch_assoc($dbResult)) {

            $find = false;
            foreach ($comps as $comp) {

                if($dbRow['id_sous_comp'] == $comp) {

                    $find = true;
                    break;

                }

            }
            if(!$find) $listeASupp[$i] = $dbRow; //Liste de ceux à supp
            $sous_comps[$i] = $dbRow;//on récupère toute les sous_compétences
            ++$i;

        }

        $k = 0;
        foreach($comps as $comp) {
            $find = false;
            for($j=0; $j<$i; ++$j) {

                if($comp == $sous_comps[$j]['id_sous_comp']) { //on vérifie si les sous_compétences existent toujours dans $comp sinon on les supprime de la bdd
                    $find = true;
                    break;
                }

            }
            if(!$find) $listeAAjoute[$k] = $comp;
            $find = false;
            ++$k;

        }

        $aUpdate = Array();
        foreach($comps as $comp) {
            $find = false;
            foreach ($listeAAjoute as $ajout) {

                if($comp == $ajout) {
                    $find = true;
                    break;
                }

            }
            foreach($listeASupp as $supp) {
                if($comp == $supp) {
                    $find = true;
                    break;
                }
            }
            if(!$find) {
                $aUpdate[] = $comp;
            }


        }


        if(!empty($listeASupp)) { // SI COMP EXISTE DANS LA BD MAIS PAS DANS LA LISTE RECU == On doit le supprimer

            foreach($listeASupp as $comp) {
                $querySupp = "DELETE FROM sous_comp_user WHERE id_sous_comp=" . $comp['id_sous_comp'] . ";";
                if (!($dbResult = mysqli_query($dbLink, $querySupp))) {

                    echo 'Erreur dans requête<br />';
                    echo 'Erreur : ' . mysqli_error($dbLink) . '<br/>';
                    echo 'Requête : ' . $querySupp . '<br/>';

                    exit();

                }

            }

        }
        if(!empty($listeAAjoute)) { //Sinon c'est qu'il n'y était pas
            foreach ($listeAAjoute as $comp) {

                $queryAdd = "INSERT INTO sous_comp_user (id_sous_comp, id_user, value) VALUE('" . $comp . "', " . $id . ", ".$value[$comp].");";
                if (!($dbResult = mysqli_query($dbLink, $queryAdd))) {

                    echo 'Erreur dans requête<br />';
                    echo 'Erreur : ' . mysqli_error($dbLink) . '<br/>';
                    echo 'Requête : ' . $queryAdd . '<br/>';

                    exit();

                }
            }
        }
        if(!empty($aUpdate)) {
            foreach ($aUpdate as $comp) {

                $queryAdd = "UPDATE sous_comp_user SET value=".$value[$comp]." WHERE id_sous_comp=".$comp.";";
                if (!($dbResult = mysqli_query($dbLink, $queryAdd))) {

                    echo 'Erreur dans requête<br />';
                    echo 'Erreur : ' . mysqli_error($dbLink) . '<br/>';
                    echo 'Requête : ' . $queryAdd . '<br/>';

                    exit();

                }
            }

        }

    }

}