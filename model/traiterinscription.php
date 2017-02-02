<?php
/**
 * Created by PhpStorm.
 * User: d14011479
 * Date: 11/01/17
 * Time: 08:41
 */


include_once "utils.bdd.inc.php";

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$password = $_POST['password'];
$passwordverif = $_POST['passwordverif'];
$email = $_POST['email'];

if($password == $passwordverif) {
    if(strlen($password) > 7 && strlen($password) < 21) {
        if (isset($nom) && strlen($nom) > 1 && strlen($nom) < 21) {
            if (isset($prenom) && strlen($prenom) > 1 && strlen($prenom) < 21) {
                if (isset($email)) {
                    $ok = addUser($nom, $prenom, $email, $password);

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



?>