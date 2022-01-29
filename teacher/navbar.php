<nav class="navbar navbar-expand-lg navbar-dark bg-darke">
    <div class="container-fluid">
        <img src="../imgs/logo2.png" class="rounded-circle" alt="Cinque Terre" width="5%">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="../home_page.php">Home page</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="teacher_profile.php?id=<?= $id; ?>">Teacher
                        profile</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="view.php?id=<?= $id; ?>">Videos</a>
                </li>


            </ul>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="dropdown ms-auto as ">
                    <a class="navbar-brand" href="teacher_profile.php?id=<?= $id; ?>"> <?= $rows['username']; ?></a>
                    <a class="dropdown-toggle ms-auto" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <img src="../uploads/<?=$rows['img'];?>" width="60vh" alt="">
                    </a>

                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <li>
                            <a class="dropdown-item ms-auto " href="update_teacher.php?id=<?=$id;?>">Update
                                profile</a>
                        </li>
                        <li><a class=" dropdown-item" href="#">Another action</a>
                        </li>
                        <li><a class="dropdown-item" href="logout.php">logout</a></li>
                    </ul>
                </div>


            </div>
        </div>
</nav>