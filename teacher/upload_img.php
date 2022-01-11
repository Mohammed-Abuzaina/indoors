<?php
session_start();
include '../init/connect.php';
?>

<?php


if(isset($_POST['my_img']) && $_POST['update']){
    // echo'<pre>';
    // print_r($_FILES['my_video']);
    $img_name=$_FILES['my_img']['name'];
    $tmp_name=$_FILES['my_img']['tmp_name'];
    $error=$_FILES['my_img']['error'];

    if($error===0){
        $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
        // echo $video_ex;
        $img_ex_lc=strtolower($img_ex);
        $allowed_exs=array('png','jpg','jpeg');
        if(in_array($img_ex_lc,$allowed_exs)){
            
            $new_img_name=uniqid("img_",TRUE).'.'.$img_ex_lc;
            $img_upload_path='../uploads/'.$new_img_name;
            move_uploaded_file($tmp_name,$img_upload_path);
            $sql="UPDATE `teacher` SET `img`='$new_img_name' WHERE id='$id' ";
           $result= mysqli_query($conn,$sql);
           if($result){
                echo 'yes';
            }else{
                
                echo mysqli_error($conn), 'error';
                echo 
                $sql;
           }
            // header("Location:teacher_profile.php");
        }else{
            $em="You can't upload files of this type !";
            // header("Location: teacher_profile.php?error='$em'" );

        }
        

    }
}else{
    echo mysqli_error($conn);

    // header("Location: teacher_upload.php" );
}


?>