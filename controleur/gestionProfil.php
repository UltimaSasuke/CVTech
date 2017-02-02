<?php
/**
 * Created by PhpStorm.
 * User: c15003239
 * Date: 17/01/17
 * Time: 09:30
 */

include_once "util.php";
include_once "../vue/header.php";
include_once "../vue/menu.php";

if(!empty($_SESSION['user'])) {
    if (!empty($_GET['modif']) && $_GET['modif'] == "sent") {
        if (!empty($_POST['email']))
            $_SESSION['user']->setEmail($_POST['email']);
        if (!empty($_POST['password']))
            $_SESSION['user']->setPassword($_POST['password']);
        if (!empty($_POST['nom']))
            $_SESSION['user']->setNom($_POST['nom']);
        if (!empty($_POST['prenom']))
            $_SESSION['user']->setPrenom($_POST['prenom']);
        $_SESSION['user']->save();
    } else
        include_once "../vue/gestionProfil.php";
}
else
    include_once "../vue/zone_interdit.php";


include_once "../vue/footer.php";