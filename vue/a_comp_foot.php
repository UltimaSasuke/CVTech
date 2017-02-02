<?php
/**
 * Created by PhpStorm.
 * User: Diego
 * Date: 22/01/2017
 * Time: 14:11
 */

?>


</tbody>
</table>


</div>


<button class="btn btn-sm btn-success center-block" type="button" data-toggle="modal" data-target="#addComp" data-original-title="Ajouter competences">
    Ajouter compétence
</button>

<div class="modal fade" id="addComp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Nouvelle catégorie</h4>
            </div>
            <form id="evoyer_mail" action="ajouter_comp.php" method="post">
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
