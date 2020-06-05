<?php
// Set up a session
session_start();

// Store data into variables
// Encoded input against XSS attacks
$username = htmlentities($_GET['username']);
$password = htmlentities($_GET["password"]);

// Connect to database
$conn=new PDO("mysql:host=localhost;dbname=****;","****","****");

// Prepare labelled SQL query then execute in order 
$statement=$conn->prepare("SELECT * FROM poi_users WHERE username=:theuname AND password=:thepword");
$statement -> execute([":theuname" => $username, ":thepword" => $password]);

// Fetch results
$row=$statement->fetch();

// Validation  if results retrieve no matching rows (==false) theres no matching account in the database 
// Check if username or password contains other than numbers and letters
// Set up session variables, check admin status and login
// User sent to index.php
if($row==false)
{
	echo "Incorrect username or password!";
	
} else if (!ctype_alnum($username)) {
	
	echo "Username contains characters other than letters and numbers.";

} else if (!ctype_alnum($password)) {
	
	echo "Password contains characters other than letters and numbers.";

} else {
		$_SESSION["loggedinuser"] = $row["username"];
		$_SESSION["adminstatus"] = $row["isadmin"];
		header("Location: index.php");

};
?>