<?php
class Model{
	private $conn;

	public function getConn(){
		return $this->conn;
	}

	public function connectDB(){
		$conf = new Config();

		$this->conn = new mysqli(
				$conf->getHost(),
				$conf->getUserName(),
				$conf->getUserPass(),
				$conf->getDBName()
			);
			// Check connection
			if ($this->conn->connect_error) {
				$this->conn->close();
			  return "Connection failed";
			}
			$this->conn->close();
			return "Connected succesfully!!!";
	}

	// functions for admin sign in
	public function getAdminByEmailAndPassword($email, $password){
		$conf = new Config();

		$this->conn = new mysqli(
			$conf->getHost(),
			$conf->getUserName(),
			$conf->getUserPass(),
			$conf->getDBName()
		);
		// Check connection
		if ($this->conn->connect_error) {
			$this->conn->close();
			return "Connection failed";
		}

		$stmt = $this->conn -> stmt_init();

		if ($stmt -> prepare("SELECT * FROM `admins` WHERE `email` = ? AND `password` = ?")) {
			$stmt->bind_param('ss', $email, $password);

			// Execute query
			$stmt -> execute();

			// Bind result variables
			$stmt -> bind_result($id, $email, $password);

			$stmt->fetch();

			$user = new Admin($id, $email, $password);

			// Close statement
			$stmt -> close();
			$this->conn->close();

			return $user;
		}
		else{
			$message = "Ooopps! Something gone wrong!";
			return $message;
		}
	}

	
}
 ?>
