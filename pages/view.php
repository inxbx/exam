<!doctype html>
<html>

<?php 
include "../components/head.php";
?>

<body>
<?php 
include "../components/navbar.php"; 
?>

<br />

<?php
if (isset($_GET["message"]) && $_GET["message"] === "hotelSuccess") {
    echo "<div class='hero'>";
    echo "<p class='success'>You're in! Thanks for booking a room with us.</p>";
    echo "</div>";
} elseif (isset($_GET["message"]) && $_GET["message"] === "zooSuccess") {
    echo "<div class='hero'>";
    echo "<p class='success'>Success! We'll see you soon at our zoo.</p>";
    echo "</div>";
}
?>

<!-- Reused class as the same styles are needed -->
<p class="hero">Your Tickets</p>

<br />

<?php
// Displays the tickets, stored in $ticket_data
include "../components/view-tickets.php";

?>

<?php if (mysqli_num_rows($ticket_data) == 0): ?>
    <div class="hero">
        <a href="./tickets.php">
            You don't have any tickets, click here to get one!
        </a>
    </div>
<?php endif ?>

<?php while ($row = $ticket_data->fetch_assoc()): ?>
    <div class="ticket">
        <p>Date: <?= $row["date"] ?></p>
        <br />
        <p>Number of visitors: <?= $row["num_visitors"] ?></p>
    </div>
<?php endwhile ?>

<p class="hero">Your Bookings</p>

<br />

<?php 

include "../components/view-hotel.php";

?>

<?php if (mysqli_num_rows($ticket_data) == 0): ?>
    <div class="hero">
        <a href="./hotel.php">
            You don't have any bookings, click here to get one!
        </a>
    </div>
<?php endif ?>

<?php while ($row = $booking_data->fetch_assoc()): ?>
    <div class="ticket">
        <p>Room number: <?= $row["room_num"] ?></p>
        <br />
        <p>Room type: <?= $row["room_type"] ?></p>
        <br />
        <p>Arrival date: <?= $row["check_in"] ?></p>
        <br />
        <p>Check out date: <?= $row["check_out"] ?></p>
    </div>
<?php endwhile ?>

</body>
</html>
