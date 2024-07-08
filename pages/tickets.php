<!doctype html>
<html>

<?php 

include "../components/head.php";

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

<p class="hero">Visit The Zoo</p>

<div class="account">
    <img src="../assets/tickets.jpg" alt="A zebra walking">
    <form action="../classes/book.php" method="post">
        <label for="date">Date</label>
        <input type="date" name="date" id="date" required min=<?= $today ?>>

        <br />
        
        <label for="num_visitors">Number of Visitors</label>
        <select name="num_visitors" id="num_visitors" required>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>

        <br />

        <button class="btn" type="submit">Purchase</button>
    </form>
</div>

</body>
</html>
