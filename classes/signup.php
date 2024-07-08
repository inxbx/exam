<?php 

include "./database.php";
include "./user.php";

$connect = new Database();

$conn = $connect->connect(); 

$user = new User();

// gets the data from the form on the previous page
$user->createAccount($conn, $_POST["email"], $_POST["password"]);

// shows the user the log in page for them to sign into their new account
header("Location: ../pages/signin.php");
