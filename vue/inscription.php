<?php
/**
 * Created by PhpStorm.
 * User: d14011479
 * Date: 11/01/17
 * Time: 08:45
 */
?>

<div class="container">
        <h1 class="well">Inscription</h1>
        <div class="col-lg-12 well">
            <div class="row">
                <form id="inscription" action="traiterinscription.php" method="post">
                    <div class="col-sm-12">

                        <div class="row">
                            <div class="col-sm-4 form-group">
                                <label>Adresse mail</label>
                                <input type="email" placeholder="Entrer une adresse mail..." class="form-control" name="email">
                            </div>
                            <div class="col-sm-4 form-group">
                                <label>Mot de passe</label>
                                <input type="password" placeholder="Entrer un mot de passe..." class="form-control" name="password">
                            </div>
                            <div class="col-sm-4 form-group">
                                <label>Répéter le mot de passe</label>
                                <input type="password" placeholder="Confirmer le mot de passe..." class="form-control" name="passwordverif">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 form-group">
                                <label>Nom</label>
                                <input type="text" placeholder="Entrer un nom..." class="form-control" name="nom">
                            </div>
                            <div class="col-sm-6 form-group">
                                <label>Prenom</label>
                                <input type="text" placeholder="Entrer un prenom..." class="form-control" name="prenom">
                            </div>
                        <input type="submit" class="btn btn-lg btn-info center-block" name="valider"/>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php