<?php
	define('HOSTNAME', '151.106.124.151');
	// define('USERNAME', 'u693904119_itbinarystar');
	// define('PASSWORD', '6Y[bph/9u');
	// define('DATABASE', 'u693904119_itbinarystar');

	define('USERNAME', 'u693904119_dev_itbstar');
	define('PASSWORD', 'zH5@JsNUx=');
	define('DATABASE', 'u693904119_dev_itbstar');

	

	Class Database {
		public $conn;
		public function connect() {
			$this->conn = new mysqli(HOSTNAME, USERNAME, PASSWORD, DATABASE);
			if($this->conn->connect_error)
				die($this->conn->connect_error);
			return true;
		}
	}

	date_default_timezone_set("Asia/Bangkok");
?>