<?php
$mysqli = new mysqli ('localhost', 'root', '', 'ssims2') or die(mysqli_error ($mysqli));
include_once 'connect.php'; // include connection
include 'functions.php'; //include functions
$login = new Login;
$login->LoginSystem();
$login->SessionCheck();
$login->UserType();
?>
