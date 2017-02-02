<?php
/**
 * Created by PhpStorm.
 * User: d14011479
 * Date: 11/01/17
 * Time: 10:02
 */

session_start();
setcookie('log', NULL, -1, '/', 'hybrid-games.fr', false, true);
unset($_COOKIE['log']);

session_unset();
session_destroy();


header('Location: index.php');