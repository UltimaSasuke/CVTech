<?php
/**
 * Created by PhpStorm.
 * User: d14011479
 * Date: 11/01/17
 * Time: 08:35
 */


include_once 'util.php';


if(empty($_SESSION['user'])) {
    include_once("../vue/header.php");

    include_once("../vue/menu.php");

    include_once("../vue/inscription.php");


    include_once("../vue/footer.php");
} else {

    header('Location: index.php');

}