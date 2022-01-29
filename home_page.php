<?php
session_start();
include './init/connect.php';
// echo $_SESSION['id'];
?>

<?php

if(isset($_SESSION['id'])){
    $id=$_SESSION['id'];
    $sql="SELECT * from teacher where id=$id";
    // echo $_SESSION['id'];
    $result=mysqli_query($conn,$sql);
    $rows=mysqli_fetch_assoc($result);
    $_SESSION['id']=$rows['id'];
    $id=$_SESSION['id'];
    
}else {
    header('Location:login.php');
}

if(isset($_POST['teacher_profile'])){
    header("location:teacher/teacher_profile.php?id=$id");
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
    <link rel="stylesheet" href="course_card.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Home page</title>
</head>

<body>

    <!------------------- NAVBAR --------------- -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-darke">
        <div class="container-fluid">
            <img src="./imgs/logo2.png" class="rounded-circle" alt="Cinque Terre" width="5%">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="home_page.php">Home page</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page"
                            href="./teacher/teacher_profile.php?id=<?= $id; ?>">Teacher
                            profile</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="./teacher/view.php?id=<?= $id; ?>">Videos</a>
                    </li>


                </ul>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <div class="dropdown ms-auto as ">
                        <a class="navbar-brand" href="teacher_profile.php?id=<?= $id; ?>"> <?= $rows['username']; ?></a>
                        <a class="dropdown-toggle ms-auto" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <img src="./uploads/<?=$rows['img'];?>" width="60vh" alt="">
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <li>
                                <a class="dropdown-item ms-auto "
                                    href="./teacher/update_teacher.php?id=<?=$id;?>">Update
                                    profile</a>
                            </li>
                            <!-- <li><a class=" dropdown-item" href="#">Another action</a> -->
                            </li>
                            <li><a class="dropdown-item" href="./teacher/logout.php">logout</a></li>
                        </ul>
                    </div>


                </div>
            </div>
    </nav>
    <!------------------- NAVBAR --------------- -->

    <div class="padd">
        <header class="header shadow">
            <div class="logo-box">
                <!-- <img src="./imgs/bran.png" alt="" class="logo"> -->


            </div>
            <div class="text-box">
                <h1 class="heading-primary">
                    <span class="heading-main">indoors</span>
                    <span class="heading-sub">Study always with pros </span>
                </h1>

                <a href="./teacher/all_video_teacher.php" class="button btn-white">Discover our courses</a>

            </div>




        </header>
        <div class="text-center line mb-2">
            <h3 class="text-center  display-3">Most popular Courses</h3>
        </div>





        <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php
        //  $sql="SELECT * from teacher  limit 3";
         $sql="SELECT * FROM teacher ORDER BY RAND ()  LIMIT 3";
         $result=mysqli_query($conn,$sql);
         while($rows=mysqli_fetch_assoc($result)){
             
             ?>
            <form action="" method="post">

                <div class="contain">
                    <div class="card-main">
                        <div class="card-image">
                            <img src="./uploads/<?=$rows['img'];?>" width="50%" alt="">

                        </div>
                        <div class="card-text">
                            <input type="hidden" value="<?=$rows['id'];?>" name="teacher_id">
                            <span class="date"><?=$rows['username'];?></span>
                            <h2><?=$rows['subject_1'];?></h2>
                            <p>Lorem ipsum dolor sit amet consectetur, Ducimus, repudiandae temporibus omnis illum

                                eligendi dolor</p>


                            <!-- <button type="submit" name="buy" class="btn-brown" style="vertical-align:middle"
                                id="inputfield1"> <span>Enroll Now </span></button> -->

                        </div>
                        <div class="card-stats">
                            <div class="stat">
                                <div class="value"><?=$rows['enrolls'];?><sup></sup></div>
                                <div class="type">Enrolls</div>
                            </div>
                            <div class="stat border">
                                <div class="value"><?=$rows['rating'];?></div>
                                <div class="type">Rating</div>
                            </div>
                            <div class="stat">
                                <div class="value"><?=$rows['raters'];?></div>
                                <div class="type">How much Raters</div>
                            </div>
                        </div>
                    </div>
                </div>



            </form>
            <?php
         }
         
         ?>
        </div>
















        <div class="text-center line my-4"></div>









        <?php
include 'cards.php';
?>




    </div>













    <?php
include 'footer.php';
?>

</body>

</html>