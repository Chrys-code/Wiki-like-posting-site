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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="main.css">
    <title>Write a review</title>
</head>
<body>

<div class="header">
    <h1>Confirmation</h1>
</div>

<nav class="navigation">
  <div class="options">
      <a href='addpoiform.php'>Add new poi</a> | 
      <a href='login.html'>Login</a> | 
      <a href='adminform.php'>Admin</a> | 
      <a href='index.php'>Home page</a>
  </div>
</nav>


<!--
// Store poi ID and the value of review into variables
// Review was given in a textarea so the users will see the exact same message as the publisher wrote before
$poi_id = $_POST['ID'];
$re = htmlentities($_POST['review']);

// Connect to the database
$conn = new PDO ("mysql:host=localhost;dbname=****;", "****", "****");

// Generating token per reqest
$token = bin2hex(random_bytes(32));

// Prepare labelled SQL query then execute in order
$statement = $conn -> prepare ("INSERT INTO poi_reviews (poi_id, review) VALUES (:thepoiID, :thereview)");
$statement -> execute([":thepoiID" => $poi_id, ":thereview" => $re]);


echo "<div class='search_res_container'>";
echo "<p class='text'>";
echo "Thank you for sharing your review!" . "</br>";
echo "To see your review you need to wait until an admin approves, then it will be visible under your chosen POI" . "</br>";
echo "</p>";
echo "</div>";
-->

<?php
// New DAO and OOP script
include("daos/reviewDAO.php");

// Connect to the databse
$conn=new PDO("mysql:host=localhost;dbname=****", "****", "****");

// Create the DAO
$dao = new reviewDAO($conn, "poi_reviews");

// Create a new poi object
$review = new review( $_POST['ID'] , $_POST['review']);

// DAO to insert it into the database
$dao->addReview($review);


echo "<div class='search_res_container'>";
echo "<p class='text'>";
echo "Thank you for sharing your review!" . "</br>";
echo "To see your review you need to wait until an admin approves, then it will be visible under your chosen POI" . "</br>";
echo "</p>";
echo "</div>";


?>
</body>
</html>

<?php
}
?>
