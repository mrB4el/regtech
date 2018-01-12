<?php
    class Thingobject {
        public $id;
        public $name;
        public $brand;
        public $serialnumber;
        public $registration_date;
        public $guarantee_period;
        public $description;
        public $owner;
        public $photo;
    }
    class Thing {
        public $thing; 
        
        public function __construct() {
            $this->thing = new hingobject();
        }

        public function add() {

        }

        public function remove() {

        }

        public function bought() {

        }

        public function guarantee_left() {

        }
    }
?>