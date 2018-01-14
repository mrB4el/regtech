<?php
    class Thingobject {
        public $id;
        public $name;
        public $brand;
        public $serialnumber;
        public $registration_date;
        public $sold_date;
        public $guarantee_period;
        public $description;
        public $owner;
        public $photo;
    }
    class Thing {
        public $thing; 
        
        public function __construct() {
            $this->thing = new Thingobject();
        }

        public function search($mysql) {
            $conditions["id"] = $this->thing->id;
            $result = $mysql->recieveStrictData("things", $conditions);
            
            $this->import($result);
        }
        public function import($result) {
            $this->thing->name = $result["name"];
            $this->thing->brand = $result["brand"];
            $this->thing->serialnumber = $result["serialnumber"];
            $this->thing->registration_date = $result["registration_date"];
            $this->thing->sold_date = $result["sold_date"];
            $this->thing->guarantee_period = $result["guarantee_period"];
            $this->thing->description = $result["description"];
            $this->thing->owner = $result["owner"];
            $this->thing->photo = $result["photo"];
        }
        public function add() {

        }

        public function remove() {

        }

        public function bought($mysql) {
            $table = "things";
            $condition['id'] =  $this->thing->id;
            $new['sold_date'] = $this->thing->sold_date;
            $mysql->updateData($table, $condition, $new);
        }
        
        public function connect() {

        }

        public function guarantee_left() {

        }
    }
?>