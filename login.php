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
            // header('Location:login.php');
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
    <link rel="stylesheet" href="login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Login page</title>
</head>

<body>
    <!-------------------  LOGIN START HERE    --------------------->
    <form action="" method="post">
        <div class="container">
            <div class="left">
                <div class="header">
                    <h2 class="animation a1">Welcome Back</h2>
                    <h4 class="animation a2">Log in to your account using username and password</h4>
                </div>
                <div class="form">
                    <input type="text" name="username" class="form-field animation a3" placeholder="User Name">
                    <input type="password" name="password" class="form-field animation a4" placeholder="Password">
                    <p class="animation a5"><a href="register_user.php">Register as user</a></p>
                    <p class="animation a5"><a href="./teacher/register_teacher.php">Register as Teacher</a></p>
                    <button type="submit" name="submit" class="animation a6">LOGIN</button>
                </div>
            </div>
            <div class="right"></div>
        </div>
    </form>











    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>
    <script>
    const signUpButton = document.getElementById('signUp');
    const signInButton = document.getElementById('signIn');
    const container = document.getElementById('container');

    signUpButton.addEventListener('click', () => {
        container.classList.add("right-panel-active");
    });

    signInButton.addEventListener('click', () => {
        container.classList.remove("right-panel-active");
    });
    </script>
</body>

</html>