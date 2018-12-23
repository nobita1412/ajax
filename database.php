<?php
	class Database
	{
		public static $conn = null;

		public function __construct()
		{
			if(self::$conn){
				return self::$conn;
			}

			$this->connect();

			return self::$conn;
		}

		public function connect()
		{
			$servername = "localhost";
			$username = "root";
			$password = "";
			$db_name = "ajax_sql";

			self::$conn = new mysqli($servername, $username, $password, $db_name);

			if(self::$conn->connect_error){
				die("Connection failed: " . self::$conn->connect_error);
			}
		}

		public function disconnect()
		{
			self::$conn->close();
		}
	}
?>