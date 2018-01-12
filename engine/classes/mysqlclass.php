<?php
    define ("DBHOST", "localhost"); 
    define ("DBNAME", "regtech");
    define ("DBUSER", "regtech");
    define ("DBPASS", "123456");

    class MySQLClass { 
        
        private $mysqli;

        public function __construct() {
            $this->mysqli = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);
            
            if (mysqli_connect_errno()) {
                printf("Не удалось подключиться: %s\n", mysqli_connect_error());
                exit();
            }
        }

        public function register($login, $password, $email)
        {
            $uid = 0;
 
            $password = md5(md5($password));
            
            $email = mysqli_real_escape_string($this->mysqli, $email); 
            $login = mysqli_real_escape_string($this->mysqli, $login);
            $password = mysqli_real_escape_string($this->mysqli, $password);  
                            
            $sql = "INSERT into accounts (email, login, password) VALUES ('$email', '$login', '$password')";
            
            if($query = $this->mysqli->prepare($sql)){
                $query->execute();
            }else{
                var_dump($this->mysqli->error);
            }
        }
        
        public function check_login($username, $password)
        {
            $result = "0";

                      
            $username = mysqli_real_escape_string($this->mysqli, $username);
            $password = mysqli_real_escape_string($this->mysqli, $password);
              
            $sql = "SELECT id FROM users WHERE username = '$username' AND password = '$password'";
            
            if($query = $this->mysqli->prepare($sql)) {
                $query->execute();
                $res = $query->get_result();
                $row = $res->fetch_assoc();
                
                $result = $row["id"];
            }
            else {
                var_dump($this->mysqli->error);
            }
            return $result;
        }
        function get_uid($username)
        {
                      
            $username = mysqli_real_escape_string($this->mysqli, $username);
              
            $sql = "SELECT id FROM users WHERE username = '$username'";
            
            if($query = $this->mysqli->prepare($sql)){
                $query->execute();
                $res = $query->get_result();
                $row = $res->fetch_assoc();
                
                $result = $row["id"];
            }else{
                var_dump($this->mysqli->error);
            }
            return $result;
        }
    }
?>