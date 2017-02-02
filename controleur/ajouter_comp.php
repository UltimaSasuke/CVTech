<?php
/**
 * Created by PhpStorm.
 * User: Diego
 * Date: 17/01/2017
 * Time: 19:18
 */

include_once ("../model/ajouter_comp.php");


if(!empty($_SESSION['user'])) {
    $nom = $_POST['nom'];
    ajouterComp($nom);

}
header('Location: a_comp.php');