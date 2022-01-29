<?php
session_start();
include 'init/connect.php';
// echo $_SESSION['id'];
// echo '<br>';
 $teacher_id=$_SESSION['teacher_id'];
?>
<?php
$id=$_SESSION['id'];

$sql3="SELECT * FROM `video` WHERE teacher_id='$teacher_id'";
$result3=mysqli_query($conn, $sql3);
if(!$result3){
                echo 'video error';
 }

 $raters;
$enrolls;

 $sql_3 = "SELECT * FROM `rated` where student_id='$id' and teacher_id='$teacher_id'";
 $result_3 =mysqli_query($conn, $sql_3);
//  $count = mysqli_num_rows($result_3);

if(isset($_SESSION['teacher_id'])){

    $sql_1 = "SELECT * FROM `teacher` where id='$teacher_id'";
    $result_1 =mysqli_query($conn, $sql_1);
    if(!$result_1){
        echo mysqli_error($conn);
    }
    // $row = mysqli_fetch_assoc($result_1);
    $row =mysqli_fetch_assoc($result_1);

        
        $raters=$row['raters'];
        $enrolls=$row['enrolls'];
        // echo '<br>raters and enrolls',$raters,' ',$enrolls;
        // $num_raters;
    
}
// $_SESSION['teacher_id']=$row['id'];
// $teacher_id=$_SESSION['teacher_id'];

    $id=$_SESSION['id'];
    $sql="SELECT * from student where id='$id'";
    $result=mysqli_query($conn,$sql);
    $rows=mysqli_fetch_assoc($result);
    $count=1;


    if(isset($_POST['rate']))
    {
        $sql_4 = "INSERT INTO `rated`(`student_id`, `teacher_id`) VALUES ('$id','$teacher_id')";    
        $result_4 =mysqli_query($conn, $sql_4);

      
        // $num_enrolls=intval($enrolls);
        // $num_enrolls++;
        $rating = $_POST["rating"];
        echo 'checking',$rating;
        $num_raters= intval($raters);
        $num_enrolls=intval($enrolls);
        $num_rating=intval($rating);
        // echo is_int($num_raters),'  ',$num_raters,is_int($num_enrolls);
        $num_raters++;
        $rating=$num_rating/$num_raters;
        // echo 'hello' ,is_int($rating),$rating,is_int($num_raters);
        $sql_2="UPDATE `teacher` SET `rating`=$rating,`raters`='$num_raters'  WHERE id='$teacher_id'";
        $result_2 =mysqli_query($conn, $sql_2);
        // echo '<br> ff',is_int($num_rating),'second',is_int($num_raters),'bb<br>';
        if($result_2){
            echo 'rated';
        }
    
        header("Location:videos.php?id=$id");
        
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

    
    // $sql_5="SELECT * FROM `video` WHERE teacher_id='$teacher_id'";
    // $result_5=mysqli_query($conn, $sql_5);
    // if(!$result_5){
    //                 echo 'video error';
    //             }



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
    <link rel="stylesheet" href="videos.css">
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




    <!-------------------- Rating form ---------------------->
    <?php
            
          
      
            
            if(!$counter=mysqli_num_rows($result3)){
echo '<tr>';
echo '<td> <h1 class="display-1">no video found !!</h1>';
echo '</td>';
echo '</tr>';
            }else{
      
        
            include './vidoe_gallery/index.php'
        ?>


    <?php
   
    
?>

    <?php

                    // echo $count;
                    // echo mysqli_error($conn);
                    if(!mysqli_num_rows($result_3)){
                        
                    if(!mysqli_num_rows($result3)){
                        // echo "you rated me!!";
                    }else{

            ?>


    <form action="" method="post">

        <div class="rateyo " id="rating" data-rateyo-rating="4" data-rateyo-num-stars="5" data-rateyo-score="3">
        </div>
        <span class="result">0</span>
        <input type="hidden" name="rating">







        <br>
        <!-- <input type="text" name="rating"> -->


        <input type="submit" class="btn btn-warning btn-lg " name="rate" value="Rate me">




    </form>


    <?php

                    }
                    }
                    }
        ?>
    <!-------------------- Rating form ---------------------->







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

// if ($_SERVER["REQUEST_METHOD"] == "POST")
// {



//     $num_enrolls=intval($enrolls);
//     $num_enrolls++;
//     $num_raters= intval($raters);
//     echo is_int($num_raters),'fafas',$num_raters;
//     $num_raters++;
    
//     $rating = $_POST["rating"];

//     $sql_2="UPDATE `teacher` SET `rating`='$rating'/$num_raters,`raters`='$num_raters' ,`enrolls`='$num_enrolls' WHERE id='$teacher_id'";
//     $result_2 =mysqli_query($conn, $sql_2);

    
//     if ($result_1 && $result_2)
//     {
//         echo "New Rate addedddd successfully";
//     }
//     else
//     {
//         echo "Error: " . $sql . "<br>" . mysqli_error($conn);
//     }
//     mysqli_close($conn);
// }



// if(isset($_POST['add']))
// {


//     $sql_4 = "INSERT INTO `rated`(`student_id`, `teacher_id`) VALUES ('$id','$teacher_id')";    
//     $result_4 =mysqli_query($conn, $sql_4);
//     // $num_enrolls=intval($enrolls);
//     // $num_enrolls++;
//     $num_raters= intval($raters);
//     echo is_int($num_raters),'fafas',$num_raters;
//     $num_raters++;
    
//     $rating = $_POST["rating"];

//     $sql_2="UPDATE `teacher` SET `rating`='$rating'/'$num_raters',`raters`='$num_raters'  WHERE id='$teacher_id'";
//     $result_2 =mysqli_query($conn, $sql_2);

//     header("Location:videos.php?id=$id");
    
//     if ($result_1 && $result_2)
//     {
//         echo "New Rate addedddd successfully";
//     }
//     else
//     {
//         echo "Error: " . $sql . "<br>" . mysqli_error($conn);
//     }
//     mysqli_close($conn);
// }

?>