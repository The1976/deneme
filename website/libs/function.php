<?php

function getCategory(){
    include "baglanti.php";

    $query = "SELECT * FROM categories";
    $result = mysqli_query($baglan, $query);

    mysqli_close($baglan);

    return $result;
}

function getblog(){
    include "baglanti.php";

    $query = "SELECT * FROM blogs";
    $result = mysqli_query($baglan, $query);

    mysqli_close($baglan);

    return $result;
}

function control_input($data){
    $data = htmlspecialchars($data);
    $data = stripslashes($data);
    return $data;
}

function createBlog(string $title, string $description, string $imageUrl, string $url){
    include "baglanti.php";

    $query = "INSERT INTO blogs (title, description, imageUrl, url) VALUES (?,?,?,?)";
    $result = mysqli_prepare($baglan, $query);

    mysqli_stmt_bind_param($result, 'ssss', $title,$description,$imageUrl,$url);
    mysqli_stmt_execute($result);
    mysqli_stmt_close($result);
    return $result;
}



?>
