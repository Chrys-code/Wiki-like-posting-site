<?php

// Most of the main pages are visible to any users 
// for functionality they must sign in 
// I left the main page visible as I commented out the lockdown to make it life-like

// Check if session is set
// Else send user back to login.html
//session_start();

//if ( !isset ($_SESSION["loggedinuser"]))
//{
//  echo "Please login first.";
//  echo "<a href='login.html'> Login page </a>";
//} else { 

?>

  <!DOCTYPE html>
  <html>
  <head>
  <title>POI</title>
  <link rel='stylesheet' type='text/css' href='main.css' />
  <script src="ajax.js"></script>
  </head>
  <body>

  <div class="header">
    <h1>Points of interest:</h1>
  </div>

  <nav class="navigation">
    <div class="options">
        <a href='addpoiform.php'>Add new poi</a> |
        <a href='login.html'>Login</a> |
        <a href='adminform.php'>Admin</a>  
    </div>
  
  
  </nav>
  <div class="container">

      <h2>Search by region:</h2>

    <form>
      <select id="region" name="region">
        <option value="test">Test</option>
        <option value="NY">New York</option>
        <option value="London">London</option>
        <option value="Oxfordshire">Oxfordshire</option>
        <option value="Somerset">Somerset</option>
        <option value="Paris">Paris</option>
        <option value="Rome">Rome</option>
        <option value="California">California</option>
        <option value="Nordrhein_Westfalen">Nordrhein_Westfalen</option>
        <option value="Niedersachsen">Niedersachsen</option>
        <option value="Baden-Wuerttemberg">Baden-Wuerttemberg</option>
        <option value="Bayern">Bayern</option>
        <option value="Hampshire">Hampshire</option>
        <option value="Wiltshire">Wiltshire</option>
        <option value="Surrey">Surrey</option>
        <option value="Sussex">Sussex</option>
        <option value="Southampton">Southampton</option>
        <option value="Colorado">Colorado</option>
        <option value="Hautes-Pyrenees">Hautes-Pyrenees</option>
        <option value="Devon">Devon</option>
        <option value="Berkshire">Berkshire</option>
        <option value="Pacific Ocean">Pacific Ocean</option>
        <option value="Pacifica">Pacifica</option>
       <option value="Devon">Devon</option>
      </select>
      <input id="searchbtn" type="submit" value="Go!" />
    </form>
  </div>
  
  <div id="response">
  </div>
<!-- 
ajax.js will replace the content of class "response" with results (response from the server)
From action is deleted so theres no such function as the form send information to search.php.
Request sent by ajax.js by an onclick function through search.php then response received by ajax.js
(not search.php) is placed here.
-->



  </body>
  </html>






<?php
//}
?>


