<?php

include './init/connect.php';
// echo $_SESSION['id'];
// echo '<br>';
 $teacher_id=$_SESSION['teacher_id'];
?>
<?PHP
 $id=$_SESSION['id'];
 $sql="SELECT * from student where id='$id'";
 $result=mysqli_query($conn,$sql);
 $rows=mysqli_fetch_assoc($result);
 $count=1;


 $sql="SELECT * from teacher where id='$teacher_id'";
 $result=mysqli_query($conn,$sql);
 $roww=mysqli_fetch_assoc($result);
?>






<div class="playlist">
    <div class="contain ">
        <h6 class="display-6"> course : </h6>
        <h6 class="display-6"><?= $roww['subject_1']?> </h6>
    </div>


    <br>
    <div class="contain">
        <div class="video-links-container">

            <?php
$sql="SELECT * FROM video where teacher_id='$teacher_id'";
$result=mysqli_query($conn,$sql);
$count=1;
while ($row=mysqli_fetch_assoc($result)){
    ?>
            <a href="./uploads/<?=$row['video_url']?>" class="video-links"><?= $count++ ;?>.<?=$row['description']?></a>
            <?php 
            }
               
                ?>
        </div>
        <div class="video-container">
            <video src="./vidoe_gallery/images/video-1.mp4" loop muted controls class="video">
            </video>


        </div>

    </div>
</div>



<script>
document.querySelectorAll('.video-links').forEach(links => {
    links.addEventListener('click', (e) => {
        e.preventDefault();
        var src = links.getAttribute('href');
        document.querySelector('.video').src = src;
        document.querySelector('.video').play();
    });
});
</script>