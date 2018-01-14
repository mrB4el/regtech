<?php
   	
    class API
    {
        static function issetParam( $name ) {
            return isset($_GET[$name]) || isset($_POST[$name]);
        }
        static function getParam( $name, $defaultValue = "" ) {
            return isset($_POST[$name]) ? $_POST[$name] : (isset($_GET[$name]) ? $_GET[$name] : $defaultValue);
        }      

		function get_time() {
            $today = date("Y-m-d H:i:s");
			$plain_data = array('time' => $today);
			$json_data = $json->send_data($plain_data);
			
			return $json_data;
		}
	}
?>