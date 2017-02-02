<?php
/**
 * Created by PhpStorm.
 * User: Diego
 * Date: 11/01/2017
 * Time: 17:39
 */

//recupere le nombre d'utilisateur de la BDD
function getTotal()
{
    $dbLink = connnectDB();
    $queryTotal = "SELECT COUNT(*) AS total FROM user JOIN droit ON user.id_droit = droit.id_droit;";
    if (!($dbResult = mysqli_query($dbLink, $queryTotal))) {

        echo 'Erreur dans requête<br />';
        echo 'Erreur : ' . mysqli_error($dbLink) . '<br/>';
        echo 'Requête : ' . $queryTotal . '<br/>';

        exit();

    }
    return mysqli_fetch_assoc($dbResult)['total'];
}

//recupere la liste de tout les utilisateur et leurs droits
function getInfos($premiereEntree, $infosparpage) {

    $dbLink = connnectDB();
    $query = "SELECT * FROM user JOIN droit ON user.id_droit = droit.id_droit ORDER BY id DESC LIMIT ".$premiereEntree.", ".$infosparpage.";";
    if(!($dbResult = mysqli_query($dbLink, $query)))

    {

        echo 'Erreur dans requête<br />';
        echo 'Erreur : ' . mysqli_error($dbLink) . '<br/>';
        echo 'Requête : ' . $query . '<br/>';

        exit();

    }


    $i=0;
    while($dbRow = mysqli_fetch_assoc($dbResult))
    {

        $datas[$i] = $dbRow;
        $i = $i +1;


    }

    return $datas;



}

//recupere la liste de tout les droits
function getDroit() {

    $dbLink = connnectDB();
    $query = "SELECT * FROM droit;";
    if(!($dbResult = mysqli_query($dbLink, $query)))

    {

        echo 'Erreur dans requête<br />';
        echo 'Erreur : ' . mysqli_error($dbLink) . '<br/>';
        echo 'Requête : ' . $query . '<br/>';

        exit();

    }


    $i=0;
    while($dbRow = mysqli_fetch_assoc($dbResult))
    {

        $droits[$i] = $dbRow;
        $i = $i +1;


    }

    return $droits;



}

//permet d'ajouter un type d'utilisateur (Admin, membres, etc...)
function addDroit($nom) {

    $dbLink = connnectDB();
    $query = "INSERT INTO droit (nom_droit) VALUES('$nom');";
    if(!($dbResult = mysqli_query($dbLink, $query)))

    {

        echo 'Erreur dans requête<br />';
        echo 'Erreur : ' . mysqli_error($dbLink) . '<br/>';
        echo 'Requête : ' . $query . '<br/>';

        exit();

    }

}

//met à jour les règles du droit (Admin, etc...)
function updateDroit($id, $droits) {

    $dbLink = connnectDB();
    if(empty($droits['panel_administration']))  $droits['panel_administration'] = 0;
    if(empty($droits['modifier_regle_droit']))  $droits['modifier_regle_droit'] = 0;
    if(empty($droits['modifier_droits']))  $droits['modifier_droits'] = 0;
    if(empty($droits['modifier_cv']))  $droits['modifier_cv'] = 0;
    if(empty($droits['valider_membre']))  $droits['valider_membre'] = 0;
    if(empty($droits['creer_cv']))  $droits['creer_cv'] = 0;
    if(empty($droits['supprimer_membre']))  $droits['supprimer_membre'] = 0;
    if(empty($droits['supprimer_cv']))  $droits['supprimer_cv'] = 0;


    print_r($droits);

    $query = "UPDATE droit SET panel_administration=".$droits['panel_administration'].", modifier_regle_droit=".$droits['modifier_regle_droit'].",
              modifier_droits=".$droits['modifier_droits'].", valider_membre=".$droits['valider_membre'].", supprimer_membre=".$droits['supprimer_membre'].",
                creer_cv=".$droits['creer_cv'].", modifier_cv=".$droits['modifier_cv'].",
              modifier_cv=".$droits['modifier_cv'].", supprimer_cv=".$droits['supprimer_cv']." WHERE id_droit=$id;";

    print_r($droits['panel_administration']);
    if(!($dbResult = mysqli_query($dbLink, $query)))

    {

        echo 'Erreur dans requête<br />';
        echo 'Erreur : ' . mysqli_error($dbLink) . '<br/>';
        echo 'Requête : ' . $query . '<br/>';

        exit();

    }


}

//change les droits d'un utilisateur
function modifDroit($idUser, $idDroit) {

    $dbLink = connnectDB();
    $query = "UPDATE user SET id_droit=$idDroit WHERE id=$idUser;";
    if(!($dbResult = mysqli_query($dbLink, $query)))

    {

        echo 'Erreur dans requête<br />';
        echo 'Erreur : ' . mysqli_error($dbLink) . '<br/>';
        echo 'Requête : ' . $query . '<br/>';

        exit();

    }

}