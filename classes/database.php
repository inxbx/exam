<?php
// used https://www.w3schools.com/php/php_mysql_connect.asp to reference against
// my code to ensure that it was done correctly

class Database {
    function connect() {
        $server = "localhost";
        $username = "root";
        $password = "";
        $database = "zooadventures";

        $conn = new mysqli($server, $username, $password, $database);
        if ($conn->connect_error) {
            die("Error connecting to database. 
                Reference: ". $conn->connect_error);
        }
        // echo "Success";
        return $conn;
    }
}
