<?php
/**
 * Created by PhpStorm.
 * User: Diego
 * Date: 15/01/2017
 * Time: 14:23
 */

include_once "utils.bdd.inc.php";
include_once "cv.php";

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$pseudonyme = $_POST['pseudonyme'];
$email = $_POST['email'];
$sexe = $_POST['sexe'];
$nom_metier = $_POST['type'];
$secu = $_POST['secu'];
$contrat_pro = $_POST['contrat_pro'];
$tel = $_POST['tel'];
$tel_fixe = $_POST['tel_fixe'];
$adresse = $_POST['adresse'];
$code_postal = $_POST['code_postal'];
$ville = $_POST['ville'];
$remarques = $_POST['remarques'];
$sous_comp = $_POST['id_sous_comp'];
$value = $_POST['value'];


if(!empty($_GET['id'])) {


    $cv = new CV($_GET['id']);
    $cv->setAdresse($adresse);
    $cv->setCodePostale($code_postal);
    $cv->setContratAssurancePro($contrat_pro);
    $cv->setEmail($email);
    $cv->setRemarques($remarques);
    $cv->setNom($nom);
    $cv->setPrenom($prenom);
    $cv->setPseudonyme($pseudonyme);
    $cv->setSecuSocial($secu);
    $cv->setSexe($sexe);
    $cv->setVille($ville);
    $cv->setTel($tel);
    $cv->setTelFixe($tel_fixe);
    $cv->setType($nom_metier);
    $cv->update();
    $cv->updateSousComp($sous_comp, $value);



} else {

    $dbLink = connnectDB();

    $nomQ = "INSERT INTO infos_cv 
          (nom, prenom, pseudonyme, email, sexe, type, securite_social, 
          contrat_assurance_pro, telephone_portable, telephone_fixe, adresse, code_postale, ville, remarque";
    $value = "VALUES('" . $nom . "', '" . $prenom . "','" . $pseudonyme . "','" . $email . "','" . $sexe . "','" . $nom_metier . "','" . $secu . "',
          '" . $contrat_pro . "','" . $tel . "','" . $tel_fixe . "','" . $adresse . "','" . $code_postal . "','" . $ville . "', '" . $remarques . "'";




    if($idPhoto != 0) {
        $nomQ .= ", photo_image";
        $value .= ", '". $idPhoto ."'";
    }
    if($idContrat != 0) {

        $nomQ .= ", contra_assurance_pro_pdf";
        $value .= ", '". $idContrat ."'";

        }


    $nomQ .= ") ";
    $value .= ");";
    $query = $nomQ . $value;
    if (!($dbResult = mysqli_query($dbLink, $query))) {
        echo 'Erreur dans requête<br />';
        echo 'Erreur : ' . mysqli_error($dbLink) . '<br/>';
        echo 'Requête : ' . $query . '<br/>';
        return "ko";
    }
    $dernier_id = mysqli_insert_id($dbLink);

    $cv = new CV($dernier_id);
    $cv->updateSousComp($sous_comp, $value);
}