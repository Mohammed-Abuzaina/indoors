<?php
session_start();
include '../init/connect.php';
unset($_SESSION["id"]);
// echo'logout';
header("Location:../login.php");
?>