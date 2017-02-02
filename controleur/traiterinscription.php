<?php
/**
 * Created by PhpStorm.
 * User: d14011479
 * Date: 11/01/17
 * Time: 09:08
 */


include_once'util.php';

if(empty($_SESSION['user'])) {
    include_once'../model/userdao.php';
    include_once '../model/traiterinscription.php';

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $password = $_POST['password'];
    $passwordverif = $_POST['passwordverif'];
    $email = $_POST['email'];

    if($password == $passwordverif) {
        if(strlen($password) > 7 && strlen($password) < 21) {
            if (isset($nom) && strlen($nom) > 1 && strlen($nom) < 13) {
                if (isset($prenom) && strlen($prenom) > 1 && strlen($prenom) < 13) {
                    if (isset($email)) {

                        $user = new UserDAO();
                        $ok = $user->addUser($nom, $prenom, $email, $password);
                        envoyerMailAdmin();

                        if ($ok) {

                            header('Location: index.php?inscription=ok');


                        } else {

                            header('Location: inscription.php?inscription_error=email_already_exist');


                        }
                    } else {

                        header('Location: inscription.php?inscription_error=email_size');


                    }
                } else {

                    header('Location: inscription.php?inscription_error=prenom_size');


                }

            } else {

                header('Location: inscription.php?inscription_error=nom_size');

            }
        }else {
            header('Location: inscription.php?inscription_error=password_size');

        }
    } else {

        header('Location: inscription.php?inscription_error=password_repeat');


    }

} else {
    header('Location: index.php');
}



?>