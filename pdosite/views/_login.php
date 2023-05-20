<?php

    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
        header("location: index.php");
    }

    if(isset($_POST["login"])){

        $email = $password = "";
        $email_err = $password_err = "";
    

        if(empty(trim($_POST["email"]))){
            $email_err = "Email Hesabını Giriniz";
        }else{
            $email = $_POST["email"];
        }

        if(empty(trim($_POST["password"]))){
            $password_err = "Şifrenizi Giriniz";
        }else{
            $password = $_POST["password"];
        }

        if(empty($email_err) && empty($password_err)){
            $loggin = new kayit();
            $loggin->getUser($email,$password);
            if($loggin){
                header('location: index.php');
            }else{
                header('location: https//youtube.com');
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
                    <div class="form-outline mb-4">
                        <input type="email" id="email" name="email" class="form-control" />
                        <label class="form-label" for="email">Email address</label>
                    </div>

                    <div class="form-outline mb-4">
                        <input type="password" id="password" name="password" class="form-control" />
                        <label class="form-label" for="password">Password</label>
                    </div>

                    <button type="submit" name="login" class="btn btn-primary btn-block mb-4">Giriş</button>

                    <div class="text-center">
                        <p>Not a member? <a href="#!">Register</a></p>
                        <p>or sign up with:</p>
                        <button type="button" class="btn btn-link btn-floating mx-1">
                            <i class="fab fa-facebook-f"></i>
                        </button>

                        <button type="button" class="btn btn-link btn-floating mx-1">
                            <i class="fab fa-google"></i>
                        </button>

                        <button type="button" class="btn btn-link btn-floating mx-1">
                            <i class="fab fa-twitter"></i>
                        </button>

                        <button type="button" class="btn btn-link btn-floating mx-1">
                            <i class="fab fa-github"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
        
        <div class="col-4"></div>
    </div>
</div>