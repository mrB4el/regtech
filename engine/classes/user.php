<?php
    class User extends Profile {
        public function add() {

        }
        
        function migrate($profile) {
            $this->profile = $profile;
        }

        function thingsAddNew($mysql, $thingid) {
            $table = "things";
            $condition['id'] =  $thingid;
            $new['owner'] = $this->profile->id;
            $mysql->updateData($table, $condition, $new);
        }

        function thingsShowList($mysql) {
            $conditions["owner"] = $this->profile->id;
            $result = $mysql->recieveStrictData("things", $conditions);
            return $result;
        }
    }
?>