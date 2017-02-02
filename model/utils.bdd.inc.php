<?php
/**
 * Created by PhpStorm.
 * User: d14011479
 * Date: 10/01/17
 * Time: 16:29
 */

function connnectDB() {


    $dbHost = 'localhost';
    $dbLogin = 'cvtech';
    $dbPass = 'cvtechpass';
    $dbBd = 'cvtech';

    $dbLink = mysqli_connect($dbHost, $dbLogin, $dbPass) or die('Erreur de connexion au serveur : ' . mysqli_connect_error());
    mysqli_select_db($dbLink , $dbBd) or die('Erreur dans la sélection de la base : ' . mysqli_error($dbLink));
    mysqli_set_charset($dbLink, "utf-8");
    return $dbLink;

}

function checkDroit($id) {

    $dbLink = connnectDB();
    $query = "SELECT * FROM droit WHERE id_droit='" . $id . "';";


    if(!($dbResult = mysqli_query($dbLink, $query)))
    {

        echo 'Erreur dans requête<br />';
        echo 'Erreur : ' . mysqli_error($dbLink) . '<br/>';
        echo 'Requête : ' . $query . '<br/>';
        echo $query;
        exit();

    }

    while($dbRow = mysqli_fetch_assoc($dbResult))    {
        return $dbRow;
    }
    return null;
}

function checkUser($email, $password) {

    $dbLink = connnectDB();

    $query = "SELECT * FROM user WHERE email = '". $email ."' AND password = SHA2('". $password ."', 256) AND compteactive = 1";
    $addConnexion = "UPDATE user SET nbconnection = nbconnection + 1 WHERE email='" . $email . "';";
    if(!($dbResult = mysqli_query($dbLink, $query)))

    {

        echo 'Erreur dans requête<br />';
        echo 'Erreur : ' . mysqli_error($dbLink) . '<br/>';
        echo 'Requête : ' . $query . '<br/>';

        exit();

    }


    while($dbRow = mysqli_fetch_assoc($dbResult))
    {

        if(!($dbResultCheck = mysqli_query($dbLink, $addConnexion)))

        {

            echo 'Erreur dans requête<br />';
            echo 'Erreur : ' . mysqli_error($dbLink) . '<br/>';
            echo 'Requête : ' . $query . '<br/>';

            exit();

        }

        return $dbRow;

    }

    return null;


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

    function addCV($nom,$chemin,$idcv){
        $dbLink = connnectDB();
        $query = "INSERT INTO CV (nomCV, idLienCV, dateUpload, chemin)
                  VALUES ('" . $nom . "','" . $idcv . "',NOW(),'" . $chemin . "')";
        if(!($dbResult = mysqli_query($dbLink, $query)))        {
            echo 'Erreur dans requête<br />';
            echo 'Erreur : ' . mysqli_error($dbLink) . '<br/>';
            echo 'Requête : ' . $query . '<br/>';
            return "ko";
        }
        else
            return "ok";
    }

    function addPhoto($chemin,$taille){
        $dbLink = connnectDB();
        $query = "INSERT INTO PHOTO(chemin, taille) VALUES ('".$chemin . "','".$taille ."')";
        if(!($dbResult = mysqli_query($dbLink, $query)))        {
            echo 'Erreur dans requête<br />';
            echo 'Erreur : ' . mysqli_error($dbLink) . '<br/>';
            echo 'Requête : ' . $query . '<br/>';
            return "ko";
        }
        else
            return "ok";
    }

    function addContratAssurance($chemin){
        $dbLink = connnectDB();
        $query = "INSERT INTO CONTRAT_ASSURANCE_PRO(chemin) VALUES ('".$chemin ."')";
        if(!($dbResult = mysqli_query($dbLink, $query)))        {
            echo 'Erreur dans requête<br />';
            echo 'Erreur : ' . mysqli_error($dbLink) . '<br/>';
            echo 'Requête : ' . $query . '<br/>';
            return "ko";
        }
        else
            return "ok";
    }


?>