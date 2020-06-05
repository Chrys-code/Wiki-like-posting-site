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
<title>POI review</title>
<link rel='stylesheet' type='text/css' href='main.css' />
</head>
<body>

<div class="header">
    <h1>Reviews</h1>
</div>

<nav class="navigation">
  <div class="options">
      <a href='addpoiform.php'>Add new poi</a> |
      <a href='login.html'>Login</a> | 
      <a href="adminform.php"> Admin </a> | 
      <a href="index.php"> Home page </a>
  </div>
</nav>

<?php
// Sotore ID from search.php querystring into a variable
$ID = $_GET["ID"];

// Connect to the database
$conn = new PDO ("mysql:host=localhost;dbname=****;", "****", "****");

// Generating token per reqest
$token = bin2hex(random_bytes(32));

// Prepare labelled SQL query to represent current POI
$statement2 = $conn -> prepare("SELECT * from pointsofinterest WHERE ID =:theID");
$statement2 -> execute([":theID"=> $ID,]);

$row = $statement2 -> fetch(); {

  echo "<div class='search_res_container'>";
  echo "<p class='text'>";
  echo "Name: ". $row["name"] ."<br/> ";
  echo "Type: " . $row["type"] . "<br/> " ; 
  echo "Region: " .$row["region"]. "<br/>" ; 
  echo "Description: " .$row["description"]. "<br/>" ; 
  echo "</p>";
  echo "</div>";

}
?>

<h2>Reviews:</h2>

<?php
// Prepare labelled SQL statement then execute
$statement = $conn-> prepare("SELECT review FROM poi_reviews WHERE poi_id =:theID AND approved=:approved");
$statement-> execute([":theID"=> $ID, ":approved"=>1,]);


// Loop through every review for the matching poi_ID
while ($row = $statement->fetch())
{
	  echo "<div class='review_container'>";
    echo  $row["review"] ."<br/> ";
    echo "</div>";
	
}


// Pass ID through querystring once again so the computer can match the review to the poi_ID
echo "<div class='links'>";
echo "<a href='writereviewform.php?ID=" . $ID . "'>Write a review</a>" . "&nbsp&nbsp"."|" . "&nbsp&nbsp" ."</br>";
echo "<a href='index.php'>Back to main page</a>";
echo "</div>";

?>
</body>
</html>

<?php
}
?>