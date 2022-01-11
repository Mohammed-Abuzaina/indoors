<?php
session_start();
include '../init/connect.php';
// echo $_SESSION['id'];
?>


<?php

if(isset($_POST['delete'])){
    $id_teacher=$_POST['id_student'];
    $sql="Delete from student where id='$id_teacher'";
    echo $id_student,$sql;
    $result=mysqli_query($conn,$sql);
    if(!$result){
        echo 'error';
    }
    header("Location:../cooladmin/student_dashboard.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Dashboard</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">

                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>

                            <a href="index.html">Dashboard 1</a>


                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                    <img src="images/icon/logo.png" alt="Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="active has-sub">
                            <a class="js-arrow" href="admin_dashboard.php">
                                <i class="fas fa-tachometer-alt"></i>Dashboard For teacher
                            </a>
                            <a class="js-arrow" href="student_dashboard.php">
                                <i class="fas fa-tachometer-alt"></i>Dashboard For Student
                            </a>




                        </li>
                    </ul>
                    </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="" method="POST">
                                <input class="au-input au-input--xl" type="hidden" name="search"
                                    placeholder="Search for datas &amp; reports..." />

                            </form>
                            <div class="header-button">

                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            <img src="images/icon/avatar-01.jpg" alt="John Doe" />
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#">john doe</a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        <img src="images/icon/avatar-01.jpg" alt="John Doe" />
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#">john doe</a>
                                                    </h5>
                                                    <span class="email">johndoe@example.com</span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-account"></i>Account</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-settings"></i>Setting</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-money-box"></i>Billing</a>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="login.php" name="">
                                                    <i class="zmdi zmdi-power"></i>Logout
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">



                                    <?php
$sql="SELECT * FROM student";
$result=mysqli_query($conn,$sql);
$count=1;

?>












                                    <table class="table">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Username</th>
                                                <th scope="col">E-mail</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                        while($rows=mysqli_fetch_assoc($result)){
                                        ?>
                                            <form action="" method="post" enctype="multipart/form">
                                                <tr>
                                                    <th scope="row"><?=$count++;?></th>
                                                    <td><?=$rows['username'];?></td>
                                                    <td><?=$rows['email'];?></td>

                                                    <td>
                                                        <input type="hidden" name="id_student" class="btn btn-primary"
                                                            value=" <?=$rows['id'];?> ">
                                                        <input type="submit" name="delete" class="btn btn-danger"
                                                            value="delete">

                                                    </td>
                                                </tr>
                                            </form>

                                            <?php
                                        }
                                        ?>

                                        </tbody>
                                    </table>















                                    <!-- END MAIN CONTENT-->
                                    <!-- END PAGE CONTAINER-->
                                </div>

                            </div>

                            <!-- Jquery JS-->
                            <script src="vendor/jquery-3.2.1.min.js"></script>
                            <!-- Bootstrap JS-->
                            <script src="vendor/bootstrap-4.1/popper.min.js"></script>
                            <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
                            <!-- Vendor JS       -->
                            <script src="vendor/slick/slick.min.js">
                            </script>
                            <script src="vendor/wow/wow.min.js"></script>
                            <script src="vendor/animsition/animsition.min.js"></script>
                            <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
                            </script>
                            <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
                            <script src="vendor/counter-up/jquery.counterup.min.js">
                            </script>
                            <script src="vendor/circle-progress/circle-progress.min.js"></script>
                            <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
                            <script src="vendor/chartjs/Chart.bundle.min.js"></script>
                            <script src="vendor/select2/select2.min.js">
                            </script>

                            <!-- Main JS-->
                            <script src="js/main.js"></script>

</body>

</html>
<!-- end document-->