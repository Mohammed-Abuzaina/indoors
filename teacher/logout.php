<?php
session_start();
include '../init/connect.php';
unset($_SESSION["id"]);
unset($_SESSION["teacher_id"]);
// echo'logout';
header("Location:../login.php");
?>