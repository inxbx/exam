<!doctype html>
<html>

<?php 

include "../components/head.php";

// gets today's date to set a minimum value for the inputs
$today = date("Y-m-d");

?>

<body>
<?php include "../components/navbar.php"; ?>

<br />

<?php if (!isset($_SESSION["email"])) {
    // tells the user that they need an account to view the page
    header("Location: ./create.php?status=signin");
}
?>

<p class="hero">Stay in Our Hotel</p>

<div class="account">
    <img src="../assets/hotel.jpg" alt="Gazelle in a field">
    <form action="../classes/book-hotel.php" method="post">

        <label for="room">Room Number</label>
        <select name="room" id="room" required>
            <option value="1">101 (Family)</option>
            <option value="2">102 (Family)</option>
            <option value="3">103 (Single)</option>
            <option value="4">104 (Single)</option>
            <option value="5">105 (VIP)</option>
        </select>

        <br />

        <label for="checkin">Check In Date</label>
        <input type="date" name="checkin" id="checkin" required min=<?= $today ?>>

        <br />

        <?php 
        if (isset($_GET["message"]) && $_GET["message"] === "checkInError") {
            echo "<div class='message'>";
            echo "<p>That check in date is unavailable.</p>
                  <p>Please pick a new date or a different room.</p>";
            echo "</div>";
        } 
        ?>

        <label for="checkout">Check Out Date</label>
        <input type="date" name="checkout" id="checkout" required min=<?= $today ?>>

        <br />

        <?php 
        if (isset($_GET["message"]) && $_GET["message"] === "checkOutError") {
            echo "<div class='message'>";
            echo "<p>That check out date is unavailable.</p>
                  <p>Please pick a new date or a different room.</p>";
            echo "</div>";
        } 
        ?>

        <button class="btn" type="submit">Purchase</button>
    </form>
</div>

</body>
</html>
