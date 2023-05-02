<?php
    include "views/_headers.php";
?>

<?php

    if(isset($_POST["submit"])){

        $title = $description = $image = "";
        $title_err = $description_err = $image_err = "";

        if(empty(trim($_POST["title"]))){
            $title_err = "Film Başlığı Giriniz";
        }else{
            $title = $_POST["title"];
        }

        if(empty(trim($_POST["description"]))){
            $description_err = "Film Açıklamasını Yazınız";
        }else{
            $description = $_POST["description"];
        }

        if(empty(trim($_POST["image"]))){
            $image_err = "Film Resimini Giriniz";
        }else{
            $image = $_POST["image"];
        }

        $ekle = new kayit();

        // if($ekle->addFilms($title,$description,$image)){
        //     header('location: register.php');
        // }

        if(empty($title_err) && empty($description_err) && empty($image_err)){
            $Addfilm = new kayit();
            $Addfilm->addFilms($title,$description,$image);
            if($Addfilm){
                echo '<div class="alert alert-primary" role="alert">film eklendi</div>';
            }else{
                echo "bir hata oluştu";
            }
        }

    }


?>




<div class="container-fluid">
    <div class="row">
        <div class="col-4"></div>

            <div class="col-4">
                <div class="container my-3">
                    <form method="POST">
                        <div class="form-control pb-4">
                            <label class="form-label my-3" for="title">Film Adı</label>
                            <input type="title" id="title" name="title" class="form-control" />

                            <label class="form-label my-3" for="description">Film Açıklaması</label>
                            <textarea type="text" id="description" name="description" class="form-control"></textarea>
                           
                            <label class="form-label my-3" for="image">Film Resmi</label>
                            <input type="text" id="image" name="image" class="form-control" />                       
                        </div>

                        <button type="submit" name="submit" class="btn btn-primary btn-block mt-4">Giriş</button>

                        </div>
                    </form>
                </div>
            </div>
        
        <div class="col-4"></div>
    </div>
</div>



<?php include "views/_footer.php"; ?>