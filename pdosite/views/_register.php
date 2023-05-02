<?php
    if(isset($_POST["submit"])){
        
        $name = $surname = $password = $phone = $email = $brithday = $gender = ""; 
        $name_err = $surname_err = $password_err = $phone_err = $email_err = $brithday_err = $gender_err = "";
        
        $input_name = $_POST["name"];
        if(empty(trim($input_name))){
            $name_err = "İsim Alanını Doldurunuz";
        }elseif(!preg_match( "/^[\w-\.]+@([\w-]+\.)+[\w-]{0,3}$/",$_POST['name'])){
            $name_err = "Özel Karakterler Kullanılmaz";
        }else{
            $name = $input_name;
        }

        $input_surname = $_POST["surname"];
        if(empty(trim($_POST["surname"]))){
            $surname_err = "Soyisim Alanını Doldurunuz";
        }elseif(!preg_match( "/^[\w-\.]+@([\w-]+\.)+[\w-]{0,3}$/",$_POST['name'])){
            $surname_err = "Soyisim'de özel Karakter Kullanılmaz";
        }else {
            $surname = $input_surname;
        }

        $input_birthday = $_POST["birthday"];
        if(empty(trim($_POST["birthday"]))){
            $brithday_err = "Doğum Tarihinizi Giriniz";
        }elseif(strlen($_POST["birthday"]) < 10 ){
            $brithday_err = "Doğum Tarihinizi Eksik veya Hatalı Girdiniz";
        }elseif(strlen($_POST["birthday"]) > 10){
            $brithday_err = "Doğum Tarihinizi Hatalı Girdiniz";
        }else{
            $brithday = $input_birthday;
        }

        $input_phone = $_POST["phone"];
        if(empty(trim($_POST["phone"]))){
            $phone_err = "Telefon Numaranızı Giriniz";
        }elseif(strlen($_POST["phone"]) > 10){
            $phone_err = "Numaranızı Başında +90 Olmadan 10 Karakter Olarak Giriniz";
        }else{
            $phone = $input_phone;
        }

        $input_email = $_POST["email"];
        if(empty(trim($_POST["email"]))){
            $email_err = "Email Bilginizi Giriniz";
        }elseif(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
            $email_err = "Özel Karakterler Kullanılmaz";
        }else{
            $email = $input_email;
        }

        $input_password = $_POST["password"];
        if(empty(trim($_POST["password"]))){
            $password_err = "Şifre Girmediniz";
        }elseif(strlen($_POST["password"]) < 6){
            $password_err = "Şifreniz 6 Karakterden Az oluşamaz";
        }else{
            $password = $input_password;
        }

        $input_password2 = $_POST["password_verfiy"];
        if(empty(trim($_POST["password"]))){
            $password_err = "Şifre Doğrulamanızı Yapmadınız";
        }else{
            $password2 = $_POST["password_verfiy"];
            if(empty($password_err) && ($password != $password2)){
                $password_err = "Şifreler Eşleşmiyor";
            }
        }

        $register = new kayıt();

        if($register->addUser($name,$surname,$brithday,$gender=1,$email,$phone,$password)){
            header('location: index.php');
        }
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
                                    <form method="POST">

                                        <div class="row">
                                            <div class="col-md-6 mb-4">

                                                <div class="form-outline">
                                                    <label class="form-label" for="name">İsim</label>
                                                    <input type="text" id="name" class="form-control form-control-lg <?php echo (!empty($name_err)) ? 'is-invalid':'' ?>" />
                                                </div>

                                            </div>
                                            <div class="col-md-6 mb-4">

                                                <div class="form-outline">
                                                    <label class="form-label" for="surname">Soyisim</label>
                                                    <input type="text" id="surname" class="form-control form-control-lg <?php echo (!empty($surname_err)) ? 'is-invalid':'' ?>"/>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 mb-4 d-flex align-items-center">

                                                <div class="form-outline datepicker w-100">
                                                    <label for="brithday" class="form-label">Doğum Tarihi</label>
                                                    <input type="text" id="brithday" class="form-control form-control-lg <?php echo (!empty($birthday_err)) ? 'is-invalid':'' ?>"/>
                                                </div>

                                            </div>
                                            <div class="col-md-6 mb-4">

                                                <h6 class="mb-2 pb-1">Cinsiyet: </h6>

                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="gender" value="1" checked />
                                                    <label class="form-check-label" for="gender">Kadın</label>
                                                </div>

                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="gender" value="2" />
                                                    <label class="form-check-label" for="gender">Erkek</label>
                                                </div>

                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="gender" value="3" />
                                                    <label class="form-check-label" for="gender">Gay</label>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 mb-4 pb-2">

                                                <label class="form-label" for="email">Email</label>
                                                <div class="form-outline">
                                                    <input type="email" id="email" class="form-control form-control-lg <?php echo (!empty($email_err)) ? 'is-invalid':'' ?>" />
                                                </div>

                                            </div>
                                            <div class="col-md-6 mb-4 pb-2">

                                                <div class="form-outline">
                                                    <label class="form-label" for="phone">Telefon Numarası</label>
                                                    <input type="tel" id="phone" class="form-control form-control-lg <?php echo (!empty($phone_err)) ? 'is-invalid':'' ?>" />
                                                </div>

                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 mb-4 pb-2">
                                                <label class="form-label" for="password">Şifre</label>
                                                    <div class="form-outline">
                                                        <input type="password" id="password" class="form-control form-control-lg <?php echo (!empty($password_err)) ? 'is-invalid':'' ?>" />
                                                    </div>
                                            </div>
                                            <div class="col-md-6 mb-4 pb-2">
                                                <label class="form-label" for="password_verify">Şifre Tekrar</label>
                                                    <div class="form-outline">
                                                        <input type="password" id="password_verify" class="form-control form-control-lg <?php echo (!empty($password2_err)) ? 'is-invalid':'' ?>" />
                                                    </div>
                                            </div>
                                        </div>

                                        <div class="mt-4 pt-2">
                                            <input class="btn btn-primary btn-lg" type="submit" value="Submit" />
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