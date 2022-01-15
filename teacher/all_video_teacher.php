<?php
session_start();
include '../init/connect.php';
// echo $_SESSION['id'];
?>

<?php
$id =$_SESSION['id'];
$sql="SELECT * FROM `teacher` WHERE id='$id'";

$result=mysqli_query($conn,$sql);
$rows=mysqli_fetch_assoc($result);
?>


<!DOCTYPE html>
<html lang="en">

<?php
include 'header.php';
?>

<body>
    <!-- nav bar -->
    <?php

include 'navbar.php';

?>


    <div class="padd">


        <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php
//  $sql="SELECT * from teacher  limit 3";
 $sql="SELECT * FROM teacher ORDER BY RAND ()  ";
 $result=mysqli_query($conn,$sql);
 while($rows=mysqli_fetch_assoc($result)){
     
     ?>
            <form action="" method="post">

                <div class="contain">
                    <div class="card-main">
                        <div class="card-image">
                            <img src="../uploads/<?=$rows['img'];?>" width="40%" alt="">

                        </div>
                        <div class="card-text">
                            <input type="hidden" value="<?=$rows['id'];?>" name="teacher_id">
                            <span class="date"><?=$rows['username'];?></span>
                            <h2><?=$rows['subject_1'];?></h2>
                            <p>Lorem ipsum dolor sit amet consectetur, Ducimus, repudiandae temporibus omnis illum

                                eligendi dolor</p>

                            <!-- <input type="submit" name="buy" class="btn btn-success" value="Enroll Now" id="inputfield1"> -->
                            <span class="price" style="color: rgb(29, 192, 151); font-size:20px;"><?=$rows['price'];?>
                                JD</span>
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
    </div>















    <br>
    <br>
    <br>
    <?php

include '../footer.php';

?>

</body>

</html>