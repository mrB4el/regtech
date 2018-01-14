<?php
    class ProfileObject {
        public $id;
        public $email;
        public $login;
        public $password;
        public $registation_date;
    }

    class Profile {
        public $profile; 
        
        public function __construct() {
            $this->profile = new ProfileObject();
        }

        function registrate($mysql) {
            //toDo
            $mysql->register($this->profile->login, $this->profile->password, $this->profile->email);
        }
        
        function login($mysql) {
            $result = $mysql->login($this->profile->login, $this->profile->password);

            $this->profile->email = $result["email"];
        }
        
        function logout() {}

        function test() {
            echo "hello".$this->profile->login;
        }
    }
?>