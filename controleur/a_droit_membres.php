<?php
/**
 * Created by PhpStorm.
 * User: Diego
 * Date: 11/01/2017
 * Time: 17:36
 */


include_once "util.php";
include_once ("../vue/header.php");
include_once ("../vue/menu.php");



if(!empty($_SESSION) && $_SESSION['user']->haveAccess('modifier_droits')) {

    include_once ("../vue/a_droit_membres_head.php");



    include_once "../model/a_droit_membres.php";

    $infosparpage = 15;
    $total = getTotal();
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

    $datas = getInfos($premiereEntree, $infosparpage);


    for($i = 0; $i < count($datas); $i = $i +1) {

        $droits = getDroit();

        include '../vue/a_droit_membres_table.php';



    }

    include_once ("../vue/a_droit_membres_foot.php");

    if($_SESSION['user']->haveAccess("modifier_regle_droit")) {

        include_once ("../vue/a_droit_droit_head.php");

        $droitDatas = getDroit();

        for($i = 0; $i < count($droitDatas); $i = $i +1) {


            include '../vue/a_droit_droit_table.php';



        }



        include_once("../vue/a_droit_droit_foot.php");




    }
}
else {

    include_once ("../vue/zone_interdit.php");
}


include_once ("../vue/footer.php");