<?php  require "baglanti.php" ?>
<?php

    class kayıt extends db{
        public function addUser($name,$surname,$password,$phone,$email,$birthday,$gender){
            $sql = "INSERT INTO users (name,surname,password,phone,email,brithday,gender) VALUES (:name,:surname,:password,:phone,:email,:birthday,:gender)";
            $stmt = $this->baglan()->prepare($sql);
            return $stmt->execute([
                'name'=>$name,
                'surname'=>$surname,
                'password'=>$password,
                'phone'=>$phone,
                'email'=>$email,
                'brithday'=>$birthday,
                'gender'=>$gender,
            ]);
        }
    }













?>