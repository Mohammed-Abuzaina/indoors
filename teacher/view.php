<?php
session_start();
include '../init/connect.php';
$id=$_SESSION['id'];
?>


<?php

       
$query="SELECT * FROM `video` WHERE teacher_id='$id'";
$result=mysqli_query($conn,$query);

// echo $video;
// $show=mysqli_fetch_assoc($result);


$sql2="SELECT * FROM `teacher` where `id`='$id'";
$result2 = mysqli_query($conn,$sql2);
$rows=mysqli_fetch_assoc($result2);
$count=1;  
// var_dump($show); 
    

    
?>


<?php
include 'header.php';
?>

<body>


    <!-- nav bar -->
    <?php

include 'navbar.php';

?>


    <table class=" border border-5 table table-striped container-xl mx-auto mt-4">
        <tr>
            <td colspan="6">
                <a class="btn btn-success  d-grid btn-block " href="teacher_upload.php?id=<?=$id?>">Add New Video </a>
            </td>
        </tr>
        <?php
              if(mysqli_num_rows($result)==0){
              echo'  <tr>
                <td colspan="6">
                    <h1 class="display-1">NO Videos found</h1>
                </td>
            </tr>';
              }else{
            ?>
        <tr>
            <td colspan="6">
                <a class="btn btn-danger  d-grid btn-block " href="dashboard.php?id=<?=$id?>">Delete Video </a>
            </td>
        </tr>


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
                Subject Name
            </th>
        </tr>


        <?php
            
              }
            
        while($video = mysqli_fetch_assoc($result)){
        

        ?>


        <tr>
            <td>
                <?=  $count++;?>
            </td>

            <td>

                <?=$video['description']?>
            </td>


            <td colspan="3">
                <video src="../uploads/<?= $video['video_url']?>" width="40%" controls> </video>
            </td>


            <td>

                <?=$video['subject']?>
            </td>

        </tr>
        <?php
        
        }
        
        
    
    
?>

    </table>


    <?php
include '../footer.php';
?>






</body>

</html>