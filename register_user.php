<?php
session_start();
include 'init/connect.php';
?>

<?php
if(isset($_POST['submit'])){
    // for empty Fields 
    if(!empty($_POST['username']&& $_POST['email']&& $_POST['password']&& $_POST['university']&& $_POST['phone']&& $_POST['major']&& $_POST['img']))
    {
    $_SESSION['name']=$_POST['username'];
    $username=$_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $phone=$_POST['phone'];
    $university=$_POST['university'];
    $major=$_POST['major'];
    $img=$_POST['img'];
    // echo $username . '<br> ' . $password . '<br> ' . $phone.''.$university . '<br> ' . $major;
    $sql ="INSERT INTO `student`( `username`, `password`, `email`, `phone_number`, `university`, `major`, `img`) 
    VALUES ('$username','$password','$email','$phone','$university','$major','$img')
     ";
     $result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
     echo $result;
     echo $sql;
     echo '<br>';
     echo  $_SESSION['name'];
    //  header('Location:login.php');
     

    }
    else{
        echo '<div class="alert alert-danger" role="alert">';
        echo 'Please Fill All The Empty Fields';
        echo '</div>';
    }
}



?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Register page</title>
</head>

<body>
    <!-------------------  REGISTER START HERE    --------------------->
    <div class="container">
        <div class="register_user mb-2">
            <h1 class="display-1">Register Page </h1>
            <br>
            <form action="" method="post">
                <div class="mb-2">
                    <div class="mx-5">
                        <label for="Username" class="form-label">Username:</label>
                        <input type="text" name="username" class="form-control" id="Username"
                            placeholder="Enter Your Username ">
                    </div>
                    <br>
                    <br>
                    <div class="mx-5">
                        <label for="email" class="form-label">Email :</label>
                        <input type="email" name="email" class="form-control" id="email"
                            placeholder="Enter Your Email ">
                    </div>
                    <br>
                    <br>
                    <div class="mx-5">
                        <label for="password" class="form-label">Password :</label>
                        <input type="password" name="password" class="form-control" id="password"
                            placeholder="Enter Your Password ">
                    </div>
                    <br>
                    <br>
                    <div class="mx-5">
                        <label for="Phone" class="form-label">Phone Number:</label>
                        <input type="tel" name="phone" class="form-control" id="Phone"
                            placeholder="Enter Your Phone Number ">
                        <!-- //pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" -->
                    </div>
                    <br>
                    <br>
                    <div class="mx-5">
                        <label for="Universty" class="form-label">Universty:</label>
                        <input type="text" name="university" class="form-control" id="Universty"
                            placeholder="Enter Your Universty Name ">
                    </div>
                    <br>
                    <br>
                    <div class="mx-5">
                        <label for="Major" class="form-label">Major:</label>
                        <input type="text" name="major" class="form-control" id="Major" placeholder="Enter Your Major ">
                    </div>
                    <br>
                    <br>


                    <div class="mb-3 mx-5">
                        <label for="Image" class="form-label">Image:</label>
                        <input type="file" name="img" class="form-control" id="Image" placeholder="Enter Your Image ">
                    </div>
                    <br>

                    <br>

                    <div class="d-grid gap-2 col-6 mx-auto">
                        <input class="btn btn-primary " type="submit" name="submit">
                    </div>
                </div>

            </form>
        </div>
    </div>

    <!-------------------  REGISTER END HERE    --------------------->














    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>
</body>

</html>