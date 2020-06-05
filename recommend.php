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
<title>Recommendation</title>
<link rel='stylesheet' type='text/css' href='main.css' />
</head>
<body>

<div class="header">
    <h1>Confirmation</h1>
</div>

<nav class="navigation">
  <div class="options">
      <a href='addpoiform.php'>Add new poi</a> | 
      <a href='login.html'>Login</a> |
      <a href='adminform.php'>Admin</a>
      <a href='index.php'>Home page</a>
  </div>
</nav>


<?php

// Store POI ID from href querystring from search.php
$ID = $_GET["ID"];

// Connect to the database
$conn = new PDO ("mysql:host=localhost;dbname=****;", "****", "****");

// Generating token per reqest
$token = bin2hex(random_bytes(32));

// Prepare labelled SQL query then execute
$statement = $conn->prepare ("UPDATE pointsofinterest SET recommended = recommended + 1 WHERE ID =:theID");
$statement -> execute([":theID" => $ID,]);

echo "<div class='search_res_container'>";
echo "<p class='text'>";
echo "Thank you for recommending this POI!" . "</br>";
echo "<a href='index.php'>Back to home page</a>";
echo "</p>";
echo "</div>";



?>



</body>
</html>




<?php
}
?>