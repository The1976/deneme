<?php include "views/_headers.php"; ?>
<?php include "views/_baslik.php"; ?>
<?php include "libs/function.php"; ?>
<?php
    $getir = new kayit();
?>
<div class="container my-3">
    <div class="card mb-3">
        <?php if($getir->getFilms()): ?>
            <?php foreach($getir->getFilms() as $item): ?>
                <div class="row g-0">
                    <div class="col-md-4">
                    <img src="img/<?php echo $item->image ?>" class="img-fluid rounded-start p-2" style="height: 650px;">
                    </div>
                <div class="col-md-8">
                <div class="card-body">
                    <a href="#"><?php echo $item->title?></a>
                    <p class="card-text"><?php echo $item->description ?></p>
                <?php endforeach; ?>
        <?php else: ?>
                <?php include "views/_error.php"; ?>
        <?php endif; ?>
            </div>
            </div>
        </div>
    </div>
</div>

<?php include "views/_footer.php"; ?>