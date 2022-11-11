<?php
class DBController {
//Get Heroku ClearDB connection information
$url = parse_url(getenv("CLEARDB_DATABASE_URL"));

$server = $url["host"];
$username = $url["user"];
$password = $url["pass"];
$db = substr($url["path"], 1);

$conn = new mysqli($server, $username, $password, $db);
	// private $host = "localhost";
	// private $user = "root";
	// private $password = "test";
	// private $database = "blog_samples";
	// private $conn;
	///
	// function __construct() {
	// 	$this->conn = $this->connectDB();
	// }
	// ///
	// function connectDB() {
	// 	$conn = mysqli_connect("localhost", "root", "", "tblproduct");
	// 	return $conn;
	// }
///
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