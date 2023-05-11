<div class="container">
    <div class="row">

        <div class="col-2">
            <?php
            $dbcat = new search();
            $resultscat = $dbcat->getCategory();
            ?>

            <?php if($resultscat):?>
                <?php include "views/_categories.php"; ?>
            <?php else: ?>
                <?php include "views/_filmyok.php"; ?>
            <?php endif; ?>
        </div>
        <div class="col-10">
            <?php
            $db = new search();
            $results = $db->getFilms();
            ?>

            <?php if ($results) : ?>
                <?php include "views/_filmOk.php"; ?>
            <?php else : ?>
                <?php include "views/_filmyok.php"; ?>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php include "views/_footer.php"; ?>