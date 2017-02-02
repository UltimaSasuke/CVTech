<?php
/**
 * Created by PhpStorm.
 * User: Diego
 * Date: 11/01/2017
 * Time: 19:24
 */
?>
</tbody>
</table>







<nav aria-label="Page navigation example">
    <ul class="pagination">
        <li class="page-item">
            <a class="page-link" href="a_droit_membres.php?pagedroit=<?php echo $pageActuelle - 1; ?>" aria-label="Previous" >
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Précedent</span>
            </a>
        </li>
        <?php

        for($i = 1; $i <= $nbpage; $i = $i +1) {

            ?>
            <li class="page-item <?php if($_GET['page'] == $i || (!isset($_GET['page']) && $i == 1 )) echo " active"; ?>"><a class="page-link" href="a_droit_membres.php?pagedroit=<?php echo $i ?>"><?php echo $i ?></a></li>
            <?php
        }


        ?>

<li class="page-item">
    <a class="page-link" href="a_droit_membres.php?pagedroit=<?php echo $pageActuelle + 1; ?>" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
        <span class="sr-only">Suivant</span>
    </a>
</li>
</ul>
</nav>



<button class="btn btn-sm btn-success center-block" type="button" data-toggle="modal" data-target="#addComp" data-original-title="Ajouter competences">
    Ajouter type d'utilisateur
</button>

<div class="modal fade" id="addComp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Nouveau type d'utilisateur</h4>
            </div>
            <form id="evoyer_mail" action="ajouter_type_user.php" method="post">
                <div class="modal-body">

                    <div>
                        <label>Nom</label>
                        <input type="text" placeholder="Nom" class="form-control" name="nom">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Quitter</button>
                    <button type="submit" class="btn btn-primary" >Ajouter</button>

                </div>
            </form>
        </div>
    </div>
</div>



</div>