<?php
/**
 * Created by PhpStorm.
 * User: Junior
 * Date: 15/01/2017
 * Time: 12:48
 */

include_once "util.php";
include_once "../vue/header.php";
include_once "../vue/menu.php";

if(!empty($_SESSION['user']) && $_SESSION['user']->haveAccess('creer_cv')) {
    if(!empty($_SESSION['liste'])) {

        ?>


        <?php
        include_once '../vue/cv_line_head.php';
        foreach($_SESSION['liste'] as $key => $idCV) {
            $cv[$key] = new CV($idCV);

            include '../vue/cv_line.php';

        }
        include_once '../vue/cv_line_foot.php';

    } else {

        echo "Votre liste est vide.";


    }
}
else {

    include_once 'zone_interdit.php';

}


include_once "../vue/footer.php";