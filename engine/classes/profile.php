<?php
    class ProfileObject {
        public $id;
        public $email;
        public $login;
        public $password;
        public $registration_date;
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
            $this->profile->id = $result["id"];
            $this->profile->email = $result["email"];
            $this->profile->registration_date = $result["registration_date"];
        }
        
        function logout() {}
    }
?>