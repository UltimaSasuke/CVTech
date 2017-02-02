<?php
/**
 * Created by PhpStorm.
 * User: Diego
 * Date: 21/01/2017
 * Time: 16:07
 */
include_once ('util.php');
include_once ('../model/a_droit_membres.php');

if($_SESSION['user']->haveAccess('modifier_regle_droit'))
    addDroit($_POST['nom']);

    header('Location: a_droit_membres.php');
