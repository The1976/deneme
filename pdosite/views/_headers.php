<?php
    include "views/_header.php";
    include "views/_navbar.php";
    include "libs/function.php";

    function cleanInput($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    session_start();
?>