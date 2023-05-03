<?php include "views/_headers.php"; ?>
<?php include "views/_baslik.php"; ?>

<?php
    if(isset($_GET["q"]) && !empty($_GET["q"])){
        $term = $_GET["q"];
        $film = new kayit();
        $search_result = $film->searchFilm($term);

        if($search_result->rowCount() > 0){
            include "views/_searchOk.php";
        }else{
            include "views/_searchNot.php";
        }
    }else{
        echo "Aranacak Film Adını Giriniz.";
    }
?>