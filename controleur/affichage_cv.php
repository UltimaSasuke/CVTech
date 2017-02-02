<?php
/**
 * Created by PhpStorm.
 * User: d14011479
 * Date: 17/01/17
 * Time: 11:41
 */

include_once "util.php";
include_once "../model/cv.php";
include_once ("../vue/header.php");
include_once ("../vue/menu.php");
include_once "../model/gestionImages.php";
include_once "../model/liste_cv.php";
$cv = new CV($_GET['id']);


include_once ("../vue/affichage_cv.php");


?>