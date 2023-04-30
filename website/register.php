<?php

    require "libs/function.php";
    require "libs/baglanti.php";

    $username = $email = $password = $password2 = "";
    $username_err = $email_err = $password_err = $password2_err = "";

    if(isset($_POST["register"])){

        if(empty(trim($_POST["username"]))){
            $username_err = "Kullanıcı Adı Giriniz";
        }elseif(strlen(trim($_POST["username"])) < 5 or strlen(trim($_POST["username"])) > 15){
            $username_err = "Kullanıcı Adı min. 5 max. 15 Karakter Olmalıdır";
        }elseif (!preg_match('/^[A-Za-z][A-Za-z0-9]{5,31}$/', $_POST["username"])){
            $username_err = "Kullancı Adında Özel Karakterler Bulunamaz";
        }else{
            $sql = "SELECT id FROM users WHERE username = ?";

            if ($stmt = mysqli_prepare($baglan,$sql)){
                $param_username = trim($_POST["username"]);
                mysqli_stmt_bind_param($stmt, "s", $param_username);

                if(mysqli_stmt_execute($stmt)){
                    mysqli_stmt_store_result($stmt);
                    
                    if(mysqli_stmt_num_rows($stmt) == 1){
                        $username_err = "Kullanıcı Adı Daha önce alınmış";
                    }else {
                        $username = $_POST["username"];
                    }
                }else{
                    echo "Hata :";
                    echo mysqli_errno($baglan);

                }
            }
        }

        if(empty(trim($_POST["register"]))){
            $email_err = "E-Posta Adresinizi Giriniz";
        }elseif(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
            $email_err = "Hatalı E-posta girdiniz.";
        }else{
            $sql = "SELECT id FROM users WHERE email = ?";

            if ($stmt = mysqli_prepare($baglan,$sql)){
                $param_email = trim($_POST["email"]);
                mysqli_stmt_bind_param($stmt, "s", $param_email);

                if(mysqli_stmt_execute($stmt)){
                    mysqli_stmt_store_result($stmt);
                    
                    if(mysqli_stmt_num_rows($stmt) == 1){
                        $email_err = "E-posta adresi sistemde Kayıtlı";
                    }else {
                        $email = $_POST["email"];
                    }
                }else{
                    echo "Hata :";
                    echo mysqli_errno($baglan);

                }
            }
        }

        if(empty(trim($_POST["password"]))){
            $password_err ="Şifre Giriniz";
        }elseif(strlen($_POST["password"]) < 6 ){
            $password_err = "Şifre min. 6 Karakteden oluşmalıdır";
        }else{
            $password = $_POST["password"];
        }
        
        if(empty(trim($_POST["password2"]))){
            $password2_err = "Parolanızı onaylayınız";
        }else{
            $password2 = $_POST["password2"];
            if(empty($password_err) && ($password != $password2)){
                $password2_err = "Parolalar eşleşmedi";
            }
        }

        if(empty($username_err) && empty($email_err) && empty($password_err)){
            $sql = "INSERT INTO users (username, email, password) VALUES (?,?,?)";

            if($stmt = mysqli_prepare($baglan,$sql)){
                
                $param_username = $username;
                $param_email = $email;
                $param_password = password_hash($password, PASSWORD_DEFAULT);
                mysqli_stmt_bind_param($stmt, "sss", $param_username,$param_email,$param_password);

                if(mysqli_stmt_execute($stmt)){
                    header("location: login.php");
                }else{
                    echo "hata:";
                    echo mysqli_errno($baglan);

                }
            }
        }

    }


?>

<?php include "views/_header.php"; ?>
<?php include "views/_navbar.php"; ?>

<section class="vh-auto mt-3">
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-12 col-xl-11">
                <div class="card text-black" style="border-radius: 25px;">
                    <div class="card-body p-md-5">
                        <div class="row justify-content-center">
                            <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                                
                                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Kayıt Ol</p>

                                <form class="mx-1 mx-md-4" action="register.php" method="POST">

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <label class="form-label" for="username">Kullanıcı Adı</label>
                                            <input type="text" id="username" name="username" class="form-control" />
                                            <span class="invalid-feedback"><?php echo $username_err ?></span>
                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <label class="form-label" for="email">E-posta adresiniz</label>
                                            <input type="email" id="email" name="email" class="form-control" />
                                            <span class="invalid-feedback"><?php echo $email_err?></span>
                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <label class="form-label" for="password">Şifre</label>
                                            <input type="password" id="password" name="password" class="form-control" />
                                            <span class="invalid-feedback"><?php echo $password_err ?></span>
                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <label class="form-label" for="password2">Şifre onay</label>
                                            <input type="password" id="password2" name="password2" class="form-control" />
                                            <span class="invalid-feedback"><?php echo $password2_err ?></span>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                        <button type="submit" name="register" value="submit" class="btn btn-primary btn-lg">Kayıt Ol</button>
                                    </div>

                                </form>

                            </div>
                            <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                                <img src="img/3.jpeg" class="img-fluid" alt="Sample image">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?php include "views/_footer.php"; ?>