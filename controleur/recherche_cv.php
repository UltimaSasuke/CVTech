<?php
/**
 * Created by PhpStorm.
 * User: Diego
 * Date: 13/01/2017
 * Time: 20:08
 */

include_once "util.php";
if(!empty($_SESSION['user'])) {
    include_once "../model/cv.php";
    include_once("../vue/header.php");
    include_once("../vue/menu.php");
    include_once "../model/gestionImages.php";
    include_once("../model/recherche_cv.php");

    include_once '../vue/recherche_cv_head.php';
    $champ = $_GET['champ'];


    $infosparpage = 6;
    $total = getTotal($champ);
    $nbpage = ceil($total/$infosparpage);

    if(isset($_GET['page']))
    {
        $pageActuelle=intval($_GET['page']);

        if($pageActuelle>$nbpage)
        {
            $pageActuelle=$nbpage;
        }
        else if($pageActuelle<= 0) {
            $pageActuelle=1;

        }
    }
    else
    {
        $pageActuelle=1;
    }

    $premiereEntree=($pageActuelle-1)*$infosparpage;
    if($premiereEntree < 0)
        $premiereEntree = 0;

    $cvs = getInfos($premiereEntree, $infosparpage, $champ);

    if (empty($cvs)) {


    } else {

        foreach ($cvs as $cv) {

            include '../vue/recherche_cv.php';

        }
    }
    ?>


    <?php

    include_once '../vue/recherche_cv_foot.php';

    include_once("../vue/footer.php");
} else {

    header('Location: index.php');

}