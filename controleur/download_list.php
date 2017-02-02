<?php
/**
 * Created by PhpStorm.
 * User: Diego
 * Date: 22/01/2017
 * Time: 00:40
 */

include_once ('util.php');

if(!empty($_SESSION['user'])) {
    header("Content-disposition: attachment; filename=Liste-CV.zip");
    header("Content-Type: application/force-download");
    header("Content-Transfer-Encoding: application/octet-stream");
    header("Pragma: no-cache");
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0, public");
    header("Expires: 0");
    readfile("/var/www/html/projet/fichier/liste-" . $_SESSION['user']->getId() . "/Liste-CV-" . $_SESSION['user']->getId() . ".zip");
}
else
    include_once '../vue/zone_interdit.php';