<?php
session_start();
include '../init/connect.php';

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>


<?php
if(isset($_POST['submit'])){
    echo 'yes';
    $target="../uploads/".basename($_FILES['image']['name']);
    $image=$_FILES['image']['name'];
    $text=$_POST['text'];
    $sql = "INSERT INTO `img`( `image`, `text`) VALUES ('$image','$text')";
    $result=mysqli_query($conn,$sql);
    if(!$result){
        echo 'no sql';
    }
    if(move_uploaded_file($_FILES['image']['tmp_name'],$target)){
        echo 'yes';
     }
     else{
         echo 'no';
     }
 }

?>

<body>
    <br>
    <br>
    <br>
    <br>
    <br>
    <form action="" method="post" enctype="multipart/form-data">

        <input type="file" name="image">
        <input type="text" name="text">
        <input type="submit" name="submit" value="Submit">

    </form>

</body>

</html>