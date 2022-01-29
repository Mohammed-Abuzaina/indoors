<?php
session_start();
include '../init/connect.php';

?>

<?php
$id=$_SESSION['id'];
$sql="Select * from teacher where id='$id'";
$result=mysqli_query($conn,$sql);
$rows=mysqli_fetch_assoc($result);



?>



<?php
include 'header.php';
?>

<body>
    <!-- nav bar -->
    <?php

include 'navbar.php';

?>


    <div class="container mt-4">

        <table class=" border border-5 table  w-50 mx-auto">
            <tr>
                <td>

                    <form class="form-class" action="upload.php" method="post" enctype="multipart/form-data">
                        <div class="mx-auto">
                            <input class="form-control my-2" type="file" name="my_video">
                            <br>
                            <lable for="description">Add a description :</lable>
                            <input class="form-control" type="text" name="description" id="description">
                            <br>
                            <input class="form-control" type="hidden" name="subject" id="description"
                                value="<?=$rows['subject_1']?>">

                            <!-- <select name="subject" class="form-select bg-light" aria-label="Default select example">
                                <option> Subject name :</option>
                                <option value="<?=$rows['subject_1']?>"><?=$rows['subject_1']?></option>
                                <option value="<?=$rows['subject_2']?>"><?=$rows['subject_2']?></option>
                            </select> -->


                            <input class="form-control btn btn-success my-2" type="submit" name="submit" value="Upload">
                        </div>
                    </form>
                </td>
            </tr>

        </table>
    </div>




    <?php
include '../footer.php';
?>

</body>

</html>