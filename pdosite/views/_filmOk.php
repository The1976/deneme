<div class="card mb-3">
    <?php foreach($filmGetir->getFilms() as $item) :?>
        <div class="row g-0">
            <div class="col-md-4">
                <img src="img/<?php echo $item->imageUrl ?>" class="img-fluid rounded-start p-2" style="height: 650px;">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <a href="#"><?php echo $item->title ?></a>
                    <p class="card-text"><?php echo $item->description ?></p>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

</div>