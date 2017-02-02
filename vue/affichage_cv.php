<?php
/**
 * Created by PhpStorm.
 * User: Diego
 * Date: 21/01/2017
 * Time: 19:50
 */


?>
<div class="container">
    <div class="resume">
        <header class="page-header">
            <h1 class="page-title">Fiche de <?php if(isset($cv)) echo $cv->getNom() . " " . $cv->getPrenom(); ?></h1>
            <small> <i class="fa fa-clock-o"></i> Dérnière mise à jour : <time><?php if(isset($cv)) echo $cv->getModifDate(); ?></time></small>
        </header>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-offset-1 col-md-10 col-lg-offset-2 col-lg-8">
                <div class="panel panel-default">
                    <div class="panel-heading resume-heading">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="col-xs-12 col-sm-4">
                                    <figure>
                                        <img class="img-circle img-responsive" alt="" src="<?php if(isset($cv)) $image = getImageFromId($cv->getUrlImage());
                                        if(!empty($image)) echo $image;
                                        else echo "https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=300";?>">
                                    </figure>

                                    <div class="row">
                                        <div class="col-xs-12 social-btns">


                                            <a class="btn btn-sm btn-success" type="button" data-toggle="modal" data-tip="tooltip" data-target="#email-<?php if(isset($cv)) echo $cv->getId(); ?>" data-original-title="Envoyer mail">
                                                <i class="glyphicon glyphicon-envelope"></i>
                                            </a>

                                            <a class="btn btn-sm btn-warning" type="button"  href="gestion_cv.php?id=<?php if(isset($cv)) echo $cv->getId(); ?>" data-tip="tooltip" data-original-title="Editer l'utilisateur">
                                                <i class="glyphicon glyphicon-edit"></i>
                                            </a>
                                            <a class="btn btn-sm btn-danger" type="button"  href="supp_cv.php?id=<?php if(isset($cv)) echo $cv->getId(); ?>" data-tip="tooltip" data-original-title="Supprimer l'utilisateur">
                                                <i class="glyphicon glyphicon-remove"></i>
                                            </a>
                                            <?php
                                            $find = false;
                                            if(!empty($_SESSION['liste'])) {
                                                foreach ($_SESSION['liste'] as $cvliste) {

                                                    if ($cvliste->getId() == $cv->getId()) {
                                                        $find = true;
                                                    }

                                                }
                                            }

                                            if($find) {
                                                ?>
                                                <a type="button" class="btn btn-sm btn-warning" href="ajout_liste.php?type=remove&id=<?php if(isset($cv)) echo $cv->getId(); ?>" data-tip="tooltip" data-original-title="Supprimer de la liste">
                                                    <i class="glyphicon glyphicon-list-alt"></i>

                                                </a>
                                                <?php
                                            } else {
                                            ?>
                                            <a type="button" class="btn btn-sm btn-success" href="ajout_liste.php?id=<?php if(isset($cv)) echo $cv->getId(); ?>" data-tip="tooltip" data-original-title="Ajouter à la liste">
                                                <i class="glyphicon glyphicon-list-alt"></i>                                            </a>
                                            <?php }?>


                                            <!-- BOUTONS -->

                                        </div>
                                    </div>

                                </div>

                                <div class="col-xs-12 col-sm-8">
                                    <ul class="list-group">
                                        <li class="list-group-item"><?php if(isset($cv)) echo $cv->getNom() . " " . $cv->getPrenom(); ?></li>
                                        <li class="list-group-item"><?php if(isset($cv)) echo $cv->getType(); ?></li>
                                        <li class="list-group-item"><i class="fa fa-phone"></i> <?php if(isset($cv)) echo $cv->getTel(); ?> </li>
                                        <li class="list-group-item"><i class="fa fa-envelope"></i> <?php if(isset($cv)) echo $cv->getEmail(); ?></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bs-callout bs-callout-danger">
                        <h4>Sous-Compétences</h4>









                        <?php ?><ul class="list-group">
                            <a class="list-group-item inactive-link" href="#">

                                <?php


                                if(isset($cv)) {
                                    $comps = $cv->getComp();
                                if(!empty($comps)) {
                                foreach ($comps as $comp)
                                {

                                    ?>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-<?php

                                        if(0 <= $comp['value'] && $comp['value'] < 25) {

                                            echo "danger";

                                        }
                                        else if(100 > $comp['value'] && $comp['value'] > 75) {

                                            echo "success";
                                        }
                                        else if($comp['value'] >= 50 && $comp['value'] <= 75) {

                                            echo "info";
                                        }
                                        else if(25 <= $comp['value'] && $comp['value'] < 50) {

                                            echo "warning";
                                        }
                                        else {
                                            echo "";
                                        }?>" role="progressbar" aria-valuenow="<?php echo $comp['value']; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $comp['value']; ?>%;">
                                        <span class="sr-only"><?php echo $comp['value']; ?>%</span>
                                        </div>
                                        <span class="progress-type"><?php echo $comp['nom_sous_comp']; ?></span>
                                        <span class="progress-completed"><?php echo $comp['value']; ?>%</span>
                                    </div>

                                <?php } }}?>

                                <div class="progress-meter">
                                    <div style="width: 25%;" class="meter meter-left"><span class="meter-text">Débutant</span></div>
                                    <div style="width: 25%;" class="meter meter-left"><span class="meter-text">Bon</span></div>
                                    <div style="width: 30%;" class="meter meter-right"><span class="meter-text">Expert</span></div>
                                    <div style="width: 20%;" class="meter meter-right"><span class="meter-text">Très bon</span></div>
                                </div>

                            </a>

                        </ul>

                    </div>
                    <div class="bs-callout bs-callout-danger">
                        <h4>Remarques</h4>
                        <p>
                            <?php if(isset($cv)) echo $cv->getRemarques() ?>

                        </p>
                    </div>
                    <div class="bs-callout bs-callout-danger">
                        <h4>PDF</h4>
                        <p>


                            <?php
                            if(!empty($cv->getCVsPDF())) {
                            $i= 1 ;
                            foreach($cv->getCVsPDF() as $cvPDF) {

                               ?>

                            <a class ="btn-sm btn-info" href="<?php echo "dl_cv.php?nom=".getPathFromName($cvPDF)."&nomCrypte=".substr($cvPDF,22); ?>">CV -<?php echo $i; ?></a>



                        <?php ++$i;
                            }
                            } ?>

                        </p>
                    </div>
                    <div class="bs-callout bs-callout-danger">
                        <h4>Contrat assurance pro : </h4>
                        <?php $chem = getContratFromId($cv->getUrlContrat());
                        if(!empty($chem))
                            echo '<p><a href="' . $chem . '" class="btn btn-default" >Contrat assurance pro</a></p>';
                        ?>
                    </div>
                </div>

            </div>
        </div>

    </div>

</div>


<div class="modal fade" id="email-<?php if(isset($cv)) echo $cv->getId(); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Envoyer un mail à <?php if(isset($cv)) echo $cv->getNom() . " " . $cv->getPrenom(); ?></h4>
            </div>
            <form id="evoyer_mail" action="envoyer_mail.php" method="post">
                <div class="modal-body">

                    <div>
                        <label>Objet</label>
                        <input type="text" placeholder="Objet..." class="form-control" name="objet">
                    </div>
                    <div>
                        <label>Contenu</label>
                        <textarea name="contenu" class="form-control" rows="5"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Quitter</button>
                    <button type="submit" class="btn btn-primary" >Envoyer mail</button>

                </div>
            </form>
        </div>
    </div>
</div>
