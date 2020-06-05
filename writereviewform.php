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
    <h1>Points of interest:</h1>
</div>
<nav class="navigation">
    <div class="options">
        <a href='addpoiform.php'>Add new poi</a> | 
        <a href='login.html'>Login</a> |
        <a href='admin.php'>Admin</a> |
        <a href='index.php'>Home page</a>
</div>
</nav>


<?php
// Store ID from reviews.php's querystring into variable
$ID = $_GET['ID'];

// Connect to database
$conn = new PDO ("mysql:host=localhost;dbname=****;", "****", "****");

// Generating token per reqest
$token = bin2hex(random_bytes(32));

// Prepare labelled SQL query then execute
$statement = $conn -> prepare ("SELECT * FROM pointsofinterest WHERE ID =:theID");
$statement -> execute([":theID" => $ID,]);

// Fetch so the user know what poi they write review to
$row = $statement -> fetch();

	echo "<div class='search_res_container'>";
    echo "Name: ". $row["name"] ."<br/> ";
    echo "Type: " . $row["type"] . "<br/> " ; 
    echo "Region: " .$row["region"]. "<br/>" ; 
	echo "Description: " .$row["description"]. "<br/>" ; 
    echo "</div>";

?>


<div class='container'>
<form method='post' action='writereview.php'>
<label for='review'>Write your review:</label></br>
<textarea name='review' require style='height:300px; width:400px' placeholder='Please write your review here...'></textarea></br>
<?php
    echo    "<input type='hidden' name='ID' value='$ID' />"
?>
<input type='submit' value='Go!' />
</form>
</div>


</body>
</html>

<?php
}
?>