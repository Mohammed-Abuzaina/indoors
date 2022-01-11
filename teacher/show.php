<?php
session_start();
include '../init/connect.php';


?>
<?php
$id=$_SESSION['id'];
$subject=$_SESSION['subject'];
$sql="Select * from teacher where id='$id'";
$result=mysqli_query($conn,$sql);
$rows=mysqli_fetch_assoc($result);

$sql2="SELECT * FROM video WHERE subject='$subject' ";
$result2=mysqli_query($conn,$sql2);

if(isset($_POST['back'])){
    header("location:courses.php?id=".$id);
    unset($_SESSION['subject']);
}
if(!$result2){
    echo'error in video';
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
                Subject Name
            </th>
        </tr>

        <?php
    $count=1;  
while($row=mysqli_fetch_assoc($result2)){
    ?>

        <tr>
            <td> <?=$count++?> </td>
            <td> <?=$row['description']?> </td>
            <td colspan="3">
                <video src="../uploads/<?= $row['video_url']?>" width="40%" controls> </video>
            </td>

            <td> <?=$row['subject']?> </td>

        </tr>

        <?php
}
?>
        <form action="" method="post">
            <tr>
                <td colspan="6">
                    <input type="submit" name="back" value="Back to courses" class="btn btn-info d-grid btn-block ">
                </td>
            </tr>
        </form>

    </table>






    <!-- Footer -->
    <?php
include '../footer.php';
?>

</body>

</html>