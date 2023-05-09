<?php
    require_once "baglanti.php";

    class kayit extends Db{

        public function addUser($name,$surname,$password,$phone,$email,$brithday){
            $sql = "INSERT INTO users (name,surname,password,phone,email,brithday) VALUES (:name, :surname, :password, :phone, :email, :brithday)";
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

        public function getUser($email,$password){
            $sql = "SELECT * FROM users WHERE email=:email AND password=:password";
            $stmt = $this->baglan()->prepare($sql);
            $stmt->bindParam(':email',$email);
            $stmt->bindParam(':password',$password);
            $stmt->execute();
            if($stmt->rowCount() > 0){
                return $stmt;
            }else{
                echo "hata: ";
            }
            

        }

        public function addFilms($title,$description,$image){
            $sql = "INSERT INTO filmler(title,description,imageUrl) VALUES (:title,:description,:imageUrl)";
            $stmt = $this->baglan()->prepare($sql);
            return $stmt->execute([
                'title'=>$title,
                'description'=>$description,
                'imageUrl'=>$image,
            ]);
        }

        public function getFilms(){
            $sql = "SELECT * FROM filmler";
            $stmt = $this->baglan()->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        }


    }

    class search extends Db{
        
        public function searchFilms($term) {
            $sql = "SELECT * FROM filmler WHERE title LIKE :term";
            $stmt = $this->baglan()->prepare($sql);
            $stmt->bindParam(':term', $term);
            $stmt->execute();
            $results = $stmt->fetchAll();
            return $results;
        }
    }
?>
