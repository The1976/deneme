<?php include "views/_headers.php"; ?>

<div class="container">
    <div class="row">
        <?php
            $vt = new search();
            $search_term = $_POST['searchTerm'] ?? '';
            $results = $vt->searchFilms($search_term);
        ?>
            <?php if($results):?>
                <?php include "views/_searchOk.php";?>
            <?php else: ?>
                <?php include "views/_filmyok.php"; ?>
            <?php endif; ?>

    </div>
</div>

<?php include "views/_footer.php"; ?>