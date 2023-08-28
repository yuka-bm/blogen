<?php
function connection() {
    $server_name = 'localhost';
    $username = 'root';
    $password = ''; // for Mac user it should be 'root'
    $db_name = 'blog';

    // Create a connection or connect this file to database
    $conn = new mysqli($server_name, $username, $password, $db_name);
    # $conn holds the connection
    # $conn is now an object of the mysqli
    # mysqli() represents a connection between php and database
    # mysqli() is a class (contains different functions and variables inside)

    // Check the connection between php and database
    if ($conn->connect_error) {
        # if there is an error
        die('Connection failed: ' . $conn->connect_error);
        # die() will terminage the current script
    }
    else {
        # No error
        return $conn;
    }

    # -> is object operator = use object operator to access properties of mysqli() class
    # connect_error contains an error message
}

?>