<?php
/**
 * Created by PhpStorm.
 * User: Diego
 * Date: 22/01/2017
 * Time: 14:11
 */

?>


<div class="container">
                    <tr>

                    <form class="input-append" role="form" method="post"
                          action="sauvegarderComp.php?compId=<?php echo $comp['id'] ?>">
                    <th><?php echo $comp['nom']; ?></th>
<th><input type="text" name="sous_comp" value="<?php

    if(!empty($comp['sous_comp'])) {
        foreach ($comp['sous_comp'] as $sous_comp)
            echo $sous_comp . ',';

    }
    ?>" data-role="tagsinput"/></th>
<th><button type="submit" class="btn btn-primary ">Sauvegarder</button></th>
<th><a type="button" href="supp_comp.php?id=<?php echo $comp['id'] ?>" class="btn btn-danger ">Supprimer</a></th>

</form>
</tr>
</div>