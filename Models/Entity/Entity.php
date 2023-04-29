<?php
	class Admin{
		private $id;
		private $email;
		private $password;

		public function __construct($id, $email, $password){
			if($id) $this->id = $id;
			$this->email = $email;
			$this->password = $password;
		}

		public function getId(){
			return $this->id;
		}
		public function setId($id){
			$this->id = $id;
		}

		public function getEmail(){
			return $this->email;
		}
		public function setEmail($email){
			$this->email = $email;
		}

		public function getPassword(){
			return $this->password;
		}
		public function setPassword($password){
			$this->password = $password;
		}

	}
?>
