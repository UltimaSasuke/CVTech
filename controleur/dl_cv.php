<?php
/**
 * Created by PhpStorm.
 * User: Junior
 * Date: 22/01/2017
 * Time: 23:27
 */

include_once "../model/liste_cv.php";

    if (!empty($_GET['nom'] && !empty($_GET['nomCrypte'])))
        telecharger($_GET['nom'], $_GET['nomCrypte']);

