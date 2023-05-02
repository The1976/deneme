<?php

    class db {
        private $host = "localhost";
        private $username = "root";
        private $password = "";
        private $dbname = "films";

        protected function baglan(){
            try{
                $bilgi = "mysql:host=".$this->host.";dbname=".$this->dbname;
                $key = new PDO($bilgi, $this->username, $this->password);

                $key->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $key->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

                return $key;
            }catch(PDOException $e){
                echo "bağlantı hatası: ".$e->getMessage();
            }
        }

    }




?>