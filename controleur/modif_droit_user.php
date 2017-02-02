<?php
/**
 * Created by PhpStorm.
 * User: Diego
 * Date: 21/01/2017
 * Time: 19:14
 */



include_once ('util.php');

if(!empty($_SESSION['user']) && $_SESSION['user']->haveAccess('modifier_droits')) {
    include_once('../model/a_droit_membres.php');


    modifDroit($_GET['id'], $_POST['id_droit']);

    header('Location: a_droit_membres.php');
} else {
    header('Location: index.php');
}