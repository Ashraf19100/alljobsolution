<?php
    require_once 'database/database.php';
    $applicationpreview = new datamodel();
    
    $application_data = $_SESSION['application_data'];
    $applicant_experience =  $applicationpreview->getData('user_experience', ' * ', ' WHERE user_id = '.$_SESSION['id'] );
    // print('<pre>');
    // print_r($application_data);
    
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
        display: inline-block;
        padding: 5px;
        border-radius: 50%;
        background: linear-gradient(135deg, #198754, #20c997);
    }

    .profile-img {
        width: 200px;
        height: 200px;
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
                                <?= $application_data['name'] ?? '' ?>
                            </span>
                        </div>
                        <div class="text-center mb-4">
                            <div class="profile-wrapper">
                                <img 
                                    src="uploads/img/<?= $_SESSION['profile_image'] ?>" 
                                    alt="Profile Image" 
                                    class="profile-img shadow"
                                >
                            </div>
                        </div>
                <!-- PERSONAL INFO -->
                <div class="mb-5">
                    <h5 class="text-success section-title mb-3">Personal Information</h5>
                    <div class="table-responsive">
                        <table class="table table-bordered align-middle info-table">
                            <tr><th>Full Name</th><td><?= $application_data['name'] ?></td></tr>
                            <tr><th>Father Name</th><td><?= $application_data['father_name'] ?></td></tr>
                            <tr><th>Mother Name</th><td><?= $application_data['mother_name'] ?></td></tr>
                            <tr><th>Date of Birth</th><td><?= $application_data['dob'] ?></td></tr>
                            <tr><th>Nationality</th><td><?= $application_data['nationality'] ?></td></tr>
                            <tr><th>Religion</th><td><?= $application_data['religion'] ?></td></tr>
                            <tr><th>Gender</th><td><?= $application_data['gender'] ?></td></tr>
                            <tr><th>Marital Status</th><td><?= $application_data['marital_status'] ?></td></tr>
                            <tr><th>NID</th><td><?= $application_data['nid'] ?></td></tr>
                            <tr><th>Birth Reg.</th><td><?= $application_data['birth_registration'] ?></td></tr>
                            <tr><th>Passport</th><td><?= $application_data['passport_no'] ?></td></tr>
                            <tr><th>Address</th><td><?= $application_data['address'] ?></td></tr>
                        </table>
                    </div>
                </div>

                <!-- SSC -->
                <div class="mb-5">
                    <h5 class="text-success section-title mb-3">SSC Information</h5>
                    <div class="table-responsive">
                        <table class="table table-bordered align-middle info-table">
                            <tr><th>Exam</th><td><?= $application_data['ssc_exam_name'] ?></td></tr>
                            <tr><th>Board</th><td><?= $application_data['ssc_uni_board'] ?></td></tr>
                            <tr><th>Roll</th><td><?= $application_data['ssc_roll_id'] ?></td></tr>
                            <tr><th>Subject</th><td><?= $application_data['ssc_subject'] ?></td></tr>
                            <tr><th>Result</th><td><?= $application_data['ssc_result'] ?></td></tr>
                            <tr><th>Year</th><td><?= $application_data['ssc_passing_year'] ?></td></tr>
                        </table>
                    </div>
                </div>
                <!-- SSC -->
                <div class="mb-5">
                    <h5 class="text-success section-title mb-3">HSC Information</h5>
                    <div class="table-responsive">
                        <table class="table table-bordered align-middle info-table">
                            <tr><th>Exam</th><td><?= $application_data['hsc_exam_name'] ?></td></tr>
                            <tr><th>Board</th><td><?= $application_data['hsc_uni_board'] ?></td></tr>
                            <tr><th>Roll</th><td><?= $application_data['hsc_roll_id'] ?></td></tr>
                            <tr><th>Subject</th><td><?= $application_data['hsc_subject'] ?></td></tr>
                            <tr><th>Result</th><td><?= $application_data['hsc_result'] ?></td></tr>
                            <tr><th>Year</th><td><?= $application_data['hsc_passing_year'] ?></td></tr>
                        </table>
                    </div>
                </div>
                <!-- gra -->
                <div class="mb-5">
                    <h5 class="text-success section-title mb-3">Graduation Information</h5>
                    <div class="table-responsive">
                        <table class="table table-bordered align-middle info-table">
                            <tr><th>Exam</th><td><?= $application_data['gra_exam_name'] ?></td></tr>
                            <tr><th>Board</th><td><?= $application_data['gra_uni_board'] ?></td></tr>
                            <tr><th>Roll</th><td><?= $application_data['gra_roll_id'] ?></td></tr>
                            <tr><th>Subject</th><td><?= $application_data['gra_subject'] ?></td></tr>
                            <tr><th>Result</th><td><?= $application_data['gra_result'] ?></td></tr>
                            <tr><th>Year</th><td><?= $application_data['gra_passing_year'] ?></td></tr>
                        </table>
                    </div>
                </div>

                <!-- EXPERIENCE -->
                <div class="mb-5">
                    <h5 class="text-success section-title mb-3">Experience</h5>
                     <?php if(!empty($application_data['company_name'])) {
                        ?>
                    <div class="table-responsive">
                        <table class="table table-bordered align-middle info-table">
                            <tr><th>Company</th><td><?= $application_data['company_name'] ?></td></tr>
                            <tr><th>Job Title</th><td><?= $application_data['job_title'] ?></td></tr>
                            <tr><th>Type</th><td><?= $application_data['company_type'] ?></td></tr>
                            <tr><th>Start</th><td><?= $application_data['start_date'] ?></td></tr>
                            <tr><th>End</th><td><?= $application_data['end_date'] ?? 'Running' ?></td></tr>
                            <tr><th>Location</th><td><?= $application_data['location'] ?></td></tr>
                            <tr><th>Description</th><td><?= $application_data['description'] ?></td></tr>
                        </table>
                    </div>
                     <?php } foreach ($applicant_experience as $applicant_experience) {
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
                        
                            <input type="hidden" name="job_id" value="<?= htmlspecialchars($application_data['job_id']) ?>">
                            <input type="hidden" name="user_id" value="<?= htmlspecialchars($application_data['user_id']) ?>">
                            <input type="hidden" name="resume_id" value="<?= htmlspecialchars($application_data['resume_id']) ?>">
                         <div class="mb-3">
                            <label for="cover_letter" class="form-label">Write Short Cover letter</label>
                            <textarea class="form-control" id="cover_letter" name="cover_letter" rows="4"></textarea>
                        </div>
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
