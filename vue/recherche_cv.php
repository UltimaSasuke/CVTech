<?php
/**
 * Created by PhpStorm.
 * User: Diego
 * Date: 22/01/2017
 * Time: 14:18
 */

?>


<div class="container">
    <div
        class="well col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xs-offset-2 col-sm-offset-2 col-md-offset-2 col-lg-offset-2">
        <div class="row user-row">
            <div class="col-xs-3 col-sm-2 col-md-1 col-lg-1">
                <img class="img-circle img-responsive" alt="" src="<?php if(isset($cv)) $image = getImageFromId($cv->getUrlImage());
                if(!empty($image)) echo $image;
                else echo "https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=50";?>">
            </div>
            <div class="col-xs-8 col-sm-9 col-md-10 col-lg-10">
                <strong><?php echo $cv->getNom() . " " . $cv->getPrenom(); ?></strong><br>
                <span class="text-muted">Type d'emplois : <?php echo $cv->getType(); ?></span><br>
                <?php
                $find = false;
                if(!empty($_SESSION['liste'])) {
                    foreach ($_SESSION['liste'] as $cvliste) {

                        if($cvliste == $cv->getId()) {
                            $find = true;
                        }

                    }}

                if($find) {
                    ?>
                    <a type="button" class="btn btn-sm btn-warning" href="ajout_liste.php?champ=<?php echo $_GET['champ'] ?>&type=remove&id=<?php if(isset($cv)) echo $cv->getId(); ?>" data-tip="tooltip" data-original-title="Supprimer de la liste">
                        <i class="glyphicon glyphicon-list-alt"></i>
                    </a>
                    <?php
                } else {
                    ?>
                    <a type="button" class="btn btn-sm btn-success" href="ajout_liste.php?champ=<?php echo $_GET['champ'] ?>&id=<?php if(isset($cv)) echo $cv->getId(); ?>" data-tip="tooltip" data-original-title="Ajouter à la liste">
                        <i class="glyphicon glyphicon-list-alt"></i>
                    </a>
                <?php }?>
            </div>
            <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 dropdown-user"
                 data-for=".<?php echo $cv->getPrenom() . $cv->getId(); ?>">
                <i class="glyphicon glyphicon-chevron-down text-muted"></i>
            </div>
        </div>
        <div class="row user-infos <?php echo $cv->getPrenom() . $cv->getId(); ?>">
            <div
                class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-xs-offset-0 col-sm-offset-0 col-md-offset-1 col-lg-offset-1">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Contacter l'utilisateur ?</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-3 col-lg-3 hidden-xs hidden-sm">
                                <img class="img-circle img-responsive" alt="" src="<?php if(isset($cv)) $image = getImageFromId($cv->getUrlImage());
                                if(!empty($image)) echo $image;
                                else echo "https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=50";?>">
                            </div>
                            <div class="col-xs-2 col-sm-2 hidden-md hidden-lg">
                                <img class="img-circle img-responsive" alt="" src="<?php if(isset($cv)) $image = getImageFromId($cv->getUrlImage());
                                if(!empty($image)) echo $image;
                                else echo "https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=50";?>">
                            </div>
                            <div class="col-xs-10 col-sm-10 hidden-md hidden-lg">
                                <strong><?php echo $cv->getNom() . " " . $cv->getPrenom(); ?></strong><br>
                                <dl>
                                    <dt>Adresse</dt>
                                    <dd><?php echo $cv->getAdresse(); ?></dd>
                                    <dt>Email</dt>
                                    <dd><?php echo $cv->getEmail(); ?></dd>
                                    <dt>Telephone protable</dt>
                                    <dd><?php echo $cv->getTel(); ?></dd>
                                    <dt>Telephone fixe</dt>
                                    <dd><?php echo $cv->getTelFixe(); ?></dd>
                                </dl>
                            </div>
                            <div class=" col-md-9 col-lg-9 hidden-xs hidden-sm">
                                <strong><?php echo $cv->getNom() . " " . $cv->getPrenom(); ?></strong><br>
                                <table class="table table-user-information">
                                    <tbody>
                                    <tr>
                                        <td>Adresse</td>
                                        <td><?php echo $cv->getAdresse(); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td><?php echo $cv->getEmail(); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Telephone protable</td>
                                        <td><?php echo $cv->getTel(); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Telephone fixe</td>
                                        <td><?php echo $cv->getTelFixe(); ?></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <button class="btn btn-sm btn-success" type="button" data-toggle="modal" data-target="#email-<?php echo $cv->getId(); ?>" data-tip="tooltip" data-original-title="Envoyer un mail">
                            <i class="glyphicon glyphicon-envelope"></i>
                        </button>
                        <span class="pull-right">
                <a class="btn btn-sm btn-warning" type="button"  href="gestion_cv.php?id=<?php echo $cv->getId(); ?>" data-tip="tooltip" data-original-title="Editer la fiche">
                    <i class="glyphicon glyphicon-edit"></i>
                </a>
                <a class="btn btn-info" type="button" href="affichage_cv.php?id=<?php echo $cv->getId(); ?>" data-tip="tooltip" data-original-title="Voir la fiche">
                    <i class="glyphicon glyphicon-eye-open"></i>
                </a>

                    </div>
                </div>
            </div>


        </div>
    </div>

    <div class="modal fade" id="email-<?php echo $cv->getId(); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Envoyer un mail à <?php echo $cv->getNom() . " " . $cv->getPrenom(); ?></h4>
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

</div>
