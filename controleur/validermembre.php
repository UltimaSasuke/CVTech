<?php
/**
 * Created by PhpStorm.
 * User: d14011479
 * Date: 11/01/17
 * Time: 11:40
 */


include_once 'util.php';
if(!empty($_SESSION['user']) && $_SESSION['user']->haveAccess('valider_membre')) {
    include_once("../model/validermembre.php");


    $id = $_GET['id'];

    validerMembre($id);
} else {
    header('Location: index.php');
}