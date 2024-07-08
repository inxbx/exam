<!doctype html>
<html>

<?php 
include "../components/head.php";

?>

<body>
<?php include "../components/navbar.php"; ?>

<br />

<?php 

?>

<p class="hero">Create an Account</p>

<div class="account">
    <img src="../assets/penguins.jpg" alt="Penguins">
    <form action="../classes/signup.php" method="post">
        
        <?php if (isset($_GET["status"]) && $_GET["status"] === "signin"): ?>
            <p class='message'>To access the page you were trying to visit, 
                               please create an account</p>
        <?php endif ?>

        <label for="email">Email address</label>
        <br />
        <input type="email" name="email" id="email" placeholder="you@riget.com" required>

        <br />
        
        <label for="password">Password</label>
        <br />
        <input type="password" name="password" id="password" placeholder="********" required>

        <br />

        <a class="terms" href="./terms.php">Terms, Conditions, and Cookie Policy</a>
        
        <br />

        <button class="btn" type="submit">Sign up</button>
    </form>
</div>

</body>
</html>
