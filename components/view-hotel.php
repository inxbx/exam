<?php 

// Component that collects and shows the user their room bookings

// None of the commented code below is needed as it's already called in 
// the view-tickets.php file, which is included before this file in view.php. 

// include "../classes/database.php";
// include "../classes/tickets-hotel.php";

// $connect = new Database();

// $conn = $connect->connect(); 

// $booking = new Booking();

$booking_data = $booking->view_booking($conn, $_SESSION["id"]);
                            
