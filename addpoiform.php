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
<title>Addpoi</title>
<link rel='stylesheet' type='text/css' href='main.css' />
</head>
<body>

<div class="header">
  <h1>Add a new poi:</h1>
</div>

<nav class="navigation">
    <div class="options">
      <a href='addpoiform.php'>Add new poi</a> | 
      <a href='login.html'>Login</a> | 
      <a href='adminform.php'>Admin</a> |
      <a href='index.php'>Homa page</a>
    </div>
</nav>

<div class="container">
  <form method="post" action="addpoi.php">
    <label for="name">Name:</label></br>
    <input name="name" require placeholder="name"></input></br>
    <label for="type">Type:</label></br>
    <input name="type" require placeholder="type"></input></br>
    <label for="region">Region:</label></br>
    <input name="region" require placeholder="region"></input></br>
<?php
// Echo a hidden input with a value of the current user's username
echo"<input type='hidden' name='username' value='$_SESSION[loggedinuser]' />";
?>
    <label for="description">Description:</label></br>
    <textarea name="description" require placeholder="Please enter description..." style="height:300px; width:400px"></textarea>
    </br>
    <input type="submit" value="Go!" />
  </form>
</div>

</body>
</html>

<?php
}
?>
