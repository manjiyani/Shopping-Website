<?php
session_start();
include 'login.php';
echo ($_SESSION["userName"]);

?>