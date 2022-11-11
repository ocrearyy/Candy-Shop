<?php
class DBController {

	
$server = $url["host"];
$username = $url["user"];
$password = $url["pass"];
$db = substr($url["path"], 1);

$conn = new mysqli($server, $username, $password, $db);


// function __construct() {
// 		$this->conn = $this->connectDB();
// 	}
	
// 	function connectDB() {
// 		$conn = new mysqli($server, $username, $password, $db);
// 		return $conn;
// 	}

// $conn = new mysqli($server, $username, $password, $db);

	// private $host = "localhost";
	// private $user = "root";
	// private $password = "test";
	// private $database = "blog_samples";
	// private $conn;
	
	// function __construct() {
	// 	$this->conn = $this->connectDB();
	// }
	
	// function connectDB() {
	// 	$conn = mysqli_connect("localhost", "root", "", "tblproduct");
	// 	return $conn;
	// }

	//Get Heroku ClearDB connection information
// $cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
// $cleardb_server = $cleardb_url["host"];
// $cleardb_username = $cleardb_url["user"];
// $cleardb_password = $cleardb_url["pass"];
// $cleardb_db = substr($cleardb_url["path"],1);
// $active_group = 'default';
// $query_builder = TRUE;
// // Connect to DB
// $conn = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);


	function runQuery($query) {
		$result = mysqli_query($this->conn,$query);
		while($row=mysqli_fetch_assoc($result)) {
			$resultset[] = $row;
		}		
		if(!empty($resultset))
			return $resultset;
	}
	
	function numRows($query) {
		$result  = mysqli_query($this->conn,$query);
		$rowcount = mysqli_num_rows($result);
		return $rowcount;	
	}
}
?>