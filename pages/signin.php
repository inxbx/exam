<!doctype html>
<html>

<?php 
include "../components/head.php";

?>

<body>
<?php include "../components/navbar.php"; ?>

<br />

<p class="hero">Sign in to Your Account</p>

<div class="account">
    <img src="../assets/giraffes.jpg" alt="Giraffes">
    <form action="../classes/signin.php" method="post">
        <label for="email">Email address</label>
        <br />
        <input type="email" name="email" id="email" placeholder="you@riget.com" required>

        <br />
        
        <label for="password">Password</label>
        <br />
        <input type="password" name="password" id="password" placeholder="********" required>

        <br />

        <?php

        if (isset($_GET["status"]) && $_GET["status"] === "incorrect") {
            echo "<p class='message'>Incorrect email or password</p>";
        } 
    
        ?>

        <a class="terms" href="./terms.php">Terms, Conditions, and Cookie Policy</a>
        
        <br />

        <button class="btn" type="submit">Log in</button>
    </form>
</div>

</body>
</html>
