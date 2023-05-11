<?php include "views/_headers.php"; ?>
<?php include "views/_baslik.php"; ?>

<div class="container my-3">
    <?php 
    
    $filmGetir = new search(); 
    $results = $filmGetir->getFilms();
    ?>

    <?php if($results): ?>
        <?php include "views/_filmOk.php"; ?>
    <?php else:?>
        <?php include "views/_filmyok.php"; ?>
    <?php endif; ?>

</div>

<?php include "views/_footer.php"; ?>