<?php
    require_once 'database/database.php';
    $applicationpreview = new datamodel();
    
    $applicant_personalinfo =  $applicationpreview->getSingleData('user_details', ' * ', ' WHERE user_id = '.$_SESSION['id'] );
    $applicant_education=  $applicationpreview->getData('user_education', ' * ', ' WHERE user_id = '.$_SESSION['id'] );
    $applicant_experience =  $applicationpreview->getData('user_experience', ' * ', ' WHERE user_id = '.$_SESSION['id'] );
    if(!empty($_GET['ji'])){
        $applied_positions =$applicationpreview->getSingleData('jobs', ' * ', ' WHERE id ='.$_GET['ji']);
    }
    
    
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1.0" />
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>job solution</title>
	<meta name="description" content="">
	<link rel="shortcut icon" href="" type="image/x-icon" />
	<!--=== Reset Css ===-->
	<link rel="stylesheet" href="assets/css/normalize.css">
	<!--=== Animate ===-->
	<link rel="stylesheet" href="assets/css/plugin/animate.css">
	<!--=== Hover Animation ===-->
	<link rel="stylesheet" href="assets/css/plugin/hover-min.css">
	<!-- Icofont -->
	<link rel="stylesheet" href="assets/icofont/icofont.min.css">
	<!--=== Bootstrap ===-->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<!--=== Fontawesome icon ===-->
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
	<!-- ================= *** Icofont CSS *** ================== -->
	<link href="assets/css/icofont.css" rel="stylesheet" type="text/css">
	<!-- ================= *** Meanmenu CSS *** ===================== -->
	<link href="assets/css/meanmenu.css" rel="stylesheet" type="text/css">
	<!-- ================= *** AOS CSS *** ===================== -->
	<link href="assets/css/plugin/aos.css" rel="stylesheet">
	<!--=== Owl carousel ===-->
	<link rel="stylesheet" href="assets/css/plugin/owl.carousel.min.css">
	<!--=== Magnific PopUp ===-->
	<link rel="stylesheet" href="assets/css/plugin/magnific-popup.css">
	<!-- ================= *** Common CSS *** ========================== -->
	<link href="assets/css/common.css" rel="stylesheet" type="text/css">
	<!--=== Main Css ===-->
	<link rel="stylesheet" href="assets/css/style.css" type="text/css">
	<!-- Google Lato Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700;900&display=swap" rel="stylesheet">
	<!--=== Responsive Css ===-->
	<link rel="stylesheet" href="assets/css/responsive.css">
	<script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
	  <!-- Bootstrap -->
 	 <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"> -->
	  <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body>
<style>
    .section-title {
        border-left: 5px solid #198754;
        padding-left: 10px;
        font-weight: 600;
    }
    .info-table th {
        width: 30%;
        background-color: #f8f9fa;
    }
    .card-custom {
        border-radius: 12px;
    }
    .badge-title {
        font-size: 14px;
        letter-spacing: 1px;
    }
    .profile-wrapper {
        width: 260px;
        height: 260px;
        display: inline-block;
        padding: 5px;
        border-radius: 50%;
        background: linear-gradient(135deg, #198754, #20c997);
    }

    .profile-img {
        width: 250px;
        height: 250px;
        object-fit: cover;
        border-radius: 50%;
        border: 4px solid #fff;
    }
    .paper_top{
        width: 100%;
        height: 70px;
        
    }
</style>
         <?php if(isset($_GET['message'])){ 
                                        echo  '<div class="alert alert-danger text-center">'.$_GET['message'].'</div>';
                                    } ?>

            <div class="">            
                <div class="container p-4 ">
                       
                        <!-- HEADER -->
                         
                        <div class="text-center mb-4">
                            <h2 class="text-success fw-bold">
                                Application Preview
                            </h2>
                            <span class="badge bg-success badge-title text-capitalize px-3 py-2">
                                <?= $_SESSION['name'] ?? ' ' ?>
                            </span>
                        </div>
                        <table class="table table-bordered align-middle info-table">
                            <td>
                                <img 
                                    src="uploads/img/<?= $_SESSION['profile_image'] ?? ' ' ?>" 
                                    alt="Profile Image" 
                                    width="200"
                                    height="200"
                                >
                            </td>
                            <td >
                                <table class="table table-bordered align-middle info-table">
                                    <tr><th>Email:</th><td><?=$_SESSION['email'] ?? ' '  ?></td></tr>
                                    <tr><th>Phone:</th><td><?=$_SESSION['phone'] ?? ' '  ?></td></tr>
                                    <tr><th>Applied Positions:</th><td><?=$applied_positions->title ?? ' '  ?></td></tr>
                                    
                                </table>
                                
                            </td>
                        </table>
                <!-- PERSONAL INFO -->
                <div class="mb-5">
                    <h5 class="text-success section-title mb-3">Personal Information</h5>
                    <div class="table-responsive">
                         <table class="table table-bordered align-middle info-table">
                            <tr>
                                <th>Full Name:</th><td colspan="7"><?= $_SESSION['name'] ?? ' ' ?></td>
                            </tr>
                            <tr>
                                <th>Father Name</th><td colspan="3"><?= $applicant_personalinfo->father_name ?? ' ' ?></td>
                                <th>Mother Name</th><td colspan="3"><?= $applicant_personalinfo->mother_name ?? ' ' ?></td>
                            </tr>
                            <tr>
                                <th>Gender</th><td><?= $applicant_personalinfo->gender ?? ' ' ?></td>
                                <th>BirthDate</th><td><?= $applicant_personalinfo->dob ?? ' ' ?></td>
                                <th>Religion</th><td><?= $applicant_personalinfo->religion ?? ' ' ?></td>
                                <th>Nationality</th><td><?= $applicant_personalinfo->nationality ?? ' ' ?></td>
                            </tr>
                            <tr>
                                <th>Marital Status</th><td colspan="3"><?= $applicant_personalinfo->marital_status ?? ' ' ?></td>
                                <th>NID</th><td colspan="3"><?= $applicant_personalinfo->nid ?? ' ' ?></td>
                            </tr>
                            <tr>
                                <th>Birth Reg.</th><td colspan="3"><?= $applicant_personalinfo->birth_registration ?? ' ' ?></td>
                                <th>Passport</th><td colspan="3"><?= $applicant_personalinfo->passport_no ?? ' '?></td>
                            </tr>
                            <tr>
                                <th>Address</th><td colspan="7" ><?= $applicant_personalinfo->address ?? ' '?></td>
                            </tr>
                        </table> 
                    </div>
                </div>
                
                <!-- SSC -->
                <div class="mb-5">
                    <h5 class="text-success section-title mb-3"><?= $education_level['exam_name'] ?? ' ' ?> Information</h5>
                    <div class="table-responsive">
                        <table class="table table-bordered align-middle info-table">
                            <tr>
                                <th>Exam</th>
                                <th>Board/university</th>
                                <th>Roll/Id</th>
                                <th>Subject</th>
                                <th>Result</th>
                                <th>Year</th>
                            </tr>
                            <?php foreach($applicant_education as $education_level) { ?>
                            <tr>
                                <td>
                                    <?php $exam_name =  $applicationpreview->getSingleData('bachelor_degrees', ' * ', ' WHERE id ='.$education_level['exam_name'])?>
                                    <?= $exam_name->degree_name ?? ' '?></td>
                                <td><?= $education_level['uni_board'] ?? ' '?></td>
                                <td><?= $education_level['roll_id'] ?? ' '?></td>
                                <td><?php $subject_name =  $applicationpreview->getSingleData('bachelor_departments', ' * ', ' WHERE id ='.$education_level['subject'])?>
                                    <?= $subject_name->department_name ?? ' '?></td>
                                <td><?= $education_level['result'] ?? ' '?></td>
                                <td><?= $education_level['passing_year'] ?? ' '?></td>
                            </tr>
                            <?php } ?>
                        </table>
                    </div>
                </div>
                
                

                <!-- EXPERIENCE -->
                <div class="mb-5">
                    <h5 class="text-success section-title mb-3">Experience</h5>
                     
                     
                        
                    <div class="table-responsive">
                        <table class="table table-bordered align-middle info-table">
                            <tr><th>Company</th><th>Job Title</th><th>Type</th><th>Start</th><th>End</th><th>Location</th><th>Description</th>
                        </tr>
                        <?php foreach ($applicant_experience as $applicant_experience) { ?>
                            <tr>
                                <td><?= $applicant_experience['company_name'] ?? ' '?></td>
                                <td><?= $applicant_experience['job_title'] ?? ' '?></td>
                                <td><?= $applicant_experience['company_type'] ?? ' '?></td>
                                <td><?= $applicant_experience['start_date'] ?? ' '?></td>
                                <td><?= $applicant_experience['end_date'] ?? 'Running' ?? ' '?></td>
                                <td><?= $applicant_experience['location'] ?? ' '?></td>
                                <td><?= $applicant_experience['description'] ?? ' '?></td>
                            </tr>
                                <?php } ?>
                        </table>
                    </div>
                    
                </div>
                <div class="w-25 text-center">
                        <img 
                            src="uploads/signature/<?= $_SESSION['signature'] ?? ' '?>" 
                            alt="Profile Image" 
                            class=" shadow"
                            width="150"
                            height="150"
                        >
                        <p class="fs-5 fw-5 text-dark"  >Signature</p>

                </div>
                <div class="text-center">
                    <?= isset($_GET['u_i']) ? '<a  href="index.php?page=application_submit&download='.$_GET['u_i'].'" class="btn btn-success px-4 shadow w-25 text-center">Download</a>' : '' ?>
                </div>
                
            </div>
            
        </div>
        
        
<script>
		var preload= document.getElementById('preloader');
		function preloader(){
			preload.style.display='none';
		}
	</script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript" src="assets/js/jquery-3.2.0.min.js"></script>
	<script>
		window.jQuery || document.write('<script src="assets/js/vendor/jquery-1.12.0.min.js"><\/script>')
	</script>
	<!--=== All Plugin ===-->
	<script type="text/javascript" src="assets/js/popper.min.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>

	<!-- Counter Up ======================= -->
	<script src="assets/js/plugin/counterup/counterup.min.js"></script>
	<script src="assets/js/plugin/waypoints/jquery.waypoints.min.js"></script>
<!-- modal -->
	<!--Isotope-->
	<script src="assets/js/plugin/iso_top/isotopev3.0.6.pkgd.min.js"></script>

	<!-- ================= Meanmenu min Js =========== -->
	<script src="assets/js/jquery.meanmenu.js"></script>
	<script type="text/javascript" src="assets/js/plugin/wow.min.js"></script>
	<script type="text/javascript" src="assets/js/plugin/owl.carousel.min.js"></script>
	<script type="text/javascript" src="assets/js/plugin/jquery.magnific-popup.min.js"></script>
	<!-- ================= AOS Js =========== -->
	<script src="assets/js/plugin/aos.js"></script>
	<!-- Sticky JS -->
	<script src="assets/js/plugin/jquery.sticky.js"></script>
	<!--=== All Active ===-->
	<script type="text/javascript" src="assets/js/main.js"></script>

	<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
	<script>
		(function (b, o, i, l, e, r) {
			b.GoogleAnalyticsObject = l;
			b[l] || (b[l] =
				function () {
					(b[l].q = b[l].q || []).push(arguments)
				});
			b[l].l = +new Date;
			e = o.createElement(i);
			r = o.getElementsByTagName(i)[0];
			e.src = 'https://www.google-analytics.com/analytics.js';
			r.parentNode.insertBefore(e, r)
		}(window, document, 'script', 'ga'));
		ga('create', 'UA-XXXXX-X', 'auto');
		ga('send', 'pageview');
	</script>
</body>

</html>
