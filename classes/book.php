<?php 

//page used for processing the booking of tickets

session_start();

include "./database.php";
include "./tickets-hotel.php";

$connect = new Database();

$conn = $connect->connect(); 

$booking = new Booking();

$booking->book_ticket($conn, $_POST["date"], $_POST["num_visitors"], 
                      $_SESSION["id"]);
                            
header("Location: ../pages/view.php?message=zooSuccess");
