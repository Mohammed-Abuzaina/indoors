<?php
session_start();
include '../init/connect.php';
?>
<?php
$id=$_SESSION['id'];

echo $id;

if(isset($_POST['submit']) && isset($_FILES['my_video']) && isset($_POST['description']) && isset($_POST['subject'])){
    // echo'<pre>';
    // print_r($_FILES['my_video']);
    $subject=$_POST['subject'];
    $_SESSION['subject']=$subject;
    $description=$_POST['description'];
    $video_name=$_FILES['my_video']['name'];
    $tmp_name=$_FILES['my_video']['tmp_name'];
    $error=$_FILES['my_video']['error'];

    if($error===0){
        $video_ex = pathinfo($video_name, PATHINFO_EXTENSION);
        // echo $video_ex;
        $video_ex_lc=strtolower($video_ex);
        $allowed_exs=array('mp4','avi','webm','flv');
        if(in_array($video_ex_lc,$allowed_exs)){
            
            $new_video_name=uniqid("video_",TRUE).'.'.$video_ex_lc;
            $video_upload_path='../uploads/'.$new_video_name;
            move_uploaded_file($tmp_name,$video_upload_path);
            $sql="INSERT INTO `video`(`video_url`,`description`,`teacher_id`,`subject`) VALUES ('$new_video_name','$description','$id','$subject') ";
           $result= mysqli_query($conn,$sql);
           if($result){
                echo 'yes';
            }else{
                
                echo mysqli_error($conn), 'error';
                echo 
                $sql;
           }
            header("Location:view.php?id=".$id);
        }else{
            $em="You can't upload files of this type !";
            header("Location: teacher_upload.php?error='$em'" );

        }
        

    }
}else{
    echo'no';

    // header("Location: teacher_upload.php" );
}

// //////////////////////////////////////////////////////////////////////////////////////////
// //////////////////////////////////////////////////////////////////////////////////////////
// //////////////////////////////////////////////////////////////////////////////////////////
// //////////////////////////////////////////////////////////////////////////////////////////
// //////////////////////////////////////////////////////////////////////////////////////////

?>