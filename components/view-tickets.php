<?php 

// Component that collects and shows the user tickets they own

include "../classes/database.php";
include "../classes/tickets-hotel.php";

$connect = new Database();

$conn = $connect->connect(); 

$booking = new Booking();

$ticket_data = $booking->view_ticket($conn, $_SESSION["id"]);
                            
