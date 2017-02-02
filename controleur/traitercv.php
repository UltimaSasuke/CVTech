<?php
/**
 * Created by PhpStorm.
 * User: Diego
 * Date: 15/01/2017
 * Time: 14:20
 */



include_once "util.php";
include_once "../model/depotFics.php";
include_once "../model/cv.php";

if($_SESSION['user']->haveAccess('modifier_cv') && ! empty($_GET['id'])) {
    $id = $_GET['id'];
    $cv = new CV($id);
    $idContrat = $cv->getUrlContrat();
    $idPhoto = $cv->getUrlImage();
    if($_FILES['photo']['error'] == 0 && $_FILES['photo']['size'] < $_POST['MAX_FILE_SIZE']){
        if($idPhoto != 0 )
            supprimerAnciennePhoto($idPhoto);
        $idPhoto = traiterPhoto($_FILES['photo']);
        $cv->setUrlImage($idPhoto);
    }
    if($_FILES['contratAssurance']['error'] == 0){
        if($idContrat != 0)
            supprimerAncienContrat($idContrat);
        $idContrat = traiterContratAssurance($_FILES['contratAssurance']);
        $cv->setUrlContrat($idContrat);
    }
    if (!empty($_FILES['cv'] && $nbFic = count($tabCV['name']) >0))
        traiterCvMultiple($_FILES['cv'],$cv->getId());
    else if(!empty($_FILES['cv']))
        traiterCV($_FILES['cv'],$cv->getId());
    include_once "../model/traitercv.php";
}
else if($_SESSION['user']->haveAccess('creer_cv') && empty($_GET['id'])) {
    $idContrat = 0;
    $idPhoto = 0;
    if($_FILES['photo']['error'] == 0 && $_FILES['photo']['size'] < $_POST['MAX_FILE_SIZE'])
        $idPhoto = traiterPhoto($_FILES['photo']);
    if($_FILES['contratAssurance']['error'] == 0)
        $idContrat = traiterContratAssurance($_FILES['contratAssurance']);
    include_once "../model/traitercv.php";
    if (!empty($_FILES['cv']))
        traiterCvMultiple($_FILES['cv'],$cv->getId());
}

$id=$cv->getId();
header('Location: affichage_cv.php?id='.$id);
?>