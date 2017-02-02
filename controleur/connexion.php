<?php
/**
 * Created by PhpStorm.
 * User: d14011479
 * Date: 11/01/17
 * Time: 09:18
 */
include_once ("util.php");
include_once ("../model/user.php");
$mail = $_POST['email'];
$password = $_POST['password'];
$remember = $_POST['remember'];


if(!empty($mail) && !empty($password)) {

    $user = new User();
    $user->recuperer($mail, $password);

    if($user->isAvailable()) {

        $_SESSION['user'] = $user;
        $user->addLog();


        if($remember == "stay") {
            setcookie('log', $_SESSION['user']->getId() . '-------!!!!!!!------GETREKT-------!!!!!!!------' . sha1($_SESSION['user']->getNom() . $_SESSION['user']->getPrenom()), time() + 3600 * 12, '/', 'hybrid-games.fr', false, true);
        }


    }

    if(!empty($_SESSION))
        header('Location: index.php?connexion=reussi');
    else
        header('Location: index.php?connexion=echoue');


}
