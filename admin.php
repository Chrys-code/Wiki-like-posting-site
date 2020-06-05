<?php

// Check if session is set
// Else send user back to login.html
session_start();

if ( !isset ($_SESSION["loggedinuser"]))
{
  echo "Please login first.";
  echo "<a href='login.html'> Login page </a>";

} else if ($_SESSION["adminstatus"] == 0) { 

  echo "This page requires admin status.";
  echo "<a href='login.html'> Login page </a>";

} else {
?>

<!DOCTYPE html>
<html>
<head>
<title>Admin</title>
<link rel='stylesheet' type='text/css' href='main.css' />
</head>
<body>

<div class="header">
    <h1>Admin</h1>
</div>

<nav class="navigation">
  <div class="options">
      <a href='addpoiform.php'>Add new poi</a> | <a href='login.html'>Login</a> | <a href="index.php"> Home page </a>
  </div>
</nav>

<h2>Approved Review</h2>

<?php

// Connect to the database
$conn = new PDO ("mysql:host=localhost;dbname=****;", "****", "*****");

// Store ID into variable
$id = $_GET["id"];

// Generating token per reqest
$token = bin2hex(random_bytes(32));

// Prepare labelled SQL statement then execute
// Overwrite approved 0 to approved 1
$statement = $conn-> prepare("UPDATE poi_reviews SET approved = 1 WHERE ID=:theid");
$statement-> execute([":theid"=> $id,]);

// Get the approved review
// Prepare labelled SQL statement then execute
$statement2 = $conn-> prepare("SELECT * FROM poi_reviews WHERE ID =:theid");
$statement2-> execute([":theid"=> $id,]);

$row = $statement2 -> fetch();

echo "<div class='search_res_container'>";
echo  $row["review"] ."<br/> ";
echo "<a href='adminform.php'>Back to admin page</a>";
echo "</div>";





}
?>