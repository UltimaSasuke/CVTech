<?php
/**
 * Created by PhpStorm.
 * User: d14011479
 * Date: 17/01/17
 * Time: 10:12
 */


function envoyerMail($subject, $contenu, $mail) {


    $succes = mail($mail, $subject, $contenu, "From: " . $_SESSION['user']->getEmail());
    return $succes;
    
}