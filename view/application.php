<?php  
    require_once 'database/database.php';
    $application = new datamodel();
    $condition = " WHERE user_id ='".$_SESSION['id']."'";
    $condition_resume = " WHERE user_id = '".$_SESSION['id']."'";
    if(isset($_GET['job_id'])){
        $conditionjob = " WHERE id ='".$_GET['job_id']."'";
        $job_details = $application->getSingleData('jobs',' * ', $conditionjob );

    }
    $conditionssc = " WHERE user_id ='".$_SESSION['id']."' and exam_name = 'SSC'";
    $conditionhsc = " WHERE user_id ='".$_SESSION['id']."' and exam_name = 'HSC'";
    $conditiongra = " WHERE user_id ='".$_SESSION['id']."' and exam_name = 'Bachelorr'";
    $conditionmas = " WHERE user_id ='".$_SESSION['id']."' and exam_name = 'Masters'";
    $conditionMPh = " WHERE user_id ='".$_SESSION['id']."' and exam_name = 'MPh'";
    $conditionPhd = " WHERE user_id ='".$_SESSION['id']."' and exam_name = 'Phd'";

    $ssc = $application->getSingleData('user_education',' * ', $conditionssc );
    $hsc = $application->getSingleData('user_education',' * ', $conditionhsc );
    $gra = $application->getSingleData('user_education',' * ', $conditiongra );
    $mas = $application->getSingleData('user_education',' * ', $conditionmas );
    $mph = $application->getSingleData('user_education',' * ', $conditionMPh );
    $phd = $application->getSingleData('user_education',' * ', $conditionPhd );
    $ssc_degree = $application->getData('bachelor_degrees',' * ', ' WHERE degree_level = 1 ' );
    $hsc_degree = $application->getData('bachelor_degrees',' * ', ' WHERE degree_level = 2 ' );
    $gra_degree = $application->getData('bachelor_degrees',' * ', ' WHERE degree_level = 3 ' );


    
    $user_resume = $application->getSingleData('resumes', ' * ', $condition_resume);

    $app_experience_info = $application->getData('user_experience',' * ', $condition );
    $app_personal_info = $application->getSingleData('user_details',' * ', $condition );
    
    
    
?>

<!doctype html>
<html class="no-js" lang="en">

<?php require "layouts/head.php" ?>

<body>
	<div class="wrapper p-2">	
        <div class="row">
        <?php require "layouts/sidemenu.php" ?>
        <div class="col-md-10">
            <div class="content  container">
                <div class="search_area">
                    <?php require "layouts/searcharea.php" ?>
                </div>
                <div class="information-section">
                    <div class="container mt-2 " >
                        <div class="card shadow p-4">
                            <h4 class="mb-3 text-success fs-3 text-center">Applying for the Position <?= $job_details->title?> </h4>
                            <?php if(isset($_GET['message'])){ 
                                echo  '<h3 class="text-danger text-center p-2">'.$_GET['message'].'</h3>';
                            } ?>
                                <form action="index.php?page=application_submit" method="POST">
                                    <?php if(!empty($job_details->id)) {?>
                                <input type="hidden" name="job_id" value =<?= $job_details->id ?>>
                                <?php }?>
                                <?php if(!empty($user_resume->id)) {?>
                                <input type="hidden" name="resume_id" value =<?= $user_resume->id ?>>
                                 <?php }else{
                                    echo "<h5 class='text-danger text-center alert alert-danger' > you must upload a updated  resume before apply</h5>";
                                 } ?>
                                <div class="personal-information shadow p-4 mt-4">
                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <label class="form-label">Full Name</label>
                                            <input  type="text" name="name" class="form-control"  value="<?= $_SESSION['name'] ?? '' ?>"   required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <!-- Father Name -->
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Father Name</label>
                                            <input type="text" name="father_name" class="form-control" <?php if(isset($app_personal_info->father_name)){?> value="<?= $app_personal_info->father_name?> " <?php  } ?>  required>
                                        </div>

                                        <!-- Mother Name -->
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Mother Name</label>
                                            <input type="text" name="mother_name" class="form-control" <?php if(isset($app_personal_info->mother_name)){?> value="<?= $app_personal_info->mother_name ?> " <?php  } ?> required>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <!-- Date of Birth -->
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">Date of Birth</label>
                                            <input type="date" name="dob" class="form-control" <?php if(isset($app_personal_info->dob)){?> value=" <?= $app_personal_info->dob ?> " <?php  } ?> required>
                                        </div>

                                        <!-- Nationality -->
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">Nationality</label>
                                            <input type="text" name="nationality" <?php if(isset($app_personal_info->nationality)){?> value="<?= $app_personal_info->nationality?> " <?php  } ?> class="form-control">
                                        </div>

                                        <!-- Religion -->
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">Religion</label>
                                            <input type="text" name="religion" <?php if(isset($app_personal_info->religion)){?> value="<?= $app_personal_info->religion?> " <?php  } ?> class="form-control">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <!-- Gender -->
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label d-block">Gender</label>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="gender" value="Male" <?php if($app_personal_info->gender == 'male')echo " checked "; ?>>
                                                <label class="form-check-label">Male</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="gender" value="Female" <?php if($app_personal_info->gender == 'female')echo " checked "; ?>>
                                                <label class="form-check-label">Female</label>
                                            </div>
                                        </div>

                                        <!-- Marital Status -->
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">Marital Status</label>
                                            <select name="marital_status" class="form-select">
                                                <option value="">Select</option>
                                                <option value="single" <?php if(isset($app_personal_info->marital_status)){if($app_personal_info->marital_status=='single'){?> selected  <?php } } ?>>Single</option>
                                                <option value="married" <?php if(isset($app_personal_info->marital_status)){if($app_personal_info->marital_status=='married'){?> selected  <?php } } ?> >Married</option>
                                            </select>
                                        </div>

                                        <!-- NID -->
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">NID</label>
                                            <input type="text" name="nid" class="form-control" <?php if(isset($app_personal_info->nid)){?> value="<?= $app_personal_info->nid?> " <?php  } ?> >
                                        </div>
                                    </div>

                                    <div class="row">
                                        <!-- Birth Registration -->
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Birth Registration No</label>
                                            <input type="text" name="birth_registration" class="form-control" <?php if(isset($app_personal_info->birth_registration)){?> value="<?= $app_personal_info->birth_registration?> " <?php  } ?>>
                                        </div>

                                        <!-- Passport -->
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Passport No</label>
                                            <input type="text" name="passport_no" class="form-control" <?php if(isset($app_personal_info->passport_no)){?> value="<?= $app_personal_info->passport_no?> " <?php  } ?>>
                                        </div>
                                    </div>

                                    <!-- Address -->
                                    <div class="mb-3">
                                        <label class="form-label">Address</label>
                                        <textarea name="address" class="form-control" rows="3" ><?php if(isset($app_personal_info->address)){?> <?= $app_personal_info->address?> <?php  } ?></textarea>
                                    </div>
                                </div>
                                <div class="SSC shadow p-4 mt-4">
                                    <h3>Secondary or Related Certificate <?php if($job_details->ssc_required == 1){ echo" <span class='text-danger'>*</span> " ;} ?> </h3>
                                    <div class="row">
                                        <!-- Exam Name -->
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Exam Name</label>
                                            <select name="ssc_exam_name" class="form-control" <?php if($job_details->ssc_required == 1){?> required <?php } ?>>
                                                <option value="">--------select exam Name--------</option>
                                                <?php foreach($ssc_degree as $ssc_degree){?>  
                                                <option value="<?=$ssc_degree['degree_name'] ?>" <?php if( isset($ssc->exam_name ) && $ssc->exam_name == $ssc_degree['degree_name']){?> selected <?php } ?>><?=$ssc_degree['degree_name'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>

                                        <!-- University / Board -->
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">University / Board</label>
                                            <input type="text" name="ssc_uni_board" class="form-control" placeholder="e.g. Dhaka Board" <?php if(isset($ssc->uni_board)) { echo "value = '".$ssc->uni_board."'";   } ?> <?php if($job_details->ssc_required == 1){?> required <?php } ?>>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <!-- Roll ID -->
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">Roll / ID</label>
                                            <input type="text" name="ssc_roll_id" class="form-control" <?php if(isset($ssc->roll_id)) { echo "value = '".$ssc->roll_id."'";   } ?> <?php if($job_details->ssc_required == 1){?> required <?php } ?>>
                                        </div>
                                        

                                        <!-- Subject -->
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">Subject</label>
                                            <input type="text" name="ssc_subject" class="form-control" <?php if(isset($ssc->subject)) { echo "value = '".$ssc->subject."'";   } ?> <?php if($job_details->ssc_required == 1){?> required <?php } ?>>
                                        </div>
                                        <!-- result -->

                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">Result</label>
                                            <input type="text" name="ssc_result" class="form-control" <?php if(isset($ssc->result)) { echo "value = '".$ssc->result."'";   } ?> <?php if($job_details->ssc_required == 1){?> required <?php } ?>>
                                        </div>

                                        <!-- Passing Year -->
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">Passing Year</label>
                                            <input type="number" name="ssc_passing_year" class="form-control" min="1950" max="2099" <?php if(isset($ssc->passing_year)) { echo "value = '".$ssc->passing_year."'";   } ?> <?php if($job_details->ssc_required == 1){?> required <?php } ?>>
                                        </div>
                                    </div>
                                </div>
                                <div class="HSC shadow p-4 mt-4">
                                    <h3>Higher Secondary or Related Certificate <?php if($job_details->hsc_required == 1){ echo" <span class='text-danger'>*</span> " ;} ?></h3>
                                    <div class="row">
                                        <!-- Exam Name -->
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Exam Name</label>
                                            <select name="hsc_exam_name" class="form-control" <?php if($job_details->ssc_required == 1){?> required <?php } ?>>
                                                <option value="">--------select exam Name--------</option>
                                                <?php foreach($hsc_degree as $hsc_degree){?>  
                                                <option value="<?=$hsc_degree['degree_name'] ?>" <?php if( isset($hsc->exam_name ) && $hsc->exam_name == $hsc_degree['degree_name']){?> selected <?php } ?>><?=$hsc_degree['degree_name'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>

                                        <!-- University / Board -->
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">University / Board</label>
                                            <input type="text" name="hsc_uni_board" class="form-control" placeholder="e.g. Dhaka Board" <?php if(isset($hsc->uni_board)) { echo "value = '".$hsc->uni_board."'";   } ?> <?php if($job_details->hsc_required == 1){?> required <?php } ?>>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <!-- Roll ID -->
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">Roll / ID</label>
                                            <input type="text" name="hsc_roll_id" class="form-control" <?php if(isset($hsc->roll_id)) { echo "value = '".$hsc->roll_id."'";   } ?> <?php if($job_details->hsc_required == 1){?> required <?php } ?>>
                                        </div>
                                        

                                        <!-- Subject -->
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">Subject</label>
                                            <input type="text" name="hsc_subject" class="form-control" <?php if(isset($hsc->subject)) { echo "value = '".$hsc->subject."'";   } ?> <?php if($job_details->hsc_required == 1){?> required <?php } ?> >
                                        </div>
                                        <!-- result -->

                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">Result</label>
                                            <input type="text" name="hsc_result" class="form-control" <?php if(isset($hsc->result)) { echo "value = '".$hsc->result."'";   } ?> <?php if($job_details->hsc_required == 1){?> required <?php } ?> >
                                        </div>

                                        <!-- Passing Year -->
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">Passing Year</label>
                                            <input type="number" name="hsc_passing_year" class="form-control" min="1950" max="2099" <?php if(isset($hsc->passing_year)) { echo "value = '".$hsc->passing_year."'";   } ?> <?php if($job_details->hsc_required == 1){?> required <?php } ?> >
                                        </div>
                                    </div>
                                </div>
                                <div class="Bachelor shadow p-4 mt-4">
                                    <h3>Bachelor or Related Certificate <?php if($job_details->gra_required == 1){ echo" <span class='text-danger'>*</span> " ;} ?></h3>

                                    <div class="row">
                                        <!-- Exam Name -->
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Exam Name</label>
                                            <select name="gra_exam_name" class="form-control" <?php if($job_details->gra_required == 1){?> required <?php } ?>>
                                                <option value="">-----------select----------</option>
                                                <?php foreach($gra_degree as $gra_degree){?>  
                                                <option value="<?=$gra_degree['degree_name'] ?>" <?php if( isset($gra->exam_name ) && $gra->exam_name == $gra_degree['degree_name']){?> selected <?php } ?>><?=$gra_degree['degree_name'] ?></option>
                                                <?php } ?>
                                            </select>
                                            
                                        </div>

                                        <!-- University / Board -->
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">University / Board</label>
                                            <input type="text" name="gra_uni_board" class="form-control" placeholder="e.g. Dhaka Board" <?php if(isset($gra->uni_board)) { echo "value = '".$gra->uni_board."'";   } ?> <?php if($job_details->gra_required == 1){?> required <?php } ?>>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <!-- Roll ID -->
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">Roll / ID</label>
                                            <input type="text" name="gra_roll_id" class="form-control" <?php if(isset($gra->roll_id)) { echo "value = '".$gra->roll_id."'";   } ?> <?php if($job_details->gra_required == 1){?> required <?php } ?>>
                                        </div>
                                        

                                        <!-- Subject -->
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">Subject</label>
                                            <input type="text" name="gra_subject" class="form-control" <?php if(isset($gra->subject)) { echo "value = '".$gra->subject."'";   } ?> <?php if($job_details->gra_required == 1){?> required <?php } ?>>
                                        </div>
                                        <!-- result -->

                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">Result</label>
                                            <input type="text" name="gra_result" class="form-control" <?php if(isset($gra->result)) { echo "value = '".$gra->result."'";   } ?> <?php if($job_details->gra_required == 1){?> required <?php } ?>>
                                        </div>

                                        <!-- Passing Year -->
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">Passing Year</label>
                                            <input type="number" name="gra_passing_year" class="form-control" min="1950" max="2099" <?php if(isset($gra->passing_year)) { echo "value = '".$gra->passing_year."'";   } ?> <?php if($job_details->gra_required == 1){?> required <?php } ?>>
                                        </div>
                                    </div>
                                </div>
                                <!-- experience -->
                                <div class="experience shadow p-4 mt-4">
                                    <h3>Experience </h3>
                                    <div class="row">
                                        <!-- Company Name -->
                                        <div class="mb-3 col-md-6">
                                        <label for="company_name" class="form-label">Company Name</label>
                                        <input type="text" class="form-control" id="company_name" name="company_name" >
                                        </div>

                                        <!-- Job Title -->
                                        <div class="mb-3 col-md-6">
                                        <label for="job_title" class="form-label">Job Title</label>
                                        <input type="text" class="form-control" id="job_title" name="job_title" >
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="mb-3 col-md-4">
                                        <label for="company_type" class="form-label">Company Type</label>
                                        <input type="text" class="form-control" id="company_type" name="company_type" >
                                        </div>
                                        <!-- Start Date -->
                                        <div class="mb-3 col-md-4">
                                        <label for="start_date" class="form-label">Start Date</label>
                                        <input type="date" class="form-control" id="start_date" name="start_date" >
                                        </div>

                                        <!-- End Date -->
                                        <div class="mb-3 col-md-4">
                                        <label for="end_date" class="form-label">End Date</label>
                                        <input type="date" class="form-control" id="end_date" name="end_date">
                                        </div>
                                    </div>

                                    <!-- Current Job -->
                                    <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" id="is_current" name="is_current">
                                    <label class="form-check-label" for="is_current">
                                        I currently work here
                                    </label>
                                    </div>

                                    <!-- Location -->
                                    <div class="mb-3">
                                        <label for="location" class="form-label">Location</label>
                                        <input type="text" class="form-control" id="location" name="location">
                                    </div>

                                    <!-- Description -->
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Job Description</label>
                                        <textarea class="form-control" id="description" name="description" rows="4"></textarea>
                                    </div>
                                    <div class="row g-2">
                                        <?php 
                                        if(isset($app_experience_info)){
                                            foreach($app_experience_info as $app_experience_info){
                                                
                                        ?>
                                        <div class="card-body">

                                            <!-- Job Title & Company -->
                                            <h5 class="card-title mb-1"><?= $app_experience_info['job_title'] ?? "N/A" ?></h5>
                                            <h6 class="text-muted"><?= $app_experience_info['company_name'] ?? "N/A" ?></h6>

                                            <!-- Date & Location -->
                                            <p class="text-muted mb-2">
                                                <?php if(isset($app_experience_info['start_date'])){ echo "from". $app_experience_info['start_date'] ."to". $app_experience_info['end_date']; }  ?>
                                            </p>

                                            <!-- Description -->
                                            <p class="card-text">
                                                <?= $app_experience_info['description'] ?? "N/A" ?>
                                            </p>

                                            <!-- Optional badge -->
                                            <?php if(isset($app_experience_info['is_current']) && $app_experience_info['is_current'] == 1){ ?>
                                            <span class="badge bg-success">Current</span>
                                            <?php } ?>
                                        </div>
                                        
                                        <?php }
                                        }?>

                                    </div>
                                </div> 
                                <div class="skills-section p-4 shadow">
                                    <h3 class="text-success fs-3 text-capitalize" >Your Skills area</h3>
                                    <ol>
                                        <?php $skills = explode( ",", $user_resume->skills );
                                            foreach($skills as $skills){
                                                ?>
                                                <li><?= $skills ?></li>
                                                <?php
                                            }
                                        ?>
                                    </ol>
                                    
                                </div>
                                <!-- Submit Button -->
                                <div class="text-center py-2">
                                    <button type="submit" class="btn btn-success px-4">Submit</button>
                                </div>

                            </form>
                        </div>
                    </div>
                   
                </div>
               
                
                
            </div>
        </div>
        </div>
    
        

        
	
    </div>
	
	<!--==================================================================-->
	<?php require "layouts/scripts.php" ?>
	
</body>

</html>

