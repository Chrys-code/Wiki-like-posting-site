<?php

// Check if session is set
// Else send user back to login.html
session_start();

if ( !isset ($_SESSION["loggedinuser"]))
{
  echo "Please login first.";
  echo "<a href='login.html'> Login page </a>";
} else { 
?>

<!DOCTYPE html>
<html>
<head>
<title>New Poi</title>
<link rel='stylesheet' type='text/css' href='main.css' />
</head>
<body>

<div class="header">
    <h1>Add new Poi</h1>
</div>

<nav class="navigation">
  <div class="options">
      <a href='addpoiform.php'>Add new poi</a> | 
      <a href='login.html'>Login</a> | 
      <a href="index.php"> Home page </a>
  </div>
</nav>

<h2>Thank you for your POI</h2>

<!--
 Previous script that I commented out
 Store information into variables
$n = htmlentities($_POST["name"]);
$t = htmlentities($_POST["type"]);
$re = htmlentities($_POST["region"]);
$de = htmlentities($_POST["description"]);
$un = htmlentities($_POST["username"]);

 connect to the database
$conn = new PDO ("mysql:host=localhost;dbname=*****;", "****", "****");

 Generating token per reqest
$token = bin2hex(random_bytes(32));

 Prepare labelled SQL query
 Insert new row in the database with the given columns filling with information in given order
$statement = $conn->prepare ("INSERT INTO pointsofinterest (name, type, region, description, username) VALUES (:thename, :thetype, :theregion, :thedesc, :theuname)");
$statement -> execute([":thename" => $n, ":thetype" => $t, ":theregion" => $re, ":thedesc" => $de, ":theuname" => $un]);
-->

<?php
// New DAO and OOP script
include("daos/pointofinterestDAO.php");

// Connect to the databse
$conn=new PDO("mysql:host=localhost;dbname=****", "*****", "****");

// Create the DAO
$dao = new pointofinterestDAO($conn, "pointsofinterest");

// Create a new poi object
$pointofinterest = new pointofinterest( $_POST['name'] , $_POST['type'], $_POST['region'] , $_POST['description'] , $_POST['username']);

// DAO to insert it into the database
$dao->addPointofinterest($pointofinterest);

echo "Thanks for your points of interest. <a href='index.php'>Back to main page</a>";
}
?>



</body>
</html>




<?php
//}
?>

