<nav class="bg-neutral-300">
<div class="navbar">
    <ul>
        <li class="pagelink">
            <a href="../pages/">Riget Zoo Adventures</a>
        </li>
        <li class="pagelink">
            <a href="../pages/tickets.php">Visit Us</a>
        </li>
        <li class="pagelink">
            <a href="../pages/hotel.php">On-Site Hotel</a>
        </li>
        <!-- Check the user is not signed in -->
        <?php if (!isset($_SESSION["email"])): ?>
            <li class="userlink">
                <a href="../pages/signin.php">Sign In</a>
            </li>
            <li class="userlink">
                <a href="../pages/create.php">Create Account</a>
            </li>
        <!-- If the user is signed in -->
        <?php else: ?>
            <li class="userlink">
                <a href="../classes/signout.php">Sign Out</a>
            </li>
            <li class="userlink">
                <a href="../pages/view.php">My Bookings</a>
            </li>
        <?php endif ?>
    </ul>
</div>
</nav>

<br />
