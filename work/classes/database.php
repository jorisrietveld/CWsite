<?php
class database {
	private $_error;

	public function __construct($server,$username,$password,$database) {
		$this->connection = new MySQLi($server, $username, $password, $database) or die("ERROR: Kan niet verbinden met de database.");
	}
	
	public function query($q) {
		$result = mysqli_query($this->connection,$q) or die(mysqli_error($this->connection));
		// $_error;
		return $result;
	}
	
	public function insert_id(){
		return mysqli_insert_id($this->connection);	
	}
	
	public function fetch_assoc($q) {
		return mysqli_fetch_assoc($q);
	}

	public function num_rows($q) {
		return mysqli_num_rows($q);
	}

	public function error(){
		return $_error;
	}
	
	public function __destruct(){
		mysqli_close($this->connection);
	}
}
?>