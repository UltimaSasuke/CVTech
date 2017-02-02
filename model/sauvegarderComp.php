<?php
/**
 * Created by PhpStorm.
 * User: d14011479
 * Date: 17/01/17
 * Time: 17:19
 */

function saveSousComp($comps, $id) {

    $dbLink = connnectDB();
    $queryComp = "SELECT * FROM sous_competences WHERE id_comp=".$id.";";
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

                    if($dbRow['nom_sous_comp'] == $comp) {

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

            if($comp == $sous_comps[$j]['nom_sous_comp']) { //on vérifie si les sous_compétences existent toujours dans $comp sinon on les supprime de la bdd
              $find = true;
              break;
            }

        }
        if(!$find) $listeAAjoute[$k] = $comp;
        $find = false;
        ++$k;

    }




    if(!empty($listeASupp)) { // SI COMP EXISTE DANS LA BD MAIS PAS DANS LA LISTE RECU == On doit le supprimer

        foreach($listeASupp as $comp) {
            $querySupp = "DELETE FROM sous_competences WHERE id_sous_comp=" . $comp['id_sous_comp'] . ";";
            if (!($dbResult = mysqli_query($dbLink, $querySupp))) {

                echo 'Erreur dans requête<br />';
                echo 'Erreur : ' . mysqli_error($dbLink) . '<br/>';
                echo 'Requête : ' . $querySupp . '<br/>';

                exit();

            }

            $querySuppCVComp = "DELETE FROM sous_comp_user WHERE id_sous_comp=" . $comp['id_sous_comp'] . ";";
            if (!($dbResult = mysqli_query($dbLink, $querySuppCVComp))) {

                echo 'Erreur dans requête<br />';
                echo 'Erreur : ' . mysqli_error($dbLink) . '<br/>';
                echo 'Requête : ' . $querySuppCVComp . '<br/>';

                exit();

            }
        }

    }
    if(!empty($listeAAjoute)) { //Sinon c'est qu'il n'y était pas
        foreach ($listeAAjoute as $comp) {
            $queryAdd = "INSERT INTO sous_competences (nom_sous_comp, id_comp) VALUE('" . $comp . "', " . $id . ");";
            if (!($dbResult = mysqli_query($dbLink, $queryAdd))) {

                echo 'Erreur dans requête<br />';
                echo 'Erreur : ' . mysqli_error($dbLink) . '<br/>';
                echo 'Requête : ' . $queryAdd . '<br/>';

                exit();

            }
        }
    }






}