<?php

	class Database
	{

		public $conn;
		private $host = "localhost";
		private $db_name = "Sql973021_2";
		private $username = "root";
		private $password = "";

		public function dbConnection()
		{

			$this->conn = null;
			try {
				$this->conn = new PDO("mysql:host=".$this->host.";dbname=".$this->db_name, $this->username, $this->password);
				$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			}
			catch (PDOException $exception) {
				echo "Connection error: ".$exception->getMessage();
			}

			return $this->conn;
		}
	}

?>