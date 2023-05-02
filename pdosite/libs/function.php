<?php

    class kayıt extends db{

        public function addUser($name,$surname,$password,$phone,$email,$brithday){
            $sql = "INSERT INTO users (name,surname,password,phone,email,brithday) VALUES (:name,:surname,:password,:phone,:email,:brithday)";
            $stmt = $this->baglan()->prepare($sql);
            return $stmt->execute([
                'name'=>$name,
                'surname'=>$surname,
                'password'=>$password,
                'phone'=>$phone,
                'email'=>$email,
                'brithday'=>$brithday,
            ]);
        }
    }













?>