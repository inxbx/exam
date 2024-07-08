<?php 

session_start();

include "./user.php";

$user = new User();

$user->signOut();

header("Location: ../pages/");
