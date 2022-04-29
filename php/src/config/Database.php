<?php 
    
    class Database {
        private $host = "db";
        private $database_name = "MYSQL_DATABASE";
        private $username = "MYSQL_USER";
        private $password = "MYSQL_PASSWORD";
        public $conn;
        public function getConnection(){
            $this->conn = null;
            try{
                $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->database_name, $this->username, $this->password);
                $this->conn->exec("set names utf8");
            }catch(PDOException $exception){
                echo "Database could not be connected: " . $exception->getMessage();
            }
            return $this->conn;
        }
    }  
?>