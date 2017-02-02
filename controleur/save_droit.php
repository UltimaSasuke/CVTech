<?php
/**
 * Created by PhpStorm.
 * User: Diego
 * Date: 21/01/2017
 * Time: 17:20
 */

if(!empty($_SESSION['user']) && $_SESSION['user']->haveAccess('modifier_droits')) {
    include_once('../model/a_droit_membres.php');
    include_once('util.php');


    updateDroit($_GET['id'], $_POST['datas']);

    header('Location: a_droit_membres.php');
}
else {
    header('Location: index.php');
}