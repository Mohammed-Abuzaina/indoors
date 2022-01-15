<?php
session_start();
include 'init/connect.php';
echo $_SESSION['id'];
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
        $_SESSION['subject_1']=$row['subject_1'];
        $teacher_name=$row['username'];
        $enrolls=$row['enrolls'];
        
        $enroll= intval($enrolls);
       
        
  
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
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="home_style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Home page</title>
</head>

<body>

    <!------------------- NAVBAR --------------- -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <img src="./uploads/logo.jpg" class="rounded-circle" alt="Cinque Terre" width="10%" height="10%">


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

                <a href="#" class="button btn-white">Discover our courses</a>

            </div>




        </header>
        <div class="text-center line mb-5">
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


                <div class="col">
                    <div class="card ">

                        <img src="./uploads/<?=$rows['img'];?>" width="50%" alt="">
                        <div class="card-body">
                            <input type="hidden" value="<?=$rows['id'];?>" name="teacher_id">
                            <h5 class="card-title">Teacher Name :<?=$rows['username'];?> </h5>
                            <h5 class="card-title">Major :<?=$rows['major'];?> </h5>
                            <h5 class="card-title">University :<?=$rows['university'];?> </h5>
                            <h5 class="card-title">Subject :<?=$rows['subject_1'];?> </h5>
                            <h5 class="card-title">price :<?=$rows['price'];?> </h5>
                            <h5 class="card-title">Rating :<?=$rows['rating'];?> </h5>
                            <h5 class="card-title">How many Enrolls :<?=$rows['enrolls'];?> </h5>

                            <p class="card-text">This is a longer card with supporting text below as a natural lead-in
                                to
                                additional content. This content is a little bit longer.</p>

                            <input type="submit" name="buy" class="btn btn-success" value="Enroll Now" id="inputfield1">
                            <!-- <input type="hidden" name="buy" class="btn btn-primary" value="Show course" id="inputfield2"> -->
                        </div>
                    </div>



                </div>
            </form>
            <?php
         }
         
         ?>
        </div>






    </div>



    <?php
include 'footer.php';
?>


    <script>
    function hide() {
        // alert("The type of Input1 will now change from button to text");
        document.getElementById("inputfield1").type = "hidden";
        show();
    }

    function show() {
        // alert("The type of Input1 will now change from button to text");
        document.getElementById("inputfield2").type = "button";
    }
    </script>
</body>

</html>