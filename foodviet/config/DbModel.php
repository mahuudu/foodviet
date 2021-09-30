<?php 

	class DbModel{

			public $conn;

			public function __construct(){
				$hostname = "localhost";
				$username = "root";
				$pass = "";
				$database = "shopmvc";

				$this->conn = new mysqli($hostname,$username,$pass,$database);

				if (!$this->conn) {
					echo "Wrong";
				}
				mysqli_set_charset($this->conn, 'UTF8');
			}
	}
 ?>