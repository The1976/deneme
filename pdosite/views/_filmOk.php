<?php
    foreach ($results as $film){
        echo '
            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="img/'.$film["imageUrl"].'" class="img-fluid rounded-start p-2" style="height: 650px;">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <a href="#">'.$film["title"].'</a>
                            <p class="card-text">'.$film["description"].'</p>
                        </div>
                    </div>
                </div>
            </div>
        ';
    }
?>