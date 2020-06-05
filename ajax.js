window.onload = function() {
    // Get the submit button on index.php and add onclikc event so ajarequest() fuction runs when clicked
	document.getElementById('searchbtn').addEventListener('click', ajaxrequest);
}

function ajaxrequest()
{
    // Create request variable
    // Represents interaction with the server
    var xhr2 = new XMLHttpRequest();

    // Get the select field's value which equals the selected option's value
    var a = document.getElementById("region").value;

    // When response is loaded run responseReceived function
    xhr2.addEventListener ("load", responseReceived);

    // Passing reqest in query string  
    //region variable declared in "a" variable  (by now a=selected_option_value e.g. London)
    xhr2.open('GET',
        'search.php?region=' + a );

    // Send request
    xhr2.send();
}

function responseReceived(e)
{
    // Response from the server loaded into the reponse div
    document.getElementById('response').innerHTML = e.target.responseText;
}