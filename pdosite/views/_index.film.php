<div class="container">
    <div class="row">
        <?php
        $db = new search();
        $results = $db->getFilms();
        ?>

        <?php if($results):?>
            <?php include "views/_filmOk.php"; ?>
        <?php else:?>
            <?php include "views/_filmyok.php"; ?>
        <?php endif;?>
    </div>
</div>

<?php include "views/_footer.php"; ?>