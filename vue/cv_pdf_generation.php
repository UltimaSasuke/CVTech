<?php
/**
 * Created by PhpStorm.
 * User: Diego
 * Date: 21/01/2017
 * Time: 20:01
 */



?>
<style type="text/css">
    <!--
    table { vertical-align: top; }
    tr    { vertical-align: top; }
    td    { vertical-align: top; }
    }
    -->
</style>
<page backcolor="#FEFEFE" backimgx="center" backimgy="bottom" backimgw="100%" backtop="0" backbottom="30mm" footer="date;heure;page" style="font-size: 12pt">
    <bookmark title="cv" level="0" ></bookmark>
    <barcode type="EAN13" value="<?php echo $cv->getId(); ?>" label="label" style="width:30mm; height:6mm; font-size: 4mm"></barcode>
    <table cellspacing="0" style="width: 100%; text-align: center; font-size: 14px">
        <tr>
            <td style="width: 75%;">
            </td>
            <td style="width: 25%; color: #444444;">
                CV - <?php echo $cv->getId(); ?>
            </td>
        </tr>
    </table>
    <br>
    <br>
    <table cellspacing="0" style="width: 100%; text-align: left; font-size: 11pt;">
        <?php
        if(isset($_GET['anonyme'])) {

    ?>

            <tr>
                <td style="width:50%;"></td>
                <td style="width:14%; ">Identification :</td>
                <td style="width:36%">
                    N°<?php echo $cv->getId(); ?>
                </td>
            </tr>

      <?php



        }
        else { ?>
        <tr>
            <td style="width:50%;"></td>
            <td style="width:14%; ">Nom :</td>
            <td style="width:36%"><?php echo $cv->getNom(); ?></td>
        </tr>
        <tr>
            <td style="width:50%;"></td>
            <td style="width:14%; ">Adresse :</td>
            <td style="width:36%">
                <?php echo $cv->getAdresse(); ?><br>
                <?php echo $cv->getCodePostale(); ?><br>
                <?php echo $cv->getVille(); ?><br>
            </td>
        </tr>
        <tr>
            <td style="width:50%;"></td>
            <td style="width:14%; ">Email :</td>
            <td style="width:36%"><?php echo $cv->getEmail(); ?></td>
        </tr>
        <tr>
            <td style="width:50%;"></td>
            <td style="width:14%; ">Tel :</td>
            <td style="width:36%"><?php echo $cv->getTel(); ?></td>
        </tr>
        <?php } ?>
    </table>
    <br>
    <br>
    <table cellspacing="0" style="width: 100%; text-align: left;font-size: 10pt">
        <tr>
            <td style="width:50%;"></td>
            <td style="width:50%; ">Date de la dérnière modification de ce cv : <?php echo $cv->getModifDate(); ?></td>
        </tr>
    </table>
    <br>
    <br>

    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

    <table cellspacing="0" style="width: 100%; border: solid 1px black; background: #E7E7E7; text-align: center; font-size: 10pt;">
        <tr>
            <th style="width: 12%">Compétence</th>
            <th style="width: 52%">Niveau*</th>
        </tr>
    </table>
    <?php
    $comps = $cv->getComp();
    foreach($comps as $comp) {
        ?>
        <table cellspacing="0" style="width: 100%; border: solid 1px black; background: #F7F7F7; text-align: center; font-size: 10pt;">
            <tr>
                <td style="width: 12%; text-align: left"><?php echo $comp['nom_sous_comp']; ?></td>
                <td style="width: 52%; text-align: left"><?php echo $comp['value']; ?></td>
            </tr>
        </table>
        <?php
    }
    ?>
    <p style="font-size: 10pt; ">* : Si le niveau est à 0 c'est que le champ n'a pas été renseigné par nos services.</p>
    <br>
    <br>
    <br>
    <br>
    Remarques :
    <?php echo $cv->getRemarques(); ?>
    <br>
    <br>
    <br>
    <br>
    <br>

    <nobreak>
        <table cellspacing="0" style="width: 100%; text-align: left;">
            <tr>
                <td style="width:50%;"></td>
                <td style="width:50%; ">
                    <?php echo $_SESSION['user']->getNom() . " " . $_SESSION['user']->getPrenom();?><br>
                    Relation client<br>
                    Tel : (Téléphone entreprise)<br>
                    Email : <?php echo $_SESSION['user']->getEmail(); ?><br>
                </td>
            </tr>
        </table>
    </nobreak>
</page>