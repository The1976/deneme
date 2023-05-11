<?php
    foreach($resultscat as $film){
        echo '
            <ul class="list-group list-group-flush border rounded mb-1">
            <li class="list-group-item"><a href="index.php" class="text-decoration-none link-secondary">'.$film["turu"].'</a></li>
            </ul>
            ';    
    }   
?>