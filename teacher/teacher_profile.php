<?php
session_start();
include '../init/connect.php';
// echo $_SESSION['id'];
?>

<?php
    $id= $_SESSION['id'];
    // echo $id;
if(isset($_POST['add'])){
    // $id=$_POST['id'];
    header('Location:teacher_upload.php?id='.$id);
}


$sql="SELECT * FROM `teacher` WHERE id='$id'";

// echo $sql;
$result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){
    while($rows=mysqli_fetch_assoc($result)){
        
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

        <form action="" method="post">

            <table class=" border border-5 table table-striped w-50 mx-auto">
                <tr>
                    <td colspan="2">
                        <div class="vstack col-md-5 mx-auto">
                            <input type="submit" name="add" class="btn btn-success" value="Add video">
                            </input>
                        </div>
                    </td>
                </tr>
                <!--  row -->
                <tr>
                    <td>
                        Username
                    </td>
                    <td>

                        <div class="col-auto">
                            <input type="text" name='id' class="form-control" value="<?=$rows['id']?>">

                            <input type="text" class="form-control" value="<?=$rows['username']?>" disabled>
                        </div>

                    </td>
                </tr>

                <!--  row -->
                <tr>
                    <td>
                        Email
                    </td>
                    <td>
                        <div class="col-auto">
                            <input type="email" class="form-control" value="<?=$rows['email']?>" disabled>
                        </div>
                    </td>
                </tr>

                <!--  row -->
                <tr>
                    <td>
                        phone nubmer
                    </td>
                    <td>
                        <div class="col-auto">
                            <input type="text" class="form-control" value="<?=$rows['phone_number']?>" disabled>
                        </div>
                    </td>
                </tr>

                <!--  row -->
                <tr>
                    <td>
                        University
                    </td>
                    <td>
                        <div class="col-auto">
                            <input type="text" class="form-control" value="<?=$rows['university']?>" disabled>
                        </div>
                    </td>
                </tr>

                <!--  row -->
                <tr>
                    <td>
                        Major
                    </td>
                    <td>
                        <div class="col-auto">
                            <input type="text" class="form-control" value="<?=$rows['major']?>" disabled>
                        </div>
                    </td>
                </tr>
                <!--  row -->
                <tr>
                    <td>
                        price
                    </td>
                    <td>
                        <div class="col-auto">
                            <input type="number" class="form-control" value="<?=$rows['price']?>" disabled>
                        </div>
                    </td>
                </tr>

                <!--  row -->
                <tr>
                    <td>
                        Subject -1
                    </td>
                    <td>
                        <div class="col-auto">
                            <input type="text" class="form-control" value="<?=$rows['subject_1']?>" disabled>
                        </div>
                    </td>
                </tr>

                <!--  row -->
                <tr>
                    <td>
                        Subject -2
                    </td>
                    <td>
                        <div class="col-auto">
                            <input type="text" class="form-control" value="<?=$rows['subject_2']?>" disabled>
                        </div>
                    </td>
                </tr>


            </table>
        </form>

        <?php
}
}else
echo mysqli_error($conn);
?>

    </div>


    <?php
include '../footer.php';
?>







</body>

</html>