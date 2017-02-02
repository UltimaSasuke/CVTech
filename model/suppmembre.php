<?php
/**
 * Created by PhpStorm.
 * User: d14011479
 * Date: 11/01/17
 * Time: 11:59
 */

include_once "utils.bdd.inc.php";
function suppMembre($id) {


    $dbLink = connnectDB();
    $query = "DELETE FROM user WHERE id='". $id ."'";
    if(!($dbResult = mysqli_query($dbLink,$query))){
        echo 'Erreur dans la requête SQL <br/>';
        echo 'Erreur : ' . mysqli_error($dbLink) . '<br/>';
        echo 'Requête : ' . $query . '<br/>';
        exit();
    }



}

?>