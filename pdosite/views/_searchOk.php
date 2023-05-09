<?php
    foreach ($results as $result){
        echo '
        <div class="card mb-3 m-3 p-2">
          <div class="row g-0">
              <div class="col-md-4">
              <img src="img/'.$result['imageUrl'].'" class="img-fluid rounded-start">
              </div>
              <div class="col-md-8">
              <div class="card-body">
                  <h5 class="card-title">'.$result['title'].'</h5>
                  <p class="card-text">'.$result['description'].'</p>
              </div>
              </div>
            </div>
          </div>
        ';
    }
?>