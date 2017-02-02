<?php
/**
 * Created by PhpStorm.
 * User: d14011479
 * Date: 11/01/17
 * Time: 12:03
 */

?>

<div class="container">
<form id="mdpchange" method="post" action="mdpoublie.php?mdp=changed&token=<?php echo $_GET['token']; ?>">
        <div class="form-group">
            <label class="sr-only">Nouveau mot de passe</label>
            <input type="password" class="form-control" placeholder="Mot de passe"
                   name="password" required>
            <label class="sr-only">Validation nouveau mot de passe</label>
            <input type="password" class="form-control" placeholder="Mot de passe"
                   name="passwordverif" required>
            <input type="submit" class="btn btn-lg btn-info center-block" name="valider"/>
        </div>
    </form>
</div>