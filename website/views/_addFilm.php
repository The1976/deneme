<?php
    $input_title = trim($_POST["title"]);
    if(empty($input_title)){
        $title_err = "Başlık Boş Bırakılmaz";
    }elseif (strlen($input_title) > 50){
        $title_err = "Başlık max 50 Karakter Olmalıdır";
    }else {
        $title = control_input($input_title);
    }

    $input_description = trim($_POST["description"]);
    if(empty($input_description)){
        $description_err = "Açıklama Alanını Doldurunuz";
    }elseif(strlen($input_description) < 20){
        $description_err = "Açıklama Alanı 20 Karakterden Az Olamaz";
    }else {
        $description = control_input($input_description);
    }

    $input_imageUrl = trim($_POST["imageUrl"]);
    if(empty($input_imageUrl)){
        $imageUrl_err = "Resim Bilgisi Giriniz";
    }else{
        $imageUrl = control_input($input_imageUrl);
    }

    $input_url = trim($_POST["url"]);
    if(empty($input_url)){
        $url_err = "url Bilgisi Giriniz";
    }else{
        $url = control_input($input_url);
    }


    if(empty($title_err) && empty($description_err) && empty($imageUrl_err) && empty($url_err)){
        if(createBlog($title,$description,$imageUrl,$url)){

            header('location: createBlog.php');
        }else{
            echo "hata :";
        }
    }



?>