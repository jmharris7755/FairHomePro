<?php
session_start();
unset($_SESSION["email"]);
unset($_SESSION["password"]);
unset($_SESSION["loggedIn"]);
session_destroy();
header("Location:index.php");
?>