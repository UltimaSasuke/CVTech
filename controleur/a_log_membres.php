<?php
/**
 * Created by PhpStorm.
 * User: Diego
 * Date: 11/01/2017
 * Time: 17:53
 */

include_once "util.php";
include_once ("../vue/header.php");
include_once ("../vue/menu.php");



if(!empty($_SESSION) && $_SESSION['user']->haveAccess('panel_administration')) {

    include_once ("../vue/a_log_membres_head.php");



    include_once "../model/a_log_membres.php";

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



        include '../vue/a_log_membres_table.php';



    }

    include_once ("../vue/a_log_membres_foot.php");
}
else {

    include_once ("../vue/zone_interdit.php");
}


include_once ("../vue/footer.php");