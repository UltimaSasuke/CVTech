<?php
/**
 * Created by PhpStorm.
 * User: d14011479
 * Date: 17/01/17
 * Time: 16:08
 */

include_once 'util.php';

if(!empty($_SESSION['user']) && $_SESSION['user']->haveAccess('panel_administration')) {
    include_once('../model/utils.bdd.inc.php');
    include_once('../model/sauvegarderComp.php');


    $j = 0;
    $sousComp = Array();
    for ($i = 0; $i < strlen($_POST['sous_comp']); ++$i) {

        if ($_POST['sous_comp'][$i] == ',') {
            ++$j;
            continue;

        }
        $sousComp[$j] = $sousComp[$j] . $_POST['sous_comp'][$i];

    }


    saveSousComp($sousComp, $_GET['compId']);
    header('Location: a_comp.php');
}
else {
    header('Location: index.php');
}