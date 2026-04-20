<?php 
require_once 'database/database.php';
    $userinfo = new datamodel();
    $condition = " WHERE id ='".$_SESSION['id']."'";
    $userprofile = $userinfo->getData('users', ' * ', $condition);
    if(isset($userprofile)){
    foreach($userprofile as $row){
        foreach($row as $key => $val){
            $profile[$key] = $val;
        }
    }
}

?>

<div class="col-md-2">
    <div class="logo">
        <img src="assets/img/logo.png" alt="">
    </div>    
    <div class="user_info d-flex bg-light p-1">
        <div class="profile-img w-25">
            <img src="uploads/img/<?= $profile['profile_image'] ?>" style="" class="img-fluid rounded-circle" alt="">
        </div>
        <div class="user-id">
            <p class="text-info fw-bold"><?php print($_SESSION['name']);  ?></p>
            <p class="text-gray fw-light"><?php print($_SESSION['email']);  ?></p>
        </div>
    </div>
    <div class="side-navbar bg-light">
        <ul>
            <li><a href="index.php?page=home">Home</a></li>
            <li class="nasted-nav"><a href="" >User Information</a><button id='nav-btn' class="btn btn-info  navbutton">+</button>
                <ul class="side-subnav " id="sub_nav">
                    <li><a href="index.php?page=personalinfo">Perrsonal Inforrmation</a></li>
                    <li><a href="index.php?page=educationalinfo">Education</a></li>
                    <li><a href="index.php?page=profileinfo">profile</a></li>
                </ul>
            </li>
            <li><a href="index.php?page=resumeupload">my resume</a></li>
            <li><a href="">Admit Card</a></li>
            <li><a href="">Notice</a></li>
            
            <li class="nasted-nav"><a href="">find job</a><button id='nav-btn2'class="btn btn-info navbutton">+</button>
                <ul class="side-subnav" id="sub_nav2">
                    <li><a href="">Government Job</a></li>
                    <li><a href="">Private Job</a></li>
                </ul>
            </li>
            <li><a href="index.php?page=logout">logout</a></li>
        </ul>
    </div>
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