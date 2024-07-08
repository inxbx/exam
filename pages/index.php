<!doctype html>
<html>

<?php 
include "../components/head.php";
?>

<body>
<?php 
include "../components/navbar.php"; 

echo "<br />";

if (isset($_GET["status"]) && $_GET["status"] === "correct") {
    echo "<div class='hero'>";
    echo "<p class='welcome'>Welcome, {$_SESSION['email']}</p>";
    echo "</div>";
} 

?>

<div class="hero">
    <img src="../assets/hero.jpg" alt="Riget Zoo Adventures">
</div>

<br />

<div class="hero">
    <p>
    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Non blandit massa enim nec dui nunc mattis enim. Blandit turpis cursus in hac habitasse platea dictumst. Fringilla phasellus faucibus scelerisque eleifend. Volutpat blandit aliquam etiam erat velit scelerisque in dictum. Purus in massa tempor nec feugiat nisl pretium fusce. Massa placerat duis ultricies lacus sed turpis tincidunt id. Ut consequat semper viverra nam libero justo. Augue ut lectus arcu bibendum at varius vel. Rutrum quisque non tellus orci. Sit amet nulla facilisi morbi tempus iaculis. Nisi vitae suscipit tellus mauris a diam maecenas. Fringilla urna porttitor rhoncus dolor.
    </p>
</div>

<div class="hero">
    <a href="./info.php">Find out more</a>
</div>

<br />

</body>
</html>
