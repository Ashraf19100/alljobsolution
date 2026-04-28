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
            <a class="nav-link text-dark" href="index.php?employer=">
                <i class="fa fa-file me-2 text-info"></i> user list
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-dark" href="index.php?employer=">
                <i class="fa fa-file me-2 text-info"></i> post jobs
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-dark" href="index.php?employer=">
                <i class="fa fa-file me-2 text-info"></i>active Admit card
            </a>
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
        <?php }  ?>
        <li class="nav-item">
            <a class="nav-link text-dark" href="#">
                <i class="fa fa-id-card me-2 text-info"></i> Admit Card
            </a>
        </li>

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

<!-- ALTER TABLE jobs
ADD COLUMN jsc_active TINYINT,
ADD COLUMN jsc_required TINYINT,
ADD COLUMN ssc_active TINYINT,
ADD COLUMN ssc_required TINYINT,
ADD COLUMN hsc_active TINYINT,
ADD COLUMN hsc_required TINYINT,
ADD COLUMN gra_active TINYINT,
ADD COLUMN gra_required TINYINT,
ADD COLUMN mas_active TINYINT,
ADD COLUMN mas_required TINYINT,
ADD COLUMN mph_active TINYINT,
ADD COLUMN mph_required TINYINT,
ADD COLUMN mph_running TINYINT,
ADD COLUMN phd_active TINYINT,
ADD COLUMN phd_required TINYINT,
ADD COLUMN phd_running TINYINT,
ADD COLUMN job_exp_active TINYINT,
ADD COLUMN job_exp_required TINYINT,
ADD COLUMN min_job_exp_year INT,
ADD COLUMN post_active TINYINT,
ADD COLUMN app_start_time DATETIME,
ADD COLUMN app_end_time DATETIME AFTER `deadline`;




INSERT INTO jobs (
company_id, title, description, requirements, salary, location, deadline,
jsc_active, jsc_required, ssc_active, ssc_required, hsc_active, hsc_required,
gra_active, gra_required, mas_active, mas_required, mph_active, mph_required, mph_running,
phd_active, phd_required, phd_running,
job_exp_active, job_exp_required, min_job_exp_year,
post_active, app_start_time, app_end_time
) VALUES

(1, 'Junior PHP Developer', 'Develop web apps', 'PHP, MySQL', '30000', 'Dhaka', '2026-12-31',
1,1,1,1,1,1,0,0,0,0,0,0,0,0,0,0,
1,1,1,1,'2026-01-01','2026-06-30'),

(2, 'Frontend Developer', 'Build UI', 'HTML, CSS, JS', '25000', 'Dhaka', '2026-11-30',
1,0,1,1,1,1,0,0,0,0,0,0,0,0,0,0,
0,0,0,1,'2026-02-01','2026-07-30'),

(3, 'Laravel Developer', 'Backend development', 'Laravel, API', '40000', 'Chittagong', '2026-10-15',
1,1,1,1,1,1,1,1,0,0,0,0,0,0,0,0,
1,1,2,1,'2026-03-01','2026-08-30'),

(4, 'Software Engineer', 'Full stack dev', 'OOP, MVC', '50000', 'Dhaka', '2026-09-20',
1,1,1,1,1,1,1,1,1,1,0,0,0,0,0,0,
1,1,3,1,'2026-01-15','2026-07-15'),

(5, 'Data Analyst', 'Analyze data', 'SQL, Excel', '35000', 'Sylhet', '2026-08-30',
1,0,1,1,1,1,1,0,0,0,0,0,0,0,0,0,
1,0,1,1,'2026-02-10','2026-06-20'),

(6, 'QA Engineer', 'Testing software', 'Manual & Automation', '30000', 'Khulna', '2026-12-01',
1,0,1,1,1,1,0,0,0,0,0,0,0,0,0,0,
1,1,1,1,'2026-01-05','2026-05-30'),

(7, 'DevOps Engineer', 'Manage CI/CD', 'Docker, AWS', '60000', 'Dhaka', '2026-07-25',
1,1,1,1,1,1,1,1,1,1,1,0,0,0,0,0,
1,1,4,1,'2026-02-01','2026-06-01'),

(8, 'Mobile App Developer', 'Android apps', 'Java/Kotlin', '45000', 'Rajshahi', '2026-11-10',
1,0,1,1,1,1,1,0,0,0,0,0,0,0,0,0,
1,1,2,1,'2026-03-10','2026-09-01'),

(9, 'UI/UX Designer', 'Design interfaces', 'Figma, Adobe XD', '28000', 'Dhaka', '2026-10-05',
1,0,1,1,1,0,0,0,0,0,0,0,0,0,0,0,
0,0,0,1,'2026-01-20','2026-05-15'),

(10, 'System Administrator', 'Maintain servers', 'Linux, Networking', '42000', 'Barisal', '2026-09-01',
1,1,1,1,1,1,1,0,0,0,0,0,0,0,0,0,
1,1,3,1,'2026-02-15','2026-07-10');-->