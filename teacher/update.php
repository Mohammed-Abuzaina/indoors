<?php
session_start();
include '../init/connect.php';
?>
<?php
$id=$_SESSION['id'];

if(isset($_POST['update'])){
    
//////////////////
    $target="../uploads/".basename($_FILES['image']['name']);
    $image=$_FILES['image']['name'];
    // $text=$_POST['text'];
    // $sql = "INSERT INTO `img`( `image`, `text`) VALUES ('$image','$text')";
    // $sql = "UPDATE `teacher` SET `image`='$image'";
    // $result=mysqli_query($conn,$sql);
    // if(!$result){
    //     echo 'no sql';
    // }
   
////////////////////





    $username=$_POST['username'];
    $email=$_POST['email'];
    $phone_number=$_POST['phone_number'];
    $university=$_POST['university'];
    $major=$_POST['major'];
    $price=$_POST['price'];
    $subject_1=$_POST['subject_1'];
    $subject_2=$_POST['subject_2'];
    
    $sql="UPDATE `teacher` SET 
    `username`='$username',
    `email`='$email',
    `phone_number`='$phone_number',
    `university`='$university',
    `major`='$major',
    `price`='$price',
    `subject_1`='$subject_1',
    `subject_2`='$subject_2',
    `img`='$image'
     WHERE id='$id'
     ";

     $result=mysqli_query($conn,$sql);

     if(!$result){
        echo mysqli_error($conn);
     }else{
         header("Location:update_teacher.php?id=".$id);
     }

     if(move_uploaded_file($_FILES['image']['tmp_name'],$target)){
        echo 'yes';
     }
     else{
         echo 'no';
     }
}



?>