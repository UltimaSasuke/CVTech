<?php
/**
 * Created by PhpStorm.
 * User: c15003239
 * Date: 17/01/17
 * Time: 12:56
 */
?>
<div class="container">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title"><?php if(!empty($cv)) echo "Modification du cv de ".$cv->getNom(). " ".$cv->getPrenom(); else echo "Ajout CV"; ?></h3>
        </div>
        <form id="ajouter_cv" action="<?php if(!empty($cv)) echo "traitercv.php?id=".$cv->getId(); else echo "traitercv.php"; ?>" method="post" enctype="multipart/form-data">
        <div class="panel-body">
                <div class="col-sm-4 form-group">
                    <label>Nom</label>
                    <input type="text" placeholder="Nom..." class="form-control" name="nom" <?php if(!empty($cv)) echo "value='".$cv->getNom()."'"; ?>>
                </div>
                <div class="col-sm-4 form-group">
                    <label>Prenom</label>
                    <input type="text" placeholder="Prenom..." class="form-control" name="prenom" <?php if(!empty($cv)) echo "value='".$cv->getPrenom()."'"; ?>>
                </div>
                <div class="col-sm-4 form-group">
                    <label>Pseudonyme</label>
                    <input type="text" placeholder="Pseudonyme..." class="form-control" name="pseudonyme" <?php if(!empty($cv)) echo "value='".$cv->getPseudonyme()."'"; ?>>
                </div>
                <div class="col-sm-4 form-group">
                    <label>Email</label>
                    <input type="email" placeholder="Email..." class="form-control" name="email" <?php if(!empty($cv)) echo "value='".$cv->getEmail()."'"; ?>>
                </div>
                <div class="col-sm-4 form-group">
                    <div class="col-xs-4 selectContainer">
                        <label class="col-xs-3 control-label">Sexe</label>
                        <select class="form-control" name="sexe" <?php if(!empty($cv)) echo "value='".$cv->getSexe()."'"; ?>>
                            <option value="1">Homme</option>
                            <option value="0">Femme</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-4 form-group">
                    <label>Nom métier</label>
                    <input type="text" placeholder="Nom métier..." class="form-control" name="type" <?php if(!empty($cv)) echo "value='".$cv->getType()."'"; ?>>
                </div>
                <div class="col-sm-4 form-group">
                    <label>Securité social</label>
                    <input type="text" placeholder="Numéro de sécurité social..." class="form-control" name="secu" <?php if(!empty($cv)) echo "value='".$cv->getSecuSocial()."'"; ?>>
                </div>
                <div class="col-sm-4 form-group">
                    <label>Contrat assurance professionel</label>
                    <input type="text" placeholder="Contrat d'assurance pro..." class="form-control" name="contrat_pro" <?php if(!empty($cv)) echo "value='".$cv->getContratAssurancePro()."'"; ?>>
                </div>
                <div class="col-sm-4 form-group">
                    <label>Téléphone portable</label>
                    <input type="text" placeholder="06 XX XX XX XX" class="form-control" name="tel" maxlength="10" <?php if(!empty($cv)) echo "value='".$cv->getTel()."'"; ?>>
                </div>
                <div class="col-sm-4 form-group">
                    <label>Téléphone fixe</label>
                    <input type="text" placeholder="XX XX XX XX XX" class="form-control" name="tel_fixe" maxlength="10" <?php if(!empty($cv)) echo "value='".$cv->getTelFixe()."'"; ?>>
                </div>
                <div class="col-sm-4 form-group">
                    <label>Adresse</label>
                    <input type="text" placeholder="Adresse..." class="form-control" name="adresse" <?php if(!empty($cv)) echo "value='".$cv->getAdresse()."'"; ?>>
                </div>
                <div class="col-sm-4 form-group">
                    <label>Code postal</label>
                    <input type="text" placeholder="Code postal..." class="form-control" name="code_postal" <?php if(!empty($cv)) echo "value='".$cv->getCodePostale()."'"; ?>>
                </div>
                <div class="col-sm-4 form-group">
                    <label>Ville</label>
                    <input type="text" placeholder="Ville..." class="form-control" name="ville" <?php if(!empty($cv)) echo "value='".$cv->getVille()."'"; ?>>
                </div>
                <div class="col-sm-12 form-group">
                        <label>Remarques</label>
                        <textarea name="remarques" class="form-control" rows="5"><?php if(!empty($cv)) echo $cv->getRemarques(); ?></textarea>
                </div>
                <div class="col-sm-12 form-group">
                    <label>Photo</label>
                    <input type="file" name="photo" id="photo" accept="image/*" /><br/>
                    <input type="hidden" name="MAX_FILE_SIZE" value="1000000"> <?php //Taille max a 1MO ?>
                </div>
                <div class="col-sm-12 form-group">
                    <label>Contrat assurance pro </label>
                    <input type="file" name="contratAssurance" id="contratAssurance" accept="application/pdf" /><br/>

                </div>
                <div class="col-sm-12 form-group">
                    <label>CV(s) Pdf</label>
                    <input type="file" name="cv[]" id="cv" accept="application/pdf" multiple/><br/>
                </div>
                <label>Compétences*</label>
                <br/>
                <div class="container">

                        <h2>*Liste des sous-compétences </h2>
                        <div class="col-sm-12 form-group">

                                <input type="" class="form-control" id="search" placeholder="Rechercher des sous-compétences...">

                        </div>


                <?php



                $comps = getComps();
                foreach($comps as $comp) {


                $sous_comps = getSousComps($comp['id_comp']);
                if(!empty($sous_comps)) {
                foreach($sous_comps as $key => $sous_comp) {
                    ?>


                    <div class="col-sm-3 form-group">
                        <div class="form-group">
                            <div class="searchable-container">
                                <div class="items col-xs-5 col-sm-5 col-md-3 col-lg-3">
                                    <div class="info-block block-info clearfix">
                                        <div class="square-box pull-left">
                                        </div>
                                        <div data-toggle="buttons" class="btn-group bizmoduleselect">
                                            <label class="btn btn-default <?php if(!empty($cv) && $cv->haveComp($sous_comp['nom_sous_comp'])) echo 'active'; ?>">
                                                <div class="bizcontent">
                                                    <input type="checkbox" name="id_sous_comp[]" autocomplete="off"
                                                           value="<?php echo $sous_comp['id_sous_comp']; ?>" <?php if(!empty($cv) && $cv->haveComp($sous_comp['nom_sous_comp'])) echo 'checked'; ?>>
                                                    <span class="glyphicon glyphicon-ok glyphicon-lg"></span>
                                                    <h5><?php echo $sous_comp['nom_sous_comp'] ?></h5>

                                                        <div class="row">
                                                            <div class="input-group number-spinner">
                                                            <span class="input-group-btn data-dwn">
                                                                <button class="btn btn-default btn-info" data-dir="dwn"><span class="glyphicon glyphicon-minus"></span></button>
                                                            </span>
                                                                <input type="text" name="value[<?php echo $sous_comp['id_sous_comp']; ?>]" class="form-control text-center" value="<?php


                                                                if(!empty($cv)) {
                                                                    $find = false;
                                                                    $comps = $cv->getComp();

                                                                        foreach($comps as $comp) {

                                                                        if($sous_comp['nom_sous_comp'] == $comp['nom_sous_comp']) {
                                                                            $find = true;
                                                                            echo $comp['value'];
                                                                            break;
                                                                        }

                                                                        }
                                                                        if(!$find) echo 0;

                                                                } else {
                                                                    echo 0;
                                                                }





                                                                ?>" min="0" max="100">
                                                                <span class="input-group-btn data-up">
                                                                <button class="btn btn-default btn-info" data-dir="up"><span class="glyphicon glyphicon-plus"></span></button>
                                                            </span>
                                                            </div>
                                                        </div>

                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <?php
                }}}
                ?>

            </div>
        </div>
            <div class="panel-footer">
                <button class="btn btn-sm btn-danger" type="reset" data-toggle="modal" data-original-title="Réinitialiser feuille">
                    <i class="glyphicon glyphicon-remove"></i>
                </button>
            <span class="pull-right">
                <button class="btn btn-sm btn-success" type="submit" data-toggle="tooltip" data-original-title="Editer l'utilisateur">
                    <i class="glyphicon glyphicon-ok"></i>
                </button>
            </div>
            </div>
        </form>
    </div>

</div>



