<?php
/**
 * Created by PhpStorm.
 * User: d14011479
 * Date: 17/01/17
 * Time: 10:08
 */

include_once 'util.php';
include_once '../controleur/util.php';
include_once '../model/envoyer_mail.php';

$subject = $_POST['objet'];
$contenu = $_POST['contenu'];
$mail = $_SESSION['user']->getEmail();

$success = envoyerMail($subject, $contenu, $mail);
header('Location: index.php?mail=' . $success );
  