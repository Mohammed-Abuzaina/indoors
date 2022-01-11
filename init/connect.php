<?php

$localhost="localhost";
$usersname="root";
$password="";
$dbname="study-website";

$conn=mysqli_connect($localhost,$usersname,$password,$dbname);
if(!$conn){
    echo mysqli_connect_error($conn);
}

?>