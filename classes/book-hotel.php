<?php 

//page used for processing the booking of hotel rooms

session_start();

include "./database.php";
include "./tickets-hotel.php";

$connect = new Database();

$conn = $connect->connect(); 

$booking = new Booking();

$booking->book_hotel($conn, $_SESSION["id"], $_POST["checkin"], 
                     $_POST["checkout"], $_POST["room"]);
                            
// header("Location: ../pages/view.php?message=hotelSuccess");
