<?php
session_start();
include '../init/connect.php';
// echo $_SESSION['id'];
include 'header.php';

?>


<?PHP
$id=$_SESSION['id'];

$sql="Select * from teacher where id='$id'";
$result=mysqli_query($conn,$sql);
$rows=mysqli_fetch_assoc($result);
?>


<body>

    <?php include 'navbar.php';?>



    <table class=" border border-5 table table-striped w-50 mx-auto">
        <tr>
            <th>#</th>
            <th>
            </th>
            <th>Subject Name </th>
            <th>Video </th>
            <th> Action</th>
        </tr>
        <?php
$query="select * from video where teacher_id='$id'";
$result1=mysqli_query($conn,$query);
$count=1;

while($row=mysqli_fetch_assoc($result1)){
    if(!$row){
        echo '<tr><td><h5>no video in database</h1></tr></td>';
    }
?>
        <form action="delete.php" method="post">
            <tr>
                <td><?=$count++?></td>
                <td></td>
                <td><?=$row['subject']?></td>
                <td>
                    <input class="form-control" type="hidden" name="id_video" value="<?=$row['id']?>">
                    <!-- <input class="form-control" type="text" value="<?=$row['video_url']?>"> -->
                    <video src="../uploads/<?= $row['video_url']?>" width="40%" controls> </video>

                </td>
                <td>
                    <input class="form-control btn btn-danger" type="submit" name="delete" value="delete">
                </td>
            </tr>

        </form>


        <?PHP
}
?>
    </table>






















    <?php include '../footer.php';?>

</body>

</html>