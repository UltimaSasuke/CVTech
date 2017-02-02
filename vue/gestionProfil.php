<?php
/**
 * Created by PhpStorm.
 * User: c15003239
 * Date: 17/01/17
 * Time: 09:39
 */
?>
<div class="container">
    <h1 class="well">Mise à jour de vos informations <?php echo $_SESSION['user']->getPrenom()?></h1>
    <div class="col-lg-12 well">
        <div class="row">
            <form id="inscription" action="gestionProfil.php?modif=sent" method="post">
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label>Adresse mail</label>
                            <input type="email" placeholder="Modifiez votre mail" class="form-control" name="email">
                        </div>
                        <div class="col-sm-6 form-group">
                            <label>Mot de passe</label>
                            <input type="password" placeholder="Nouveau mot de passe" class="form-control" name="password">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label>Nom</label>
                            <input type="text" placeholder="Changez votre nom" class="form-control" name="nom">
                        </div>
                        <div class="col-sm-6 form-group">
                            <label>Prenom</label>
                            <input type="text" placeholder="Changez votre prenom" class="form-control" name="prenom">
                        </div>
                    <input type="submit" class="btn btn-lg btn-success center-block" name="Mettre à jour vos informations" onclick="notif('Infos actualisées',top-right)"/>
                    </div>
            </form>
        </div>
    </div>
</div>