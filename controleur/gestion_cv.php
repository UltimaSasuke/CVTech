<?php
/**
 * Created by PhpStorm.
 * User: Diego
 * Date: 14/01/2017
 * Time: 20:37
 */

include_once "util.php";
include_once "../model/cv.php";
include_once ("../vue/header.php");
include_once ("../vue/menu.php");
include_once ("../model/gestion_cv.php");

if(!empty($_SESSION['user']) && ($_SESSION['user']->haveAccess('creer_cv') ||$_SESSION['user']->haveAccess('modifier_cv') ||$_SESSION['user']->haveAccess('supprimer_cv') )) {
    if (!empty($_GET['id'])) {
        $id_cv = $_GET['id'];
        $cv = new CV($id_cv);
    }

    include_once "../vue/gestion_cv.php";
}
else
    include_once "../vue/zone_interdit.php";

include_once ("../vue/footer.php");