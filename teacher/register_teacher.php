<?php
session_start();
include '../init/connect.php';
?>

<?php
if(isset($_POST['submit'])){
    // for empty Fields 
    if(!empty($_POST['username']&& $_POST['email']&& $_POST['password']&& $_POST['university']&& $_POST['phone']&& $_POST['major']&& $_POST['img']))
    {
    
    $username=$_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $phone=$_POST['phone'];
    $university=$_POST['university'];
    $major=$_POST['major'];
    $subject_1=$_POST['subject_1'];
    $img=$_POST['img'];
    $price=$_POST['price'];
    // echo $username . '<br> ' . $password . '<br> ' . $phone.''.$university . '<br> ' . $major;
    $sql ="INSERT INTO `teacher`( `username`, `password`, `email`, `phone_number`, `university`, `major`,`subject_1`, `img`,`price`) 
    VALUES ('$username','$password','$email','$phone','$university','$major','$subject_1','$img',$price)
     ";
     $result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
     echo $result;
     echo $sql;
     echo '<br>';
     echo  $_SESSION['name'];
     header('Location:../login.php');
     

    }
    else{
        echo '<div class="alert alert-danger" role="alert">';
        echo 'Please Fill All The Empty Fields';
        echo '</div>';
    }
}



?>

<?php

include 'header.php';

?>
<link rel="stylesheet" href="register_teacher.css">


<body>
    <!-------------------  REGISTER START HERE    --------------------->
    <form action="" method="post">
        <div class="container">
            <div class="left">
                <div class="header">
                    <h2 class="animation a1">Welcome Friend</h2>
                    <h4 class="animation a2">Register new account using username and password</h4>
                </div>
                <div class="form">
                    <input type="text" name="username" class="form-field animation a3" placeholder="User Name">
                    <input type="password" name="password" class="form-field animation a4" placeholder="Password">
                    <input type="email" name="email" class="form-field animation a4" placeholder="Email">
                    <input type="text" name="university" class="form-field animation a4" placeholder="Unversity">
                    <input type="text" name="phone" class="form-field animation a4" placeholder="Phone Number">
                    <input type="text" name="major" class="form-field animation a4" placeholder="Major">
                    <input type="number" name="price" class="form-field animation a4" placeholder="price">
                    <input type="text" name="subject_1" class="form-field animation a4" placeholder="subject">
                    <label for="img" class=" animation a4">choose your image</label>
                    <input type="file" name="img" class=" form-control animation a4" placeholder="choose an image">
                    <!-- <p class="animation a5"><a href="register_user.php">Register as user</a></p>
                    <p class="animation a5"><a href="./teacher/register_teacher.php">Register as Teacher</a></p> -->
                    <button type="submit" name="submit" class="animation a6">Register</button>
                </div>
            </div>
            <div class="right"></div>
        </div>
    </form>

    <!-------------------  REGISTER END HERE    --------------------->














    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>
</body>

</html>