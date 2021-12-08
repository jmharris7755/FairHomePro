<?php
session_start();
unset($_SESSION["email"]);
unset($_SESSION["password"]);
unset($_SESSION['c_name']);
unset($_SESSION["loggedIn"]);
unset($_SESSION["sp_username"]);
unset($_SESSION["sp_email"]);
unset($_SESSION["bankaccount"]);
unset($_SESSION["creditcard"]);
unset($_SESSION["sp_password_1"]);
unset($_SESSION["username"]);
unset($_SESSION["sp_phone"]);
unset($_SESSION["request_bid"]);

session_destroy();
header("Location:index.php");
?>