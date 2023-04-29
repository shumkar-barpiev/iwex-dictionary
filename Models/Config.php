<?php
	class Config{
		private $host = "localhost";
		private $userName = "root";
		private $userPass = "";
		private $dbName = "webUME";

		public function getHost(){
			return $this->host;
		}

		public function getUserName(){
			return $this->userName;
		}

		public function getUserPass(){
			return $this->userPass;
		}

		public function getDBName(){
			return $this->dbName;
		}
	}
?>
