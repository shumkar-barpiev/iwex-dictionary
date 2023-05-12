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

		if ($stmt -> prepare("SELECT * FROM `admin` WHERE `email` = ? AND `password` = ?")) {
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

//	*********************** CHAPTER FUNCTIONS CRUD **********************************  //
//	Get all chapters
	public function getAllChapters(){
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

		if ($stmt -> prepare("SELECT * FROM `chapters`")) {
			// Execute query
			$stmt -> execute();

			// Bind result variables
			$stmt -> bind_result($chapterId, $chapterName, $imageUrl);

			$chapters = array();
			// Fetch value
			while ($stmt->fetch()) {
				$chapters[] = new Chapter(
					$chapterId,
					$chapterName,
					$imageUrl
				);
			}
			// Close statement
			$stmt -> close();
			$this->conn->close();

			return $chapters;
		}
		else{
			$message = "Ooopps! Something gone wrong!";
			return $message;
		}
	}

// Create Chapter
	public function createChapter($chapterName, $imageUrl){
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

		if ($stmt -> prepare("INSERT INTO chapters (chapterName, imageUrl) VALUES (?, ?);")) {
			$stmt->bind_param('ss', $chapterName, $imageUrl);

			// Execute query
			$stmt -> execute();

			// Close statement
			$stmt -> close();
			$this->conn->close();
		}
		else{
			$message = "Ooopps! Something gone wrong!";
			return $message;
		}
	}


// Update Chapter
	public function updateChapter($chapterId, $chapterName, $imageUrl){
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

		if ($stmt -> prepare("UPDATE chapters SET chapterName = ?, imageUrl = ? WHERE chapterId = ?;")) {
			$stmt->bind_param('ssi', $chapterName, $imageUrl, $chapterId );

			// Execute query
			$stmt -> execute();

			// Close statement
			$stmt -> close();
			$this->conn->close();
		}
		else{
			$message = "Ooopps! Something gone wrong!";
			return $message;
		}
	}


// Delete Chapter
	public function deleteChapter($chapterId){
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

		if ($stmt -> prepare("DELETE FROM chapters WHERE chapterId = ?;")) {
			$stmt->bind_param('i', $chapterId);

			// Execute query
			$stmt -> execute();

			// Close statement
			$stmt -> close();
			$this->conn->close();
		}
		else{
			$message = "Ooopps! Something gone wrong!";
			return $message;
		}
	}

//	*********************** CHAPTER FUNCTIONS CRUD END **********************************  //



//	*********************** CHAPTER MENU FUNCTIONS CRUD **********************************  //
//	Get all chapters menu
	public function getAllChaptersMenu(){
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

		if ($stmt -> prepare("SELECT * FROM `menu`")) {
			// Execute query
			$stmt -> execute();

			// Bind result variables
			$stmt -> bind_result($id, $chapterMenuName, $chapterId, $chapterName);

			$chaptersMenu = array();
			// Fetch value
			while ($stmt->fetch()) {
				$chaptersMenu[] = new ChapterMenu(
					$id,
					$chapterMenuName,
					$chapterId,
					$chapterName
				);
			}
			// Close statement
			$stmt -> close();
			$this->conn->close();

			return $chaptersMenu;
		}
		else{
			$message = "Ooopps! Something gone wrong!";
			return $message;
		}
	}

// Create Chapter Menu
	public function createChapterMenu($chapterMenuName, $chapterId, $chapterName){
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

		if ($stmt -> prepare("INSERT INTO menu (chapterMenuName, chapterId, chapterName) VALUES (?, ?, ?);")) {
			$stmt->bind_param('sis', $chapterMenuName, $chapterId, $chapterName);

			// Execute query
			$stmt -> execute();

			// Close statement
			$stmt -> close();
			$this->conn->close();
		}
		else{
			$message = "Ooopps! Something gone wrong!";
			return $message;
		}
	}


// Update Chapter Menu
	public function updateChapterMenu($chapterMenuId, $chapterMenuName, $chapterId, $chapterName){
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

		if ($stmt -> prepare("UPDATE menu SET chapterMenuName = ?, chapterId = ?, chapterName = ?  WHERE id = ?;")) {
			$stmt->bind_param('sisi', $chapterMenuName, $chapterId, $chapterName, $chapterMenuId );

			// Execute query
			$stmt -> execute();

			// Close statement
			$stmt -> close();
			$this->conn->close();
		}
		else{
			$message = "Ooopps! Something gone wrong!";
			return $message;
		}
	}


// Delete Chapter Menu
	public function deleteChapterMenu($chapterMenuId){
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

		if ($stmt -> prepare("DELETE FROM menu WHERE id = ?;")) {
			$stmt->bind_param('i', $chapterMenuId);

			// Execute query
			$stmt -> execute();

			// Close statement
			$stmt -> close();
			$this->conn->close();
		}
		else{
			$message = "Ooopps! Something gone wrong!";
			return $message;
		}
	}

//	*********************** CHAPTER MENU FUNCTIONS CRUD END **********************************  //


	
}
 ?>
