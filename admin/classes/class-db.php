<?php 

if (!class_exists('DB')) {

	class DB {

	    /**
	     * @var object $db_connection The database connection
	     */
	    private $db_connection = null;
	    /**
	     * @var array $errors Collection of error messages
	     */
	    public $errors = array();
	    /**
	     * @var array $messages Collection of success / neutral messages
	     */
	    public $messages = array();

		
		public function __construct() {

	        // create a database connection, using the constants from config/db.php (which we loaded in index.php)
	        $this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

	        // change character set to utf8 and check it
	        if (!$this->db_connection->set_charset("utf8")) {
	            $this->errors[] = $this->db_connection->error;
	        }

			// if there is error connecting to database
			if ($this->db_connection->connect_errno) {
				$this->errors[] = "Ei yhteyttä tietokantaan.";
			}
		}

	    /**
	     * Gets post by ID and column name
	     */
		public function getPost($post_id, $column) {
				
			$sql = "SELECT * FROM posts 
					WHERE post_id = '$post_id'
					";

			$result = $this->db_connection->query($sql);

			$row = $result->fetch_assoc();

			if ($column == 'title') {
				return $row['post_title'];
			}
			if ($column == 'content') {
				return $row['post_content'];
			}
			if ($column == 'author') {
				return $row['post_author'];
			}
			if ($column == 'date') {
				return $row['post_date'];
			}
		}

		/**
		* Inserts new post
		*/
		public function newPost() {

			// check if topic and content fields are empty
			if (empty($_POST['post_title'])) {

				$this->errors[] = "Artikkelilla ei ole otsikkoa.";
			}
			elseif (empty($_POST['post_content'])) {

				$this->errors[] = "Artikkelilla ei ole sisältöä.";
			}
			else {

	        	date_default_timezone_set('Europe/Helsinki');

	        	$author = $_SESSION['user_name'];
	        	$title = $_POST['post_title'];
	        	$content = $_POST['post_content'];
	        	$date = date('j.n.Y');

	        	$sql = "INSERT INTO posts (post_author, post_title, post_content, post_date) VALUES ('$author', '$title', '$content', '$date')";

	        	$result = $this->db_connection->query($sql);

	        	if ($result) {
	        		$this->messages[] = "Artikkeli lisätty onnistuneesti.";
	        	}
	        	else {
	        		$this->errors[] = "Artikkelin lisäämisessä tapahtui virhe, yritä uudestaan.";
	        	}		
			}
		}

		/**
		* Returns all posts as object
		*/
		public function getAllPosts() {

			$sql = "
					SELECT * FROM posts 
					ORDER BY post_id DESC
					";

			$result = $this->db_connection->query($sql);

			if ($result->num_rows > 0) {
				return $result;
			}
			else {
				$this->errors[] = "Artikkeleita ei löytynyt.";
			}
		}

		/**
		* update post by id
		*/
		public function updatePost($post_id) {

			if (!empty($_POST['post_title']) && !empty($_POST['post_content'])) {

	        	$title = $_POST['post_title'];
	        	$content = $_POST['post_content'];
				
				$sql = "
						UPDATE posts 
						SET post_title = $title, post_content = $content 
						WHERE post_id = '$post_id'
						";

				$result = $this->db_connection->query($sql);

				if ($result) {
					$this->messages[] = "Artikkelia muokattu onnistuneesti.";
				}
				else {
					$this->errors[] = "Artikkelin muokkaamisessa tapahtui virhe, yritä uudestaan.";
				}
			}
			else {
				$this->errors[] = "Artikkelin otsikko tai sisältö on tyhjä.";
			}
		}

		/**
		* delete post by id and stay on same page
		*/
		public function deletePost($post_id) {

        	$sql = "
        			DELETE FROM posts 
        			WHERE post_id = '$post_id'
        			";

        	$result = $this->db_connection->query($sql);

        	if ($result) {
        		header('Location: ?page=post_list');
        		$this->messages[] = "Artikkeli poistettu onnistuneesti.";
        	}
        	else {
        		$this->errors[] = "Artikkelin poistamisessa tapahtui virhe, yritä uudestaan.";
        	}
		}

		/**
		 * Query all users
		 */
		public function getAllUsers() {			
			$sql = "
					SELECT * FROM users
					";
			
			$result = $this->db_connection->query($sql);
			
			if ($result->num_rows > 0) {
				return $result;
				
			}
			else {
				$this->errors[] = "Käyttäjiä ei löytynyt.";
			}
		}
		
		/**
		 * Query user by id
		 */
		public function getUser($user_id) {
			$sql = "
					SELECT * FROM users 
					WHERE user_id = '$user_id'
					";
				
			$result = $this->db_connection->query($sql);
				
			if ($result->num_rows > 0) {
				return $result;
		
			}
			else {
				$this->errors[] = "Käyttäjää ei löytynyt.";
			}
		}
	}
}


?>
