<?php
    require_once 'database/database.php';
    $applicationpreview = new datamodel();
    
    $application_data = $_SESSION['application_data'];
    $applicant_personalinfo =  $applicationpreview->getSingleData('user_details', ' * ', ' WHERE user_id = '.$_SESSION['id'] );
    $applicant_education=  $applicationpreview->getData('user_education', ' * ', ' WHERE user_id = '.$_SESSION['id'] );
    $applicant_experience =  $applicationpreview->getData('user_experience', ' * ', ' WHERE user_id = '.$_SESSION['id'] );
    $applicant_data= extract($application_data);
    // print_r($application_data);
    // die;
    
?>
<!doctype html>
<html class="no-js" lang="en">

<?php require "layouts/head.php" ?>

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
</style>


        <div class="container mt-5">
            <div class="card shadow-lg p-4 card-custom">

                        <!-- HEADER -->
                        <div class="text-center mb-4">
                            <h2 class="text-success fw-bold">
                                Application Preview
                            </h2>
                            <span class="badge bg-success badge-title text-capitalize px-3 py-2">
                                <?= $_SESSION['name'] ?>
                            </span>
                        </div>
                        <div class="mb-4 row">
                            <div class="profile-wrapper col-md-3">
                                <img 
                                    src="uploads/img/<?= $_SESSION['profile_image'] ?>" 
                                    alt="Profile Image" 
                                    class="profile-img shadow img-fluid"
                                >
                            </div>
                            <div class="col-md-9 p-4">
                                <div class="row">
                                    <h5 class=" fs-3 fw-bold ">Career Objective</h5>
                                    <p class=" fs-5 fw-light py-2 "><?= $cover_letter ?></p>
                                    <p class=" fs-5 fw-light  "><strong>Email:</strong><?=$_SESSION['email']  ?></p>
                                    <p class=" fs-5 fw-light  "><strong>Phone:</strong><?= $_SESSION['phone'] ?></p>
                                    
                                    <h5>Expected Salary</h5>
                                    <p><?=$expected_salary ?></p>
                                </div>
                            </div>
                        </div>
                <!-- PERSONAL INFO -->
                <div class="mb-5">
                    <h5 class="text-success section-title mb-3">Personal Information</h5>
                    <div class="table-responsive">
                        <table class="table table-bordered align-middle info-table">
                            <tr><th>Full Name</th><td><?= $_SESSION['name'] ?></td></tr>
                            <tr><th>Father Name</th><td><?= $applicant_personalinfo->father_name ?></td></tr>
                            <tr><th>Mother Name</th><td><?= $applicant_personalinfo->mother_name ?></td></tr>
                            <tr><th>Date of Birth</th><td><?= $applicant_personalinfo->dob ?></td></tr>
                            <tr><th>Nationality</th><td><?= $applicant_personalinfo->nationality ?></td></tr>
                            <tr><th>Religion</th><td><?= $applicant_personalinfo->religion ?></td></tr>
                            <tr><th>Gender</th><td><?= $applicant_personalinfo->gender ?></td></tr>
                            <tr><th>Marital Status</th><td><?= $applicant_personalinfo->marital_status ?></td></tr>
                            <tr><th>NID</th><td><?= $applicant_personalinfo->nid ?></td></tr>
                            <tr><th>Birth Reg.</th><td><?= $applicant_personalinfo->birth_registration ?></td></tr>
                            <tr><th>Passport</th><td><?= $applicant_personalinfo->passport_no ?></td></tr>
                            <tr><th>Address</th><td><?= $applicant_personalinfo->address ?></td></tr>
                        </table>
                    </div>
                </div>
                <?php foreach($applicant_education as $education_level) {?>
                <!-- SSC -->
                <div class="mb-5">
                    <h5 class="text-success section-title mb-3"><?= $education_level['exam_name'] ?> Information</h5>
                    <div class="table-responsive">
                        <table class="table table-bordered align-middle info-table">
                            <tr><th>Exam</th><td><?= $education_level['exam_name'] ?></td></tr>
                            <tr><th>Board</th><td><?= $education_level['uni_board'] ?></td></tr>
                            <tr><th>Roll</th><td><?= $education_level['roll_id'] ?></td></tr>
                            <tr><th>Subject</th><td><?= $education_level['subject'] ?></td></tr>
                            <tr><th>Result</th><td><?= $education_level['result'] ?></td></tr>
                            <tr><th>Year</th><td><?= $education_level['passing_year'] ?></td></tr>
                        </table>
                    </div>
                </div>
                <?php } ?>
                

                <!-- EXPERIENCE -->
                <div class="mb-5">
                    <h5 class="text-success section-title mb-3">Experience</h5>
                     
                     <?php foreach ($applicant_experience as $applicant_experience) {
                        ?>
                        
                    <div class="table-responsive">
                        <table class="table table-bordered align-middle info-table">
                            <tr><th>Company</th><td><?= $applicant_experience['company_name'] ?></td></tr>
                            <tr><th>Job Title</th><td><?= $applicant_experience['job_title'] ?></td></tr>
                            <tr><th>Type</th><td><?= $applicant_experience['company_type'] ?></td></tr>
                            <tr><th>Start</th><td><?= $applicant_experience['start_date'] ?></td></tr>
                            <tr><th>End</th><td><?= $applicant_experience['end_date'] ?? 'Running' ?></td></tr>
                            <tr><th>Location</th><td><?= $applicant_experience['location'] ?></td></tr>
                            <tr><th>Description</th><td><?= $applicant_experience['description'] ?></td></tr>
                        </table>
                    </div>
                    <?php
                    } ?>
                </div>
                <div class="w-25 text-center">
                        <img 
                            src="uploads/signature/<?= $_SESSION['signature'] ?>" 
                            alt="Profile Image" 
                            class=" shadow"
                        >
                        <p class="fs-5 fw-5 text-dark"  >Signature</p>

                </div>

                <!-- ACTION BUTTONS -->
                <div class="text-center mt-4">

                    

                    <!-- SUBMIT -->
                    <form action="index.php?page=application_submit&apply=apply" method="POST" style="display:inline;">
                        
                            <input type="hidden" name="job_id" value="<?= htmlspecialchars($applicant_personalinfo->job_id) ?>">
                            <input type="hidden" name="user_id" value="<?= htmlspecialchars($applicant_personalinfo->user_id) ?>">
                            <input type="hidden" name="resume_id" value="<?= htmlspecialchars($applicant_personalinfo->resume_id) ?>">
                        <button class="btn btn-success px-4 shadow">
                            ✔ Confirm & Submit
                        </button>
                    </form>
                    <!-- BACK -->
                    <form action="index.php?page=application_finalsubmit" method="POST" style="display:inline;">
                        <?php foreach($application_data as $key => $value){ ?>
                            <input type="hidden" name="<?= $key ?>" value="<?= htmlspecialchars($value) ?>">
                        <?php } ?>
                        <button class="btn btn-outline-secondary px-4 me-2">
                            ← Edit
                        </button>
                    </form>

                </div>

            </div>
        </div>
<?php require "layouts/scripts.php" ?>
	
</body>

</html>
