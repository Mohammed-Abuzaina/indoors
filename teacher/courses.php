<?php
session_start();
include '../init/connect.php';


?>

<?php
$id=$_SESSION['id'];
$subject_1=$_SESSION['subject'];
$sql="Select * from teacher where id='$id'";
$result=mysqli_query($conn,$sql);
$rows=mysqli_fetch_assoc($result);

if(isset($_POST['submit'])){
    $subject= $_SESSION['subject'];
    $sql = "SELECT * FROM videos WHERE subject =$subject";
    $result1=mysqli_query($conn,$sql);
    if (!$result){
        echo 'Error';
    
    }
    else{
        header("Location:show.php");
    }
}


?>

<?php
include 'header.php';
?>

<body>
    <!-- nav bar -->
    <?php

include 'navbar.php';

?>
    <form action="show.php" method="post">
        <div class="container mb-4">
            <h1 class="display-1">Hello to <?=$rows['username']?> profile</h1>

            <div class="row mx-auto">

                <div class="col-sm-6 mt-2">
                    <div class="card ">
                        <div class="card-body ">
                            <h5 class="card-title">First Subject : <?=$rows['subject_1']?></h5>
                            <p class="card-text">University : <?=$rows['university']?></p>
                            <p class="card-text">Major : <?=$rows['major']?></p>

                            <input type="submit" class="btn btn-dark" value="Show Videos">
                        </div>
                    </div>
                </div>


                <div class="col-sm-6 mt-2">
                    <div class="card ">
                        <div class="card-body ">
                            <h5 class="card-title">Second Subject : <?=$rows['subject_2']?></h5>
                            <p class="card-text">University : <?=$rows['university']?></p>
                            <p class="card-text">Major : <?=$rows['major']?></p>

                            <input type="submit" class="btn btn-dark" value="Show Videos">
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </form>




    <!-- Footer -->
    <?php
include '../footer.php';
?>

</body>

</html>