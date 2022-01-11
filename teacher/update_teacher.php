<?php
session_start();
include '../init/connect.php';
?>

<?php
    $id=$_SESSION['id'];
    echo $id;
    $sql="SELECT * from teacher where id = '$id'";
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

        <!-- <form class="form-class" action="upload.php" method="post" enctype="multipart/form-data"> -->
        <form class="form-class" action="update.php" method="post" enctype="multipart/form-data">

            <table class=" border border-5 table table-striped w-50 mx-auto">
                <tr>
                    <td colspan="2">
                        <div class="vstack col-md-5 mx-auto">
                            <h1>update_teacher</h1>
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
                            <input type="text" name='id' class="form-control" value="<?=$rows['id']?>" disabled>

                            <input type="text" name="username" class="form-control" value="<?=$rows['username']?>">
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
                            <input type="email" name="email" class="form-control" value="<?=$rows['email']?>">
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
                            <input type="text" name="phone_number" class="form-control"
                                value="<?=$rows['phone_number']?>">
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
                            <input type="text" name="university" class="form-control" value="<?=$rows['university']?>">
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
                            <input type="text" name="major" class="form-control" value="<?=$rows['major']?>">
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
                            <input type="text" name="subject_1" class="form-control" value="<?=$rows['subject_1']?>">
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
                            <input type="text" name="subject_2" class="form-control" value="<?=$rows['subject_2']?>">
                        </div>
                    </td>
                </tr>

                <!--  row -->
                <tr>
                    <td>upload image </td>
                    <td>


                        <!-- <form class="form-class" action="upload.php" method="post" enctype="multipart/form-data"> -->
                        <div class="mx-auto">
                            <!-- <input class="form-control my-2" type="file" name="my_img"> -->
                            <input class="form-control my-2" type="file" name="image">


                            <br>

                            <!-- <input class="form-control btn btn-primary my-2" type="submit" name="submit"
                                    value="Upload"> -->
                        </div>
                        <!-- </form> -->
                    </td>
                </tr>





                <!--  row -->
                <tr>
                    <td colspan="2">
                        <div class="col-auto">
                            <input type="submit" name="update" class="form-control btn btn-success"
                                value="update Profile">
                        </div>
                    </td>
                </tr>



            </table>
        </form>

        <?php
}
}else
echo "ERROR";
?>

    </div>


    <?php
include '../footer.php';
?>







</body>

</html>