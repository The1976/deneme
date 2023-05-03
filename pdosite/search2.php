<?php include "views/_headers.php"; ?>
<?php include "views/_baslik.php"; ?>

<?php 
    if(isset($_GET["q"])){

        $term = "";
        $term_err = "";

        if(empty($_GET["q"])){
            $term_err = "Aranacak Film Adını Giriniz";
        }else{
            $term = $_GET["q"];
        }

        if(empty($term_err)){
            $sonuc = new kayit();
            $sonuc->searchFilm($term);
            if($sonuc){
                return $sonuc;
            }else{
                echo "hata";
            }
        }

    }

?>

<?php if($sonuc):?>
    <div class="container my3">
        <div class="card mb-3">
            <div class="row g-0">
                <?php foreach($sorgu = $sonuc() as $item):?>
                    <div class="col-md-4">
                        <img src="img/<?php echo $item->imageUrl ?>" class="img-fluid rounded-start p-2" style="height: 650px;">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <a href="#"><?php echo $item->title ?></a>
                            <p class="card-text"><?php echo $item->description ?></p>
                        </div>
                    </div>
                <?php endforeach;?>
            </div>
        </div>
    </div>
<?php else:?>
    <div class="alert alert-warning">
        Film yok
    </div>
<?php endif;?>