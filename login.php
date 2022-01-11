<?php
session_start();
include 'init/connect.php';
?>

<?php
if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql="SELECT * FROM student where username='$username' and password='$password'";
    $result=mysqli_query($conn,$sql);
    if($result){
        $row=mysqli_fetch_assoc($result);
        $_SESSION['id']=$row['id'];
    }
    
    
    //if it was a student
    if(mysqli_num_rows($result)){
        header('Location:./home_student.php');
        
    }
    //if it was a teacher
    else{
        echo $sql;
        $username1 = $_POST['username'];
        $password1 = $_POST['password'];
        $sql="SELECT * FROM teacher where username='$username1' and password='$password1'";
        $result=mysqli_query($conn,$sql);
        
        $rows=mysqli_fetch_assoc($result);
        echo $rows['id'];
        $_SESSION['id']=$rows['id'];
        //if for the teacher
                if(mysqli_num_rows($result)){
                header('Location:./home_page.php');
                

            }
        
        echo 'Please Enter a valid email address or password !!',mysqli_error($conn);
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
    <title>Login page</title>
</head>

<body>
    <!-------------------  LOGIN START HERE    --------------------->
    <div class="container">
        Pa$$w0rd!
        <div class="login">
            <h1 class="display-1">Login Page </h1>
            <br>
            <form action="" method="post">
                <div class="mb-2">
                    <div class="mx-5">
                        <label for="Username" class="form-label">Username :</label>
                        <input type="text" name="username" class="form-control" id="Username"
                            aria-describedby="Username">
                    </div>
                    <br>


                    <div class="mb-3 mx-5">
                        <label for="exampleInputPassword1" class="form-label">Password:</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                    </div>

                    <br>
                    <div class="d-grid gap-2 col-6 mx-auto">
                        <input class="btn btn-dark " type="submit" name="submit" value="Login">
                        <span>don't have an account, <a href="register_user.php">Register here !</a></span>
                    </div>

                </div>

            </form>
        </div>
    </div>

    <!-------------------  LOGIN END HERE    --------------------->














    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>
</body>

</html>