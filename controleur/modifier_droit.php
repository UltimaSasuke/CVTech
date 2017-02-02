<?php
/**
 * Created by PhpStorm.
 * User: Diego
 * Date: 21/01/2017
 * Time: 16:12
 */

include_once ('util.php');
include_once ('../model/a_droit_membres.php');

if(!empty($_SESSION['user']) && $_SESSION['user']->haveAccess('modifier_regle_droit')) {

    addDroit($_POST['nom']);

    header('Location: a_droit_membres.php');


} else  {
    header('Location: index.php');
}
