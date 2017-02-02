<?php
/**
 * Created by PhpStorm.
 * User: d14011479
 * Date: 10/01/17
 * Time: 16:12
 */

?>
    <nav class="navbar-default navbar-inverse" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">CV Tech</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand " href="index.php">CV Tech</a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li <?php if($_SERVER['REQUEST_URI'] == "gestion_cv.php") echo " class=\"active\"";?>><a href="gestion_cv.php">Ajouter CV</a></li>
                    <li <?php if($_SERVER['REQUEST_URI'] == "liste_cv.php") echo " class=\"active\"";?>><a href="liste_cv.php">Liste des CVs selectionné</a></li>



                </ul>
                <form class="navbar-form navbar-left" role="search" method="get" action="recherche_cv.php">
                    <div class="form-group">
                        <input type="text" name="champ" class="form-control" placeholder="Recherche cv...">
                    </div>
                    <select class="form-control" name="type">
                        <option value="keyword" <?php if(!empty($_GET['type']) && $_GET['type'] == "keyword") echo " selected";?>>Mots clés</option>
                        <option value="competences" <?php if(!empty($_GET['type']) && $_GET['type'] == "competences") echo " selected";?>>Sous-compétences</option>
                    </select>
                    <button type="submit" class="btn btn-default">Rechercher</button>
                </form>
                <ul class="nav navbar-nav navbar-right">

                    <?php


                    if(!empty($_SESSION)) {

                        ?><li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b><?php echo "Bonjour " . $_SESSION['user']->getPrenom();?></b> <span
                                    class="caret"></span></a>
                            <ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">                                <li>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <li>
                                                <a href="gestionProfil.php">Editer votre profil.</a></li>

                                <?php


                                if(!empty($_SESSION['user']) && $_SESSION['user']->haveAccess("panel_administration")) {


                                    ?>

                                    <li class="dropdown-submenu pull-left">
                                        <a tabindex="-1" href="#">Panneau d'administration</a>
                                        <ul class="dropdown-menu" role="menu">
                                            <?php

                                            if($_SESSION['user']->haveAccess('panel_administration')) {
                                                ?>
                                                <li><a href="a_comp.php">Gestion compétences </a></li>
                                                <li class="divider"></li>
                                                <?php
                                            }
                                            if($_SESSION['user']->haveAccess('valider_membre')) {
                                                ?>
                                                <li><a href="a_valider_membres.php">Valider membres </a></li>
                                                <li class="divider"></li>
                                                <?php
                                            }
                                            if($_SESSION['user']->haveAccess('supprimer_membre')) {
                                                ?>
                                                <li><a href="a_liste_membres.php">Liste membres </a></li>
                                                <li class="divider"></li>
                                                <?php
                                            }
                                            if($_SESSION['user']->haveAccess('modifier_droits')) {
                                                ?>
                                                <li><a href="a_droit_membres.php">Modifier droits </a></li>
                                                <li class="divider"></li>
                                                <?php
                                            }

                                            ?>
                                            <li><a href="a_log_membres.php">Logs connexion </a></li>
                                            <li class="divider"></li>
                                            <li><a href="http://hybrid-games.fr/phpmyadmin">phpmyadmin</a></li>
                                        </ul>
                                    </li>

                                    <?php

                                }

                                ?>
                                            <li class="divider"></li>
                                            <li>
                                                <a href="deconnexion.php" ><b>Se deconnecter</b></a>
                                            </li>
                                        </div>

                                    </div>
                                </li>
                            </ul>
                        </li>




                        <?php

                    }
                    else {


                        ?>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>Se connecter</b> <span
                                    class="caret"></span></a>
                            <ul id="login-dp" class="dropdown-menu">
                                <li>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <form class="form" role="form" method="post" action="connexion.php"
                                                  accept-charset="UTF-8" id="login-nav">
                                                <div class="form-group">
                                                    <label class="sr-only">Adresse mail</label>
                                                    <input type="email" class="form-control" placeholder="Adresse mail"
                                                           name="email" required>
                                                </div>
                                                <div class="form-group">
                                                    <label class="sr-only">Mot de passe</label>
                                                    <input type="password" class="form-control" placeholder="Mot de passe"
                                                           name="password" required>
                                                    <div class="help-block text-right"><a href="mdpoublie.php">Mot de passe oublié
                                                            ?</a></div>
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary btn-block">Se connecter</button>
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" name="remember" value="stay"> Rester connecter ?
                                                    </label>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="bottom text-center">
                                            Nouveau ? <a href="inscription.php"><b>S'inscrire</b></a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <?php


                    }
                    ?>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
    <br><br><br><br>

<?php
?>