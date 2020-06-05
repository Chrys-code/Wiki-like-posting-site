<?php

// Check if session is set and if user is admin
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
      <a href='addpoiform.php'>Add new poi</a> | 
      <a href='login.html'>Login</a> | 
      <a href="index.php"> Home page </a>
  </div>
</nav>

<h2>Unapproved reviews:</h2>

<?php

// Connect to the database
$conn = new PDO ("mysql:host=localhost;dbname=****;", "****", "****");

$approved = 0;

// Generating token per reqest
$token = bin2hex(random_bytes(32));

// Prepare labelled SQL statement then execute
$statement = $conn-> prepare("SELECT * FROM poi_reviews WHERE approved =:approved");
$statement-> execute([":approved"=> $approved,]); 




  while ($row = $statement->fetch()) {

    
    echo "<div class='search_res_container'>";
    echo  $row["review"] ."<br/> ";
    echo "<div class='approve'>";
    echo "<form method='get' action='admin.php'>";
    echo "<input type='hidden' name='id' value='$row[id]' />";
    echo "<input type='submit' value='Approve' />";
    echo "</form>";
    echo "</div>";
    echo "</div>";
   


    }

}
?>