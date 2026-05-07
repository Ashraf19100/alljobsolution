<?php 
require_once 'database/database.php';
    

?>
<div class="col-md-3 col-lg-2 bg-light min-vh-100 p-3 shadow-sm">

    <!-- 🔷 Logo -->
    <div class="text-center mb-4">
        <img src="assets/img/logo.png" class="img-fluid" style="max-height:50px;">
    </div>

    <!-- 👤 User Info -->
    <div class="card border-0 shadow-sm mb-4 text-center">
        <div class="card-body">
            <img src="uploads/img/<?php echo $_SESSION['profile_image']; ?>" 
                 class="rounded-circle mb-2" width="80" height="80">

            <h6 class="text-info mb-0 text-capitalize">
                <?php echo $_SESSION['name']; ?>
            </h6>

            <small class="text-muted">
                <?php echo $_SESSION['email']; ?>
            </small>
        </div>
    </div>

    <!-- 📋 Navigation -->
    <ul class="nav flex-column">

        <li class="nav-item">
            <a class="nav-link text-dark" href="index.php?page=home">
                <i class="fa fa-home me-2 text-info"></i> Home
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link text-dark" href="index.php?page=dashboard">
                <i class="fa fa-dashboard me-2 text-info"></i> Dashboard
            </a>
        </li>

        <!-- 👇 User Info Collapse -->
        <li class="nav-item">
            <a class="nav-link text-dark d-flex justify-content-between align-items-center"
               data-bs-toggle="collapse" href="#userMenu">
                <span><i class="fa fa-user me-2 text-info"></i> User Info</span>
                <i class="fa fa-angle-down"></i>
            </a>

            <div class="collapse ps-3" id="userMenu">
                <ul class="nav flex-column">
                    <li><a class="nav-link text-muted" href="index.php?page=personalinfo">Personal Info</a></li>
                    <li><a class="nav-link text-muted" href="index.php?page=educationalinfo">Education</a></li>
                    <li><a class="nav-link text-muted" href="index.php?page=profileinfo">Profile</a></li>
                    <li><a class="nav-link text-muted" href="index.php?page=experience">Experience</a></li>
                </ul>
            </div>
        </li>
        <?php if($_SESSION['role'] == 'employer'){?>
        <li class="nav-item">
            <a class="nav-link text-dark d-flex justify-content-between align-items-center"
               data-bs-toggle="collapse" href="#managejob">
                <span><i class="fa fa-user-cog me-2 text-info"></i> Manage Job Post</span>
                <i class="fa fa-angle-down"></i>
            </a>
            <div class="collapse ps-3" id="managejob">
                <ul class="nav flex-column">
                    <li><a class="nav-link text-muted" href="">user list</a></li>
                    <li><a class="nav-link text-muted" href="index.php?page=postjob">Post job list</a></li>
                    <li><a class="nav-link text-muted" href="">Admit Card action</a></li>
                    <li><a class="nav-link text-muted" href="">Comapnies</a></li>
                </ul>
            </div>
        </li>
        <?php }  ?>
        <?php if($_SESSION['role'] == 'job_seeker'){?>
        <li class="nav-item">
            <a class="nav-link text-dark" href="index.php?page=resumeupload">
                <i class="fa fa-file me-2 text-info"></i> My Resume
            </a>
        </li>

        <!-- 👇 Job Collapse -->
        <li class="nav-item">
            <a class="nav-link text-dark d-flex justify-content-between align-items-center"
               data-bs-toggle="collapse" href="#jobMenu">
                <span><i class="fa fa-briefcase me-2 text-info"></i> Find Job</span>
                <i class="fa fa-angle-down"></i>
            </a>

            <div class="collapse ps-3" id="jobMenu">
                <ul class="nav flex-column">
                    <li><a class="nav-link text-muted" href="index.php?search=gov">Government Job</a></li>
                    <li><a class="nav-link text-muted" href="index.php?search=nonn_gov">Private Job</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link text-dark" href="#">
                <i class="fa fa-id-card me-2 text-info"></i> Admit Card
            </a>
        </li>
        <?php }  ?>
        

        <li class="nav-item">
            <a class="nav-link text-dark" href="#">
                <i class="fa fa-bell me-2 text-info"></i> Notice
            </a>
        </li>

        <li class="nav-item mt-3">
            <a class="nav-link text-danger" href="index.php?page=logout">
                <i class="fa fa-sign-out me-2"></i> Logout
            </a>
        </li>

    </ul>
</div>
