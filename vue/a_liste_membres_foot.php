<?php
/**
 * Created by PhpStorm.
 * User: d14011479
 * Date: 11/01/17
 * Time: 11:47
 */

?>


</tbody>
</table>






<nav aria-label="Page navigation example">
    <ul class="pagination">
        <li class="page-item">
            <a class="page-link" href="a_liste_membres.php?page=<?php echo $pageActuelle - 1; ?>" aria-label="Previous" >
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Précedent</span>
            </a>
        </li>
        <?php

        for($i = 1; $i <= $nbpage; $i = $i +1) {

            ?>
            <li class="page-item <?php if($_GET['page'] == $i || (!isset($_GET['page']) && $i == 1 )) echo " active"; ?>"><a class="page-link" href="a_liste_membres.php?page=<?php echo $i ?>"><?php echo $i ?></a></li>
            <?php
        }


        ?>

        <li class="page-item">
            <a class="page-link" href="a_liste_membres.php?page=<?php echo $pageActuelle + 1; ?>" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
                <span class="sr-only">Suivant</span>
            </a>
        </li>
    </ul>
</nav>
</div>
