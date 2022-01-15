<?php
session_start();
include 'init/connect.php';
// echo $_SESSION['id'];
?>
<?php
    $id=$_SESSION['id'];
    $sql="SELECT * from student where id='$id'";
    
    $result=mysqli_query($conn,$sql);
    $rows=mysqli_fetch_assoc($result);
    
?>

<?php
    $id=$_SESSION['id'];
    
    if(isset($_POST['buy'])){
        
        $teacher_id=$_POST['teacher_id'];
        $_SESSION['teacher_id']=$_POST['teacher_id'];
        $student_id=$id;
        
        $query="SELECT * FROM teacher WHERE id='$teacher_id'";
        $action=mysqli_query($conn,$query);
        $row=mysqli_fetch_assoc($action);

        // $enrolls=$row['enrolls'];

        $_SESSION['subject_1']=$row['subject_1'];
        $teacher_name=$row['username'];
        $enrolls=$row['enrolls'];
        // $enroll=int()$enrolls;
        $enroll= intval($enrolls);
        $enroll++;
       
        
  
        $subject=$row['subject_1'];

        
        
        $sql="INSERT INTO `cart`( `teacher_id`, `teacher_name`, `student_id`, `subject`) VALUES ('$teacher_id','$teacher_name','$student_id','$subject')";
        $result=mysqli_query($conn,$sql);
        if($result){
            $query2="UPDATE `teacher` SET `enrolls`='$enroll' WHERE id='$teacher_id'";
            $action1=mysqli_query($conn,$query2);
            
            header("Location:learnings.php?id=$student_id");
        }
        else{
            echo'you bought that course already !  ', mysqli_error($conn);
        }
    }
  
    
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="home_style.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="course_card.css">
    <!-- <link rel="stylesheet/less" type="text/css" href="styles.less" /> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Home page</title>
</head>
<script src="less.js" type="text/javascript"></script>

<body class="bg">

    <!------------------- NAVBAR --------------- -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-darke">
        <div class="container-fluid">

            <img src="./imgs/32412355.jpg" class="rounded-circle" alt="Cinque Terre" width="5%">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./home_student.php">Home page</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="./learnings.php?id=<?=$rows['id'];?>">My
                            learnigs</a>
                    </li>




                </ul>

                <div class="dropdown ms-auto as ">
                    <a class="navbar-brand" href=""> <?= $rows['username']; ?></a>
                    <a class="dropdown-toggle ms-auto" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <img src="./imgs/bran.png" width="60vh" alt="">
                    </a>

                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">


                        <li><a class="dropdown-item" href="./teacher/logout.php">logout</a></li>
                    </ul>
                </div>


            </div>
        </div>
    </nav>
    <!------------------- NAVBAR --------------- -->

    <div class="padd">
        <header class="header">
            <div class="logo-box">
                <!-- <img src="./imgs/bran.png" alt="" class="logo"> -->


            </div>
            <div class="text-box">
                <h1 class="heading-primary">
                    <span class="heading-main">indoors</span>
                    <span class="heading-sub">Study always with pros </span>
                </h1>

                <a href="all_videos.php" class="button btn-white">Discover our courses</a>

            </div>




        </header>
        <div class="text-center line mb-5">
            <h3 class="text-center middle ">Most popular Courses</h3>
        </div>


        <div class="row row-cols-1 r row-cols-md-3 g-4">
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
                            <p>Lorem ipsum dolor sit amet consectetur, Ducimus, repudiandae temporibus
                            </p>
                            <div class="price"><?=$rows['price'];?> JD
                            </div>

                            <button type="submit" name="buy" class="btn-brown" style="vertical-align:middle"
                                id="inputfield1"> <span>Enroll Now </span></button>

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

        <br>
        <br>
        <div class="text-center line mb-3">
        </div>









        <?php
include 'cards.php';
?>



    </div>



    <?php
include 'footer.php';
?>



</body>

</html>