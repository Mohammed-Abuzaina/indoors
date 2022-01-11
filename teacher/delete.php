<?php
session_start();
include '../init/connect.php';
$id=$_SESSION['id'];
?>

<?php

if(isset($_POST['delete_teacher'])){
    $id_teacher=$_POST['id_teacher'];
    $sql="Delete from teacher where id='$id_teacher'";
    echo $id_teacher,$sql;
    $result=mysqli_query($conn,$sql);
    if(!$result){
        echo 'error';
    }
    header("Location:../cooladmin/admin_dashboard.php");
}

if(isset($_POST['delete'])){
    $id_video=$_POST['id_video'];
    $sql="Delete from video where id='$id_video'";
    echo $id_video,$sql;
    $result=mysqli_query($conn,$sql);
    if(!$result){
        echo 'error';
    }
    header("Location:view.php?id=".$id);
}
?>