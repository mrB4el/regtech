<?php
    class Profile {
        public $id;
        public $login;
        public $password;
        public $registation_date;

        function registrate() {}
        function login() {
            $this->login = "meh";
        }
        function logout() {}
    }
?>