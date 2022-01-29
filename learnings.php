<?php
session_start();
include 'init/connect.php';
// echo $_SESSION['id'];
// echo $_SESSION['teacher_id'];
// $teacher_id=$_SESSION['teacher_id'];
?>

<?php

    $id=$_SESSION['id'];
    $sql="SELECT * from student where id='$id'";
    $result=mysqli_query($conn,$sql);
    $rows=mysqli_fetch_assoc($result);


if(isset($_POST['show'])){
    
    $teacher_id=$_POST['id'];
    $_SESSION['teacher_id']=$teacher_id;
    $sql="SELECT * from teacher where id='$teacher_id'";
    echo '<br>', $teacher_id,$_SESSION['teacher_id'];
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);
    
    header("Location:./videos.php?id=$teacher_id");
    // header("Location:./vidoe_gallery/index.php?id=$teacher_id");

}


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="home_style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Home page</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-darke">
        <div class="container-fluid">

            <img src="./imgs/logo2.png" class="rounded-circle" alt="Cinque Terre" width="10%">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./home_student.php">Home page</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="./learnings.php?id=<?=$rows['id'];?>">My
                            learnigs</a>
                    </li>
                </ul>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <div class="dropdown ms-auto as ">
                        <span class="navbar-brand" href=""> <?= $rows['username']; ?></span>
                        <a class="dropdown-toggle ms-auto" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <img src="./imgs/bran.png" width="60vh" alt="">
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">


                            <li><a class="dropdown-item" href="./teacher/logout.php">logout</a></li>
                        </ul>
                    </div>


                </div>
            </div>
    </nav>
    <!------------------- / NAVBAR --------------- -->


    <div class="padd">




        <?php


    // $teacher_id= $_SESSION['teacher_id'];
    $sql1="SELECT * from cart where student_id='$id'  ";
    $result1=mysqli_query($conn,$sql1) or die(mysqli_error($conn));
   
    // $row=mysqli_fetch_assoc($result1);




    while($row=mysqli_fetch_assoc($result1)){
        //    teacher_array.push($row)
        ?>
        <form action="" method="post">

            <div class="card w-50 mb-5 col-sm-6">
                <div class="card-body">
                    <input type="hidden" name="id" value="<?= $row['id'] ?>">

                    <input type="hidden" name="id" value="<?= $row['teacher_id'] ?>">
                    <h5 class="card-title">teacher: <?=$row['teacher_name']?></h5>
                    <h6 class="card-title">subject: <?=$row['subject']?></h6>

                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <!-- <a href="videos.php?id=<?=$id?>" class="btn btn-success text-center" name="show">show course</a> -->
                    <!-- <a href="vidios.php?id=<?=$id?>" class="btn btn-danger text-center">delete</a> -->
                    <!-- <input type="submit" class="btn btn-success " name="show" value="show course"> -->
                    <button type="submit" name="show" class="btn-brown" style="vertical-align:middle" id="inputfield1">
                        <span>Go to Course</span></button>
                </div>
            </div>
        </form>
        <?php
        
    }
    
         ?>






    </div>



    <?php
include 'footer.php';
?>



</body>

</html>