<?php
/**
 * Created by PhpStorm.
 * User: c15003239
 * Date: 11/01/17
 * Time: 08:46
 */

include_once "util.php";
include_once "../vue/header.php";
include_once "../vue/menu.php";
include_once "../model/depotFics.php";

if(isset($_SESSION['user']) && !is_null($_SESSION['user']->getId())) {
    if (isset($_FILES['fichier'])) {
        $path = '../fichier/cvPDF/';
        $fichier = $_FILES['fichier']['name'];//nom réel
        $tmp = $_FILES['fichier']['tmp_name'];//nom temporaire
        if (is_uploaded_file($tmp)) //permet de vérifier si le fichier a été uplodé via http
        {
            //vérification du type de l'img, son poids et sa taille
            //Pour supprimer les espaces dans les noms de fichiers car celà entraîne une erreur lorsque vous voulez l'afficher
            $fichier = preg_replace("` `i", "", $fichier);
            $nom_final = uniqid("", false);
            move_uploaded_file($tmp, $path . $nom_final . ".pdf");
            //Message indiquant que tout s'est bien passé
            stockerUploadCVBD($fichier, $path . $nom_final,$_SESSION['user']->getId());
            header("Location: index.php");
        } else {
            //Le type mime, ou la taille ou le poids est incorrect
            echo 'Votre CV a été rejeté';
        }
    } else {
        echo "<form name=\"depotCV\" action=\"depotFics.php\" method=\"post\" enctype=\"multipart/form-data\">
         <input type=\"file\" name=\"fichier\" accept=\"application/pdf\"><br/>
         <input type=\"submit\" value=\"Envoyer le CV\" /*onclick=\"notif('CV uploadé avec succès.','top-right')\" *//>
         </form>";

    }
}
else {
    include_once "../vue/zone_interdit.php";
}
include_once "../vue/footer.php";
