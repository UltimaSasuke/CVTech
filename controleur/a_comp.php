<?php
/**
 * Created by PhpStorm.
 * User: d14011479
 * Date: 17/01/17
 * Time: 12:33
 */


include_once "util.php";
include_once ("../vue/header.php");
include_once ("../vue/menu.php");
include_once ("../model/a_comp.php");

if(!empty($_SESSION) && $_SESSION['user']->haveAccess('panel_administration')) {





         include_once '../vue/a_comp_head.php';
    $comps = getComp();

    if(!empty($comps)) {
        foreach ($comps as $comp) {

          include '../vue/a_comp_table.php';

        }
    }

    include_once '../vue/a_comp_foot.php';

}

else {

    include_once ("../vue/zone_interdit.php");
}





include_once ("../vue/footer.php");