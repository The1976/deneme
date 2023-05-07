<?php include "views/_headers.php"; ?>


<div class="container">
    <?php 
        $term = "";
        $search = new kayit(); 
        $term = $search->searchFilm($_POST["searchTerm"]);
    ?>

    <?php if($search->searchFilm($term)):?>
        <?php include "views/_searchOk.php" ?>
    <?php else: ?>
        <?php include "views/_filmyok.php"; ?>
    <?php endif; ?>
</div>

<?php include "views/_footer.php"; ?>