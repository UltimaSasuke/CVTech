<?php
/**
 * Created by PhpStorm.
 * User: d14011479
 * Date: 11/01/17
 * Time: 09:45
 */
include_once ('../model/user.php');
include_once ('../model/cv.php');
session_start();
setlocale (LC_TIME, 'fr_FR.utf8','fra');
date_default_timezone_set('Europe/Paris');



if(!empty($_COOKIE['log'])) {
    $log = explode('-------!!!!!!!------GETREKT-------!!!!!!!------', $_COOKIE['log']);
    $user = new User();
    $user->recupererById($log[0]);
    if(sha1($user->getNom() . $user->getPrenom()) == $log[1]) $_SESSION['user']=$user;
}


?>