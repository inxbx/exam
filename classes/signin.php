<?php 

include "./database.php";
include "./user.php";

$connect = new Database();

$conn = $connect->connect(); 

$user = new User();

$user->logIn($conn, $_POST["email"], $_POST["password"]);
