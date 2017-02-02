<?php
/**
 * Created by PhpStorm.
 * User: Diego
 * Date: 22/01/2017
 * Time: 21:31
 */

?>

<nav aria-label="Page navigation example" class="center-block">
    <ul class="pagination">
        <li class="page-item">
            <a class="page-link" href="recherche_cv.php?champ=<?php echo $_GET['champ']; ?>&type=<?php echo $_GET['type']; ?>&page=<?php echo $pageActuelle - 1; ?>" aria-label="Previous" >
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Précedent</span>
            </a>
        </li>
        <?php

        for($i = 1; $i <= $nbpage; $i = $i +1) {

            ?>
            <li class="page-item <?php if($_GET['page'] == $i || (!isset($_GET['page']) && $i == 1 )) echo " active"; ?>"><a class="page-link" href="recherche_cv.php?champ=<?php echo $_GET['champ']; ?>&type=<?php echo $_GET['type']; ?>&page=<?php echo $i ?>"><?php echo $i ?></a></li>
            <?php
        }


        ?>

        <li class="page-item">
            <a class="page-link" href="recherche_cv.php?champ=<?php echo $_GET['champ']; ?>&type=<?php echo $_GET['type']; ?>&page=<?php echo $pageActuelle + 1; ?>" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
                <span class="sr-only">Suivant</span>
            </a>
        </li>
    </ul>
</nav>

