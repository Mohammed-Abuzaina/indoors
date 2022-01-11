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
                <div class="card w-75">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <a href="#" class="btn btn-primary">Button</a>
                    </div>
                </div>

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