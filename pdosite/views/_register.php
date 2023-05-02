<?php
    if(isset($_POST["submit"])){
        
        $name = $surname = $password = $phone = $email = $brithday = ""; 
        $name_err = $surname_err = $password_err = $phone_err = $email_err = $brithday_err = "";
        
        $input_name = $_POST["name"];
        if(empty(trim($input_name))){
            $name_err = "İsim Alanını Doldurunuz";
        }else{
            $name = $input_name;
        }

        $input_surname = $_POST["surname"];
        if(empty(trim($input_surname))){
            $surname_err = "Soyisim Alanını Doldurunuz";
        }else {
            $surname = $input_surname;
        }

        $input_brithday = $_POST["brithday"];
        if(empty(trim($input_brithday))){
            $brithday_err = "Doğum Tarihinizi Giriniz";
        }elseif(strlen($input_brithday) < 10 ){
            $brithday_err = "Doğum Tarihinizi Eksik veya Hatalı Girdiniz";
        }elseif(strlen($input_brithday) > 10){
            $brithday_err = "Doğum Tarihinizi Hatalı Girdiniz";
        }else{
            $brithday = $input_brithday;
        }

        $input_phone = $_POST["phone"];
        if(empty(trim($input_phone))){
            $phone_err = "Telefon Numaranızı Giriniz";
        }elseif(strlen($input_phone) > 10){
            $phone_err = "Numaranızı Başında +90 Olmadan 10 Karakter Olarak Giriniz";
        }else{
            $phone = $input_phone;
        }

        $input_email = $_POST["email"];
        if(empty(trim($input_email))){
            $email_err = "Email Bilginizi Giriniz";
        }elseif(!filter_var($input_email, FILTER_VALIDATE_EMAIL)){
            $email_err = "Özel Karakterler Kullanılmaz";
        }else{
            $email = $input_email;
        }

        $input_password = $_POST["password"];
        if(empty(trim($input_password))){
            $password_err = "Şifre Girmediniz";
        }elseif(strlen($input_password) < 6){
            $password_err = "Şifreniz 6 Karakterden Az oluşamaz";
        }else{
            $password = $input_password;
        }

        $input_password2 = $_POST["password_verify"];
        if(empty(trim($input_password2))){
            $password_err = "Şifre Doğrulamanızı Yapmadınız";
        }else{
            $password = $input_password2;
            if(empty($password_err) && ($password != $input_password2)){
                $password_err = "Şifreler Eşleşmiyor";
            }
        }



        if(empty($name_err) && empty($surname_err) && empty($password_err) && empty($phone_err) && empty($email_err) && empty($brithday_err)){
            $register = new Kayıt();

            $register->addUser($name,$surname,$password,$phone,$email,$brithday);
            header('location: index.php');
        }else{
            header('location: index.php');
        }
        // if($register->addUser($name,$surname,$brithday,$email,$phone,$password)){
        //     header('location: index.php');
        // }
    }



?>

<div class="container-fluid">
    <div class="row">
        <div class="col-1"></div>

        <div class="col-9">
            <section class="vh-100 gradient-custom">
                <div class="container py-5 h-100">
                    <div class="row justify-content-center align-items-center h-100">
                        <div class="col-12 col-lg-9 col-xl-7">
                            <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                                <div class="card-body p-4 p-md-5">
                                    <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Kayıt Formu</h3>
                                    <form action="register.php" method="POST">

                                        <div class="row">
                                            <div class="col-md-6 mb-4">

                                                <div class="mb-3">
                                                    <label for="name">İsim</label>
                                                    <input type="text" id="name" name="name" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid':'' ?>" value="<?php echo $name?>" />
                                                    <span class="invalid-feedback"><?php echo $name_err ?></span>
                                                </div>

                                            </div>
                                            <div class="col-md-6 mb-4">

                                                <div class="mb-3">
                                                    <label for="surname">Soyisim</label>
                                                    <input type="text" id="surname" name="surname" class="form-control <?php echo (!empty($surname_err)) ? 'is-invalid':'' ?>" value="<?php echo $surname?>"/>
                                                    <span class="invalid-feedback"><?php echo $surname_err ?></span>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 mb-4 d-flex align-items-center">

                                                <div class="mb-3 datepicker w-100">
                                                    <label for="brithday">Doğum Tarihi</label>
                                                    <input type="text" id="brithday" name="brithday" class="form-control <?php echo (!empty($brithday_err)) ? 'is-invalid':'' ?>" value="<?php echo $brithday?>"/>
                                                    <span class="invalid-feedback"><?php echo $brithday_err ?></span>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 mb-4 pb-2">

                                                <label for="email">Email</label>
                                                <div class="mb-3">
                                                    <input type="email" id="email" name="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid':'' ?>" value="<?php echo $email?>" />
                                                    <span class="invalid-feedback"><?php echo $email_err ?></span>
                                                </div>

                                            </div>
                                            <div class="col-md-6 mb-4 pb-2">

                                                <div class="mb-3">
                                                    <label for="phone">Telefon Numarası</label>
                                                    <input type="tel" id="phone" name="phone" class="form-control <?php echo (!empty($phone_err)) ? 'is-invalid':'' ?>" value="<?php echo $phone?>" />
                                                    <span class="invalid-feedback"><?php echo $phone_err ?></span>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 mb-4 pb-2">
                                                <label for="password">Şifre</label>
                                                    <div class="mb-3">
                                                        <input type="password" id="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid':'' ?>" />
                                                        <span class="invalid-feedback"><?php echo $password_err ?></span>
                                                    </div>
                                            </div>
                                            <div class="col-md-6 mb-4 pb-2">
                                                <label for="password_verify">Şifre Tekrar</label>
                                                    <div class="mb-3">
                                                        <input type="password" id="password_verify" name="password_verify" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid':'' ?>" />
                                                        <span class="invalid-feedback"><?php echo $password_err ?></span>
                                                    </div>
                                            </div>
                                        </div>

                                        <div class="mt-4 pt-2">
                                            <button type="submit" name="submit" class="btn btn-primary"> Kayıt Ol</button>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>  
        </div>

        <div class="col-2"></div>
    </div>
</div>