<?php
/**
 * Created by PhpStorm.
 * User: Diego
 * Date: 13/01/2017
 * Time: 21:18
 */

function getCVs($requete = null, $premiereEntree = null, $infosparpage = null)
{

    $dbLink = connnectDB();

    $query = "SELECT id FROM infos_cv";
    if(empty($requete)) $requete = " ";
    if (!empty($requete)) {

        $requete = preg_split('/[\s\-]/', $requete);

        if (!empty($_GET['type']) && $_GET['type'] == "competences") {

            $queryC = "SELECT DISTINCT (id_user) FROM sous_competences AS SC 
                  RIGHT JOIN sous_comp_user AS SCU ON SC.id_sous_comp = SCU.id_sous_comp 
                  RIGHT JOIN infos_cv AS ICV ON SCU.id_user = ICV.id";
            $whereC = "";
            foreach ($requete as $key => $value) {

                $whereC .= "SC.nom_sous_comp LIKE '%$value%'";
                if (count($requete) - 1 != $key) {

                    $whereC .= " OR ";

                }


            }
            if(!is_null($premiereEntree) && !is_null($infosparpage))
                $queryC .= " WHERE $whereC ORDER BY SCU.value DESC LIMIT ".$premiereEntree.", ".$infosparpage.";";
            else
            $queryC .= " WHERE $whereC ORDER BY SCU.value DESC;";

            if (!($dbResultC = mysqli_query($dbLink, $queryC))) {

                echo 'Erreur dans requête<br />';
                echo 'Erreur : ' . mysqli_error($dbLink) . '<br/>';
                echo 'Requête : ' . $queryC . '<br/>';

                exit();

            }
            while($dbRow = mysqli_fetch_array($dbResultC)) {

                $CVs[] = new CV($dbRow['id_user']);

            }

            return isset($CVs) ? $CVs : null;


        } else {

            $where = "";


            foreach ($requete as $key => $value) {

                $where .= "prenom LIKE '%$value%' OR nom LIKE '%$value%' OR ville LIKE '%$value%' OR type LIKE'%$value%'";
                if (count($requete) - 1 != $key) {

                    $where .= " AND ";

                }


            }
            if(!is_null($premiereEntree) && !is_null($infosparpage))
                $query .= " WHERE $where ORDER BY id DESC LIMIT ".$premiereEntree.", ".$infosparpage.";";
            else
                $query .= " WHERE $where ORDER BY id DESC;";



            if (!($dbResult = mysqli_query($dbLink, $query))) {

                echo 'Erreur dans requête<br />';
                echo 'Erreur : ' . mysqli_error($dbLink) . '<br/>';
                echo 'Requête : ' . $query . '<br/>';

                exit();

            }
            $CVs = array();
            $i = 0;
            while($dbRow = mysqli_fetch_array($dbResult)) {

                $CVs[$i] = new CV($dbRow['id']);
                ++$i;
            }

            return $CVs;
        }
    } else {

        return null;

    }

}


function getTotal($requete)
{
    return count(getCVs($requete));
}

function getInfos($premiereEntree, $infosparpage, $requete) {

    return getCVs($requete, $premiereEntree, $infosparpage);



}