<?php $result = getBlog(); while($item = mysqli_fetch_assoc($result)): ?>

  <div class="card mb-3">
    <div class="row">
      <div class="col-3">
        <img src="img/<?php echo $item["imageUrl"] ?>" class="img-fluid p-1">
      </div>
      <div class="col-9">
        <div class="card-body">
          <h5 class="card-title"><a href="/<?php echo $item["url"]?>.php"><?php echo $item["title"] ?></a>
          <hr>
          <p class="card-text"><?php echo $item["description"] ?></p>
      </div>
      </div>
    </div>
  </div>
<?php endwhile; ?>