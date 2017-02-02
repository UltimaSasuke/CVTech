<?php
/**
 * Created by PhpStorm.
 * User: Diego
 * Date: 21/01/2017
 * Time: 19:33
 */

include_once ('util.php');
include_once ('../model/cv.php');

if(!empty($_SESSION['user']) && $_SESSION['user']->haveAccess('creer_cv')) {

    $zip = new ZipArchive();
    unlink("/var/www/html/projet/fichier/liste-" . $_SESSION['user']->getId() . "/Liste-CV-" . $_SESSION['user']->getId() . ".zip");
    $filename = "/var/www/html/projet/fichier/liste-" . $_SESSION['user']->getId() . "/Liste-CV-" . $_SESSION['user']->getId() . ".zip";

    if ($zip->open($filename, ZipArchive::CREATE) !== TRUE) {
        exit("Impossible d'ouvrir le fichier <$filename>\n");
    }

    foreach ($_SESSION['liste'] as $cvId) {
        $cv = new CV($cvId);

        $rep = '../fichier/liste-' . $_SESSION['user']->getId() . '/';
        $fic = 'cv' . $cv->getId() . ".pdf";

        if (!file_exists($rep)) {
            mkdir($rep, 0775);

        }
        unlink($rep . $fic);
        fopen($rep . $fic, "x+");
        chmod($rep . $fic, 0775);


        // get the HTML
        ob_start();
        include('../vue/cv_pdf_generation.php');
        $content = ob_get_clean();

        // convert in PDF
        require_once(dirname(__FILE__) . '/../model/vendor/autoload.php');
        try {
            $html2pdf = new HTML2PDF('P', 'A4', 'fr');
            //      $html2pdf->setModeDebug();
            $html2pdf->setDefaultFont('Arial');
            $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
            ob_clean();
            $html2pdf->Output('/var/www/html/projet/fichier/liste-' . $_SESSION['user']->getId() . '/' . $fic, 'F');
            $zip->addFile($rep . $fic);

        } catch (HTML2PDF_exception $e) {
            echo $e;
            exit;
        }
    }
}

header('Location: liste_cv.php');





