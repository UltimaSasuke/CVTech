<?php
/**
 * Created by PhpStorm.
 * User: d14011479
 * Date: 11/01/17
 * Time: 12:06
 */
include_once ("utils.bdd.inc.php");
function recupererMotDePasse($email){
    $dbLink = connnectDB();
    $query = "SELECT * from user WHERE email='" . $email . "'";
    if(!($dbResult = mysqli_query($dbLink,$query))){
        echo 'Erreur dans la requête SQL <br/>';
        echo 'Erreur : ' . mysqli_error($dbLink) . '<br/>';
        echo 'Requête : ' . $query . '<br/>';
        exit();
    }
    while($dbRow = mysqli_fetch_assoc($dbResult)) {
        $sujet = "CVtheque : mot de passe perdu";
        $contenu_message = "Lien de réinitialisation du mot de passe : " .
            "http://hybrid-games.fr/mdpoublie.php?token=" . $dbRow['tokenrecupmdp'] . "\n";
        $adresse_exp = "From: noreply@cvtheque.hybrid-games.fr";
        $succes = mail($email, $sujet, $contenu_message, $adresse_exp);
    }
    if($succes)
        echo 'Un mail vous a été envoyé';
    else
        echo 'Une erreur est survenue lors de l\'envoi du mail';
}

function majMdp($token,$mdp){
    $dbLink = connnectDB();
    $query = "UPDATE user SET password= SHA2('" . $mdp . "',256) WHERE tokenrecupmdp='" . $token ."'";
    if(!($dbResult = mysqli_query($dbLink,$query))){
        echo 'Erreur dans la requête SQL <br/>';
        echo 'Erreur : ' . mysqli_error($dbLink) . '<br/>';
        echo 'Requête : ' . $query . '<br/>';
        exit();
    }
    resetToken($token);
}

function resetToken($token){
    $dbLink = connnectDB();
    $token2 = uniqid("",true);
    $query = "UPDATE user SET tokenrecupmdp='".$token2."' WHERE tokenrecupmdp='".$token."'";
    if(!($dbResult = mysqli_query($dbLink, $query))) {
        echo 'Erreur dans requête<br />';
        echo 'Erreur : ' . mysqli_error($dbLink) . '<br/>';
        echo 'Requête : ' . $query . '<br/>';
        exit();
    }
}
