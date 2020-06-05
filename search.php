<?php

// Check if session is set
// Else send user back to login.html
session_start();

if ( !isset ($_SESSION["loggedinuser"]))
{
    echo "<div class='search_res_container'>";
    echo "Please login first!";
    echo "</div>";
  
} else { 


// Connect to the database
$conn = new PDO ("mysql:host=localhost;dbname=****;", "****", "****");

// Store region from index.php dropdown menu value into a variable
$region = $_GET["region"];

// Generating token per reqest
$token = bin2hex(random_bytes(32));

// Prepare labelled SQL query then execute
$statement = $conn->prepare ("SELECT * from pointsofinterest WHERE region =:theregion");
$statement -> execute([":theregion" => $region,]);
?>


<fieldset>
<?php
// While loop echoes all the data per row on the html page
while ($row = $statement->fetch())
{
  echo "<div class='search_res_container'>";
  echo "<p class='text'>";
  echo "Name: ". $row["name"] ."<br/> ";
  echo "Type: " . $row["type"] . "<br/> " ; 
  echo "Region: " .$row["region"]. "<br/>" ; 
  echo "Description: " .$row["description"]. "<br/>" ; 
  echo "Recommended: " .$row["recommended"]. "<br/>" ; 
  echo "</p>";
  echo "</div>";



// Pass ID via query string to match recommendation and review (later writing a review) IDs 
  echo "<div class='links'>";
  echo "<p class='text'>";
	echo "<a href='recommend.php?ID=" . $row["ID"] . "'>Recommend this poi!</a>" . " | " . "<a href='reviews.php?ID=" . $row["ID"] . "'>Reviews about this poi</a>";
  echo "</p>";
  echo "</div>";

}

}
?>
</fieldset>


</body>
</html>