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
ADD COLUMN app_end_time DATETIME; -->