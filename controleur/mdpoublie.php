<?php
/**
 * Created by PhpStorm.
 * User: d14011479
 * Date: 11/01/17
 * Time: 12:02
 */

include_once ("util.php");

if(empty($_SESSION['user'])) {
    include_once("../vue/header.php");
    include_once("../vue/menu.php");
    include_once("../model/mdpoublie.php");


    if (isset ($_GET['mdp'])) {
        if ($_GET['mdp'] == 'recover') {
            $mail = $_POST['mail'];
            recupererMotDePasse($mail);
            header("Location: index.php");
        } elseif ($_GET['mdp'] == 'changed') {
            if ($_POST['password'] == $_POST['passwordverif']) {
                majMdp($_GET['token'], $_POST['password']);
                header('Location: index.php');
            } else
                header("Location: mdpoublie.php?token=" . $_GET['token']);
        }

    } elseif (isset ($_GET['token'])) {
        include_once("../vue/mdpoublie_reset_mdp.php");
    } else {
        include_once("../vue/mdpoublie_mail.php");
    }


    include_once("../vue/footer.php");
}
else {
    header('Location: index.php');
}
?>

