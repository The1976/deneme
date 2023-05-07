<div class="card mb-3 m-3 p-2">
    <?php foreach ($search->searchFilm() as $item) : ?>
        <div class="row g-0">
            <div class="col-md-4">
                <img src="img/<?php echo $item->imageUrl ?>" class="img-fluid rounded-start">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $item->title ?></h5>
                    <p class="card-text"><?php echo $item->description ?></p>
                    <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>