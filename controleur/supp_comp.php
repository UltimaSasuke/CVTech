<?php
/**
 * Created by PhpStorm.
 * User: Diego
 * Date: 22/01/2017
 * Time: 13:36
 */

include_once 'util.php';
if(!empty($_SESSION['user']) && $_SESSION['user']->haveAccess('panel_administration')) {
    include_once '../model/supp_comp.php';

    if (!empty($_GET['id'])) {

        suppComp($_GET['id']);


    }

    header('Location: a_comp.php');
}
else {

    header('Location: index.php');
}