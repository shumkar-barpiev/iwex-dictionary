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




//	*********************** CHAPTER SUB MENU FUNCTIONS CRUD **********************************  //
//	Get all chapters sub menu
	public function getAllChaptersSubMenu(){
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

		if ($stmt -> prepare("SELECT * FROM `subMenu`")) {
			// Execute query
			$stmt -> execute();

			// Bind result variables
			$stmt -> bind_result($id, $subMenuName, $menuId, $menuName, $chapterName);

			$chapterSubMenu = array();
			// Fetch value
			while ($stmt->fetch()) {
				$chapterSubMenu[] = new ChapterSubMenu(
					$id,
					$subMenuName,
					$menuId,
					$menuName,
					$chapterName
				);
			}
			// Close statement
			$stmt -> close();
			$this->conn->close();

			return $chapterSubMenu;
		}
		else{
			$message = "Ooopps! Something gone wrong!";
			return $message;
		}
	}

// Create Chapter sub Menu
	public function createChapterSubMenu($subMenuName, $menuId, $menuName, $chapterName){
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

		if ($stmt -> prepare("INSERT INTO subMenu (subMenuName, menuId, menuName, chapterName) VALUES (?, ?, ?, ?);")) {
			$stmt->bind_param('siss', $subMenuName, $menuId, $menuName, $chapterName);

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

// Update Chapter sub Menu
	public function updateChapterSubMenu($id, $subMenuName, $menuId, $menuName, $chapterName){
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

		if ($stmt -> prepare("UPDATE subMenu SET subMenuName = ?, menuId = ?, menuName = ?, chapterName = ?  WHERE id = ?;")) {
			$stmt->bind_param('sissi', $subMenuName, $menuId, $menuName, $chapterName, $id );

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

// Delete Chapter sub Menu
	public function deleteChapterSubMenu($id){
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

		if ($stmt -> prepare("DELETE FROM subMenu WHERE id = ?;")) {
			$stmt->bind_param('i', $id);

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

//	*********************** CHAPTER SUB MENU FUNCTIONS CRUD END **********************************  //



//	*********************** Word FUNCTIONS CRUD **********************************  //
//	Get all words
    public function getAllWords(){
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

        if ($stmt -> prepare("SELECT * FROM `dictionaryWords`;")) {
            // Execute query
            $stmt -> execute();

            // Bind result variables
            $stmt -> bind_result($id, $subMenuId , $wordImage, $germanWord, $russianWord, $description, $chapterName, $menuName, $subMenuName);

            $allWords = array();
            // Fetch value
            while ($stmt->fetch()) {
                $allWords[] = new DictionaryWord(
                    $id,
                    $subMenuId ,
                    $wordImage,
                    $germanWord,
                    $russianWord,
                    $description,
                    $chapterName,
                    $menuName,
                    $subMenuName);
            }
            // Close statement
            $stmt -> close();
            $this->conn->close();

            return $allWords;
        }
        else{
            $message = "Ooopps! Something gone wrong!";
            return $message;
        }
    }

    //	Get all words by sub menu id
    public function getWordsBySubMenuId($subMenuId){
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

        if ($stmt -> prepare("SELECT * FROM `dictionaryWords` WHERE subMenuId = ?;")) {

            $stmt->bind_param('i', $subMenuId);

            // Execute query
            $stmt -> execute();

            // Bind result variables
            $stmt -> bind_result($id, $subMenuId , $wordImage, $germanWord, $russianWord, $description, $chapterName, $menuName, $subMenuName);

            $allWords = array();
            // Fetch value
            while ($stmt->fetch()) {
                $allWords[] = new DictionaryWord(
                    $id,
                    $subMenuId ,
                    $wordImage,
                    $germanWord,
                    $russianWord,
                    $description,
                    $chapterName,
                    $menuName,
                    $subMenuName);
            }
            // Close statement
            $stmt -> close();
            $this->conn->close();

            return $allWords;
        }
        else{
            $message = "Ooopps! Something gone wrong!";
            return $message;
        }
    }

// Create word
    public function createWord($subMenuId , $wordImage, $germanWord, $russianWord, $description, $chapterName, $menuName, $subMenuName){
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

        if ($stmt -> prepare("INSERT INTO dictionaryWords (subMenuId, wordImage, germanWord, russianWord, description, chapterName, menuName, subMenuName) VALUES (?, ?, ?, ?, ?, ?, ?, ?);")) {
            $stmt->bind_param('isssssss', $subMenuId , $wordImage, $germanWord, $russianWord, $description, $chapterName, $menuName, $subMenuName);
            ;

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

// Update word
    public function updateWord($id, $subMenuId , $wordImage, $germanWord, $russianWord, $description, $chapterName, $menuName, $subMenuName){
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

        if ($stmt -> prepare("UPDATE dictionaryWords SET subMenuId = ?, wordImage = ?, germanWord = ?, russianWord = ?, description = ?, chapterName = ?, menuName = ?, subMenuName = ?  WHERE id = ?;")) {
            $stmt->bind_param('isssssssi', $subMenuId , $wordImage, $germanWord, $russianWord, $description, $chapterName, $menuName, $subMenuName, $id);

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

// Delete word
    public function deleteWord($id){
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

        if ($stmt -> prepare("DELETE FROM dictionaryWords WHERE id = ?;")) {
            $stmt->bind_param('i', $id);

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

//	*********************** Word FUNCTIONS CRUD END **********************************  //

}
 ?>
