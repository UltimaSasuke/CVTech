<?php
/**
 * Created by PhpStorm.
 * User: d14011479
 * Date: 20/01/17
 * Time: 18:01
 */


include_once "util.php";
if(!empty($_SESSION['user']) && $_SESSION['user']->haveAccess('supprimer_cv')) {
    include_once "../model/cv.php";

    $cv = new CV($_GET['id']);
    $cv->delete();
    header('Location: index.php');
}
else {
    header('Location: index.php');
}