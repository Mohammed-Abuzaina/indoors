<?php
session_start();
include 'init/connect.php';
echo $_SESSION['id'];
echo '<br>';
echo $_SESSION['teacher_id'];
?>
<?php
    $id=$_SESSION['id'];
    $sql="SELECT * from student where id='$id'";
    $result=mysqli_query($conn,$sql);
    $rows=mysqli_fetch_assoc($result);
    $count=1;



    $teacher_id=$_SESSION['teacher_id'];

$sql_1 = "SELECT * FROM `teacher`";
$result_1 =mysqli_query($conn, $sql_1);
$row = mysqli_fetch_assoc($result_1);

$raters=$row['raters'];
$enrolls=$row['enrolls'];

$sql_3 = "SELECT * FROM `rated` where student_id='$id' and teacher_id='$teacher_id'";
$result_3 =mysqli_query($conn, $sql_3);
echo mysqli_error($conn);
if(mysqli_num_rows($result_3)>0){
    echo 'You rated ME !!' ,mysqli_error($conn);
}else{
    
    $sql_4 = "INSERT INTO `rated`(`student_id`, `teacher_id`) VALUES ('$id','$teacher_id')";    
    $result_4 =mysqli_query($conn, $sql_4);
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css"
        integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
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


        <table class=" border border-5 table table-striped container-xl mx-auto mt-4">

            <tr>
                <th>
                    Video Nubmer
                </th>
                <th>
                    Video Description
                </th>
                <th colspan="3">
                    Video
                </th>
                <th>
                    Subject
                </th>

            </tr>


            <?php
                $teacher_id= $_SESSION['teacher_id'];
                $sql1="SELECT * from video where teacher_id='$teacher_id'";
                $result1=mysqli_query($conn,$sql1) or die(mysqli_error($conn));
                // $row=mysqli_fetch_assoc($result1);
            
              
            
        while($video = mysqli_fetch_assoc($result1)){
        
        ?>
            <tr>
                <td>
                    <?=$count++;?>
                </td>

                <td>
                    <?=$video['description']?>
                </td>


                <td colspan="3">
                    <video src="./uploads/<?= $video['video_url']?>" width="40%" controls> </video>
                </td>


                <td>
                    <?=$video['subject']?>
                </td>

            </tr>
            <?php
        
        }
        
        
    
    
?>
            <!-------------------- Rating form ---------------------->
        </table>
        <?php
        if(!mysqli_num_rows($result_3)>0){
            ?>
        <div class="vstack gap-2 col-md-5 mx-auto ">

            <form action="" method="post">

                <div class="rateyo form-control  " id="rating" data-rateyo-rating="4" data-rateyo-num-stars="5"
                    data-rateyo-score="3">
                </div>



                <span class='result form-control w-25 '>0</span>


                <input type="hidden" name="rating">

                <br>
                <!-- <input type="hidden" name="rating"> -->

                <input type="submit" class="btn btn-primary " name="add" value="Rate me">



            </form>

        </div>
        <?php
        }
        ?>
        <!-------------------- Rating form ---------------------->




    </div>



    <?php
include 'footer.php';
?>





    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>

    <script>
    $(function() {
        $(".rateyo").rateYo().on("rateyo.change", function(e, data) {
            var rating = data.rating;
            $(this).parent().find('.score').text('score :' + $(this).attr('data-rateyo-score'));
            $(this).parent().find('.result').text('rating :' + rating);
            $(this).parent().find('input[name=rating]').val(
                rating); //add rating value to input field
        });
    });
    </script>


</body>

</html>




<?php
// $teacher_id=$_SESSION['teacher_id'];

// $sql_1 = "SELECT * FROM `teacher`";
// $result_1 =mysqli_query($conn, $sql_1);
// $row = mysqli_fetch_assoc($result_1);

// $raters=$row['raters'];
// $enrolls=$row['enrolls'];

// $sql_3 = "SELECT * FROM `rated` where student_id='$id' and taecher_id='$teacher_id'";
// $result_3 =mysqli_query($conn, $sql_3);

// if(!$result_3){
//     echo 'You rated ME !!' ,mysqli_error($conn);
// }else{
    
//     $sql_4 = "INSERT INTO `rated`(`student_id`, `teacher_id`) VALUES ('$id','$teacher_id')";    
//     $result_4 =mysqli_query($conn, $sql_4);
// }

if ($_SERVER["REQUEST_METHOD"] == "POST")
{



    $num_enrolls=intval($enrolls);
    $num_enrolls++;
    $num_raters= intval($raters);
    echo is_int($num_raters),'fafas',$num_raters;
    $num_raters++;
    
    $rating = $_POST["rating"];

    $sql_2="UPDATE `teacher` SET `rating`='$rating'/$num_raters,`raters`='$num_raters' ,`enrolls`='$num_enrolls' WHERE id='$teacher_id'";
    $result_2 =mysqli_query($conn, $sql_2);

    
    if ($result_1 && $result_2)
    {
        echo "New Rate addedddd successfully";
    }
    else
    {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>