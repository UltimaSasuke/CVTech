<?php
/**
 * Created by PhpStorm.
 * User: Diego
 * Date: 21/01/2017
 * Time: 21:41
 */

include_once ('util.php');
include_once '../model/cv.php';

if(!empty($_SESSION['user'])) {

    if (!empty($_GET['type']) && $_GET['type'] == "remove") {
        foreach ($_SESSION['liste'] as $key => $cv) {

            if ($cv == $_GET['id']) {
                unset($_SESSION['liste'][$key]);
                break;
            }
        }
    } else {

        $key = 0;
        foreach ($_SESSION['liste'] as $k => $cv) {

            if($k > $key) $key = $k;

        }

        $_SESSION['liste'][$key+1] = $_GET['id'];
    }
}

header('Location: recherche_cv.php?champ='.$_GET['champ']);