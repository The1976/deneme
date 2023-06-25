<?php
    require_once "baglanti.php";

    class kayit extends Db{

        public function addUser($name,$surname,$password,$phone,$email,$brithday,$token){
            $sql = "INSERT INTO users (name,surname,password,phone,email,brithday,xsrf_token) VALUES (:name, :surname, :password, :phone, :email, :brithday, :token)";
            $stmt = $this->baglan()->prepare($sql);
            return $stmt->execute([
                'name'=>$name,
                'surname'=>$surname,
                'password'=>$password,
                'phone'=>$phone,
                'email'=>$email,
                'brithday'=>$brithday,
                'token'=>$token,
            ]);
        }

        public function getUser($email,$password){
            $sql = "SELECT * FROM users WHERE email=:email AND password=:password";
            $stmt = $this->baglan()->prepare($sql);
            $stmt->bindParam(':email',$email);
            $stmt->bindParam(':password',$password);
            $stmt->execute();
            if($stmt->rowCount() > 0){
                $_SESSION["loggedin"] = true;
                $_SESSION["username"] = true;
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

        
        public function getFilms(){
            $sql = "SELECT * FROM filmler";
            $stmt = $this->baglan()->prepare($sql);
            $stmt->execute();
            $results = $stmt->fetchAll();
            return $results;
        }

        public function getCategory(){
            $sql = "SELECT * FROM categories";
            $stmt = $this->baglan()->prepare($sql);
            $stmt->execute();
            $results = $stmt->fetchAll();
            return $results;
        }

        public function selectFilm($term) {
            $sql = "SELECT * FROM filmler WHERE id = :id";
            $stmt = $this->baglan()->prepare($sql);
            $stmt->bindValue(':id',$term, PDO::PARAM_INT);
            $stmt->execute();
            $results = $stmt->fetchAll();
            return $results;
        }

        public function addcomment($id,$username,$comment){
            $sql = "INSERT INTO comments(film_id,username,comment) VALUES (:id,:username,:comment)";
            $stmt = $this->baglan()->prepare($sql);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':comment', $comment);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
        }

        public function getComments($id){
            $sql = "SELECT * FROM comments WHERE film_id = :id";
            $stmt = $this->baglan()->prepare($sql);
            $stmt->bindValue(':id',$id, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result;
        }

    }

?>
