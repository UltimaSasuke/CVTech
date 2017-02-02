<?php
/**
 * Created by PhpStorm.
 * User: d14011479
 * Date: 10/01/17
 * Time: 16:26
 */

include_once "utils.bdd.inc.php";



class UserDAO {

    function updatePassword($user) {

        $dbLink = connnectDB();
        $query = "UPDATE user SET password = SHA2('". $user->getPassword() ."',256) WHERE id='". $user->getId() ."';";
        if(!($dbResult = mysqli_query($dbLink, $query)))
        {

            echo 'Erreur dans requête<br />';
            echo 'Erreur : ' . mysqli_error($dbLink) . '<br/>';
            echo 'Requête : ' . $query . '<br/>';

            exit();

        }

    }

    function updateGeneralInformation($user) {

        $dbLink = connnectDB();

        $query = "UPDATE user SET nom='". $user->getNom() ."', prenom='".$user->getPrenom()."', email='".$user->getEmail()."' WHERE id ='" . $user->getId() ."';";
        if(!($dbResult = mysqli_query($dbLink, $query)))
        {

            echo 'Erreur dans requête<br />';
            echo 'Erreur : ' . mysqli_error($dbLink) . '<br/>';
            echo 'Requête : ' . $query . '<br/>';

            exit();

        }


    }

    function changeToken($user) {

        $dbLink = connnectDB();
        $token2 = uniqid("",true);
        $query = "UPDATE user SET tokenrecupmdp='".$token2."' WHERE id='".$user->getId()."'";
        if(!($dbResult = mysqli_query($dbLink, $query)))
        {

            echo 'Erreur dans requête<br />';
            echo 'Erreur : ' . mysqli_error($dbLink) . '<br/>';
            echo 'Requête : ' . $query . '<br/>';
            exit();
        }
        $user->setToken($token2);

    }

    function changePassword($user) {


        $dbLink = connnectDB();
        $query = "UPDATE user SET password= SHA2('" . $user->getPassword() . "',256) WHERE tokenrecupmdp='" . $user->getToken() ."'";
        if(!($dbResult = mysqli_query($dbLink,$query))){
            echo 'Erreur dans la requête SQL <br/>';
            echo 'Erreur : ' . mysqli_error($dbLink) . '<br/>';
            echo 'Requête : ' . $query . '<br/>';
            exit();
        }
        $this->changeToken($user);


    }


    function connectUser($email, $password)
    {


        if (!empty($email) && !empty($password)) {
            $dbLink = connnectDB();

            $query = "SELECT * FROM user WHERE email = '" . $email . "' AND password = SHA2('" . $password . "', 256) AND compteactive = 1";
            $addConnexion = "UPDATE user SET nbconnection = nbconnection + 1 WHERE email='" . $email . "';";
            if (!($dbResult = mysqli_query($dbLink, $query))) {

                echo 'Erreur dans requête<br />';
                echo 'Erreur : ' . mysqli_error($dbLink) . '<br/>';
                echo 'Requête : ' . $query . '<br/>';

                exit();

            }
            while ($dbRow = mysqli_fetch_assoc($dbResult)) {

                if (!($dbResultCheck = mysqli_query($dbLink, $addConnexion))) {

                    echo 'Erreur dans requête<br />';
                    echo 'Erreur : ' . mysqli_error($dbLink) . '<br/>';
                    echo 'Requête : ' . $query . '<br/>';

                    exit();

                }
                $userData = $dbRow;


            }


            if (!empty($userData)) {

                $userData['droit'] = checkDroit($userData['id_droit']);

            }

            $_SESSION = $userData;


            return $userData;

        }
    }

    function recupererById($id)
    {



            $dbLink = connnectDB();

            $query = "SELECT * FROM user WHERE id=$id;";
            if (!($dbResult = mysqli_query($dbLink, $query))) {

                echo 'Erreur dans requête<br />';
                echo 'Erreur : ' . mysqli_error($dbLink) . '<br/>';
                echo 'Requête : ' . $query . '<br/>';

                exit();

            }
            while ($dbRow = mysqli_fetch_assoc($dbResult)) {


                $userData = $dbRow;


            }


            if (!empty($userData)) {

                $userData['droit'] = checkDroit($userData['id_droit']);

            }



            return $userData;


    }


    function addUser($nom, $prenom , $email, $password) {



        $dbLink = connnectDB();

        $check = "SELECT email FROM user WHERE email ='" . $email . "';";

        if(!($dbResultCheck = mysqli_query($dbLink, $check)))
        {

            echo 'Erreur dans requête<br />';
            echo 'Erreur : ' . mysqli_error($dbLink) . '<br/>';
            echo 'Requête : ' . $check . '<br/>';
            exit();
        } else {
            while ($dbRowCheck = mysqli_fetch_assoc($dbResultCheck)) {

                if (!empty($dbRowCheck['email']))
                    return false;

            }

        }


        $token = uniqid("",true);

        $query = "INSERT INTO user (nom, prenom, password, email , tokenrecupmdp)
              VALUES ('" .$nom."','" . $prenom . "', SHA2('" . $password . "', 256),'" . $email ."','". $token."')";


        if(!($dbResult = mysqli_query($dbLink, $query)))

        {

            echo 'Erreur dans requête<br />';
            echo 'Erreur : ' . mysqli_error($dbLink) . '<br/>';
            echo 'Requête : ' . $query . '<br/>';
            return "ko";

        } else {


            return "ok";

        }




    }

    private function get_ip() {
        if (isset($_SERVER['HTTP_CLIENT_IP'])) {
            return $_SERVER['HTTP_CLIENT_IP'];
        }
        elseif (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            return $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        else {
            return (isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '');
        }
    }

    public function addLog($email) {

        $ip = $this->get_ip();

        $dbLink = connnectDB();
        $query = "INSERT INTO log_connexion (email, ip, date, heure)
              VALUES ('" . $email."','" . $ip . "', NOW(), NOW());";


        if(!($dbResult = mysqli_query($dbLink, $query)))
        {

            echo 'Erreur dans requête<br />';
            echo 'Erreur : ' . mysqli_error($dbLink) . '<br/>';
            echo 'Requête : ' . $query . '<br/>';
            return "ko";

        } else {


            return "ok";

        }

    }



}