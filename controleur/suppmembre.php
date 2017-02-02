<?php
/**
 * Created by PhpStorm.
 * User: d14011479
 * Date: 11/01/17
 * Time: 11:58
 */

include_once 'util.php';
if(!empty($_SESSION['user']) && $_SESSION['user']->haveAccess('supprimer_membre')) {
    include_once "../model/suppmembre.php";


    $id = $_GET['id'];

    suppMembre($id);

    header('Location: a_liste_membres.php');
} else {
    header('Location: index.php');
}
?>