<?php
    foreach($result as $film){
    echo '
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">'.$film["username"].'</h4>
                <p class="card-text">'.$film["comment"].'</p>
            </div>
        </div>
    </div>
    ';
}
