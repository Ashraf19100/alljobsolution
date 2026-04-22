<?php  
    require_once 'database/database.php';
    $application = new datamodel();
    $condition = " WHERE user_id ='".$_SESSION['id']."'";
    $conditionjob = " WHERE id ='".$_SESSION['id']."'";
    $conditionssc = " WHERE user_id ='".$_SESSION['id']."' and exam_name = 'SSC'";
    $conditionhsc = " WHERE user_id ='".$_SESSION['id']."' and exam_name = 'HSC'";
    $conditiongra = " WHERE user_id ='".$_SESSION['id']."' and exam_name = 'Bachelorr'";
    $conditionmas = " WHERE user_id ='".$_SESSION['id']."' and exam_name = 'Masters'";
    $conditionMPh = " WHERE user_id ='".$_SESSION['id']."' and exam_name = 'MPh'";
    $conditionPhd = " WHERE user_id ='".$_SESSION['id']."' and exam_name = 'Phd'";

    $ssc = $application->getData('user_education',' * ', $conditionssc );
    $hsc = $application->getData('user_education',' * ', $conditionhsc );
    $gra = $application->getData('user_education',' * ', $conditiongra );
    $mas = $application->getData('user_education',' * ', $conditionmas );
    $mph = $application->getData('user_education',' * ', $conditionMPh );
    $phd = $application->getData('user_education',' * ', $conditionPhd );
    $gra_degree = $application->getData('bachelor_degrees',' * ', '' );


    $job_details = $application->getData('jobs',' * ', $conditionjob );


    $experience_info = $application->getData('user_experience',' * ', $condition );
    $personal_info = $application->getData('user_details',' * ', $condition );
    function singlearray($result){
        $singlerow = array();
        if(isset($result)){
            foreach($result as $personal_info1){
                foreach($personal_info1 as $key => $val){
                    $singlerow[$key] = $val;
                }
            }
        }

        return $singlerow;
    }
    $personal_info=singlearray($personal_info);
    $job_details=singlearray($job_details);
    $ssc=singlearray($ssc);
    $hsc=singlearray($hsc);
    $gra=singlearray($gra);
    
    
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
                    <form action="">
                        <input class="w-75 p-2 shadow-sm border-0 text-start text-uppercase text-info" type="text" name="search" placeholder="search your desire position">
                        <button type="submit" class="btn btn-info shadow-sm border-0 text-start text-uppercase text-white ">Search</button>
                    </form>
                </div>
                <div class="information-section">
                    <div class="container mt-2 " >
                        <div class="card shadow p-4">
                            <h4 class="mb-3">Applying for the  </h4>

                            <form action="index.php?page=education-submit" method="POST">
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
                                            <input type="text" name="father_name" class="form-control" <?php if(isset($personal_info['father_name'])){?> value="<?= $personal_info['father_name'] ?> " <?php  } ?>  required>
                                        </div>

                                        <!-- Mother Name -->
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Mother Name</label>
                                            <input type="text" name="mother_name" class="form-control" <?php if(isset($personal_info['mother_name'])){?> value="<?= $personal_info['mother_name']?> " <?php  } ?> required>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <!-- Date of Birth -->
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">Date of Birth</label>
                                            <input type="date" name="dob" class="form-control" <?php if(isset($personal_info['dob'])){?> value="<?= $personal_info['dob']?> " <?php  } ?> required>
                                        </div>

                                        <!-- Nationality -->
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">Nationality</label>
                                            <input type="text" name="nationality" <?php if(isset($personal_info['nationality'])){?> value="<?= $personal_info['nationality']?> " <?php  } ?> class="form-control">
                                        </div>

                                        <!-- Religion -->
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">Religion</label>
                                            <input type="text" name="religion" <?php if(isset($personal_info['religion'])){?> value="<?= $personal_info['religion']?> " <?php  } ?> class="form-control">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <!-- Gender -->
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label d-block">Gender</label>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="gender" value="Male" >
                                                <label class="form-check-label">Male</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="gender" value="Female" >
                                                <label class="form-check-label">Female</label>
                                            </div>
                                        </div>

                                        <!-- Marital Status -->
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">Marital Status</label>
                                            <select name="marital_status" class="form-select">
                                                <option value="">Select</option>
                                                <option value="single" <?php if(isset($personal_info['marital_status'])){if($personal_info['marital_status']=='single'){?> selected  <?php } } ?>>Single</option>
                                                <option value="married" <?php if(isset($personal_info['marital_status'])){if($personal_info['marital_status']=='married'){?> selected  <?php } } ?> >Married</option>
                                            </select>
                                        </div>

                                        <!-- NID -->
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">NID</label>
                                            <input type="text" name="nid" class="form-control" <?php if(isset($personal_info['nid'])){?> value="<?= $personal_info['nid']?> " <?php  } ?> >
                                        </div>
                                    </div>

                                    <div class="row">
                                        <!-- Birth Registration -->
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Birth Registration No</label>
                                            <input type="text" name="birth_registration" class="form-control" <?php if(isset($personal_info['birth_registration'])){?> value="<?= $personal_info['birth_registration']?> " <?php  } ?>>
                                        </div>

                                        <!-- Passport -->
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Passport No</label>
                                            <input type="text" name="passport_no" class="form-control" <?php if(isset($personal_info['passport_no'])){?> value="<?= $personal_info['passport_no']?> " <?php  } ?>>
                                        </div>
                                    </div>

                                    <!-- Address -->
                                    <div class="mb-3">
                                        <label class="form-label">Address</label>
                                        <textarea name="address" class="form-control" rows="3" ><?php if(isset($personal_info['address'])){?> <?= $personal_info['address']?> <?php  } ?></textarea>
                                    </div>
                                </div>
                                <div class="SSC shadow p-4 mt-4">
                                    <h3>Secondary or Related Certificate <?php if($job_details['ssc_required'] == 1){ echo" <span class='text-danger'>*</span> " ;} ?> </h3>
                                    <div class="row">
                                        <!-- Exam Name -->
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Exam Name</label>
                                            <select name="exam_name" class="form-control" <?php if($job_details['ssc_required'] == 1){?> required <?php } ?>>
                                                <option value="">--------select exam Name--------</option>
                                                <option value="SSC" <?php if( isset($ssc['exam_name'] ) && $ssc['exam_name'] == 'SSC'){?> selected <?php } ?>>SSC</option>
                                                <option value="Dakhil" <?php if( isset($ssc['exam_name'] ) && $ssc['exam_name'] == 'Dakhil'){?> selected <?php } ?>>Dakhil</option>
                                                <option value="SSC Vocational" <?php if( isset($ssc['exam_name'] ) && $ssc['exam_name'] == 'SSC Vocational'){?> selected <?php } ?>>SSC Vocational</option>
                                                <option value="Dakhil Vocational" <?php if( isset($ssc['exam_name'] ) && $ssc['exam_name'] == 'Dakhil Vocational'){?> selected <?php } ?>>Dakhil Vocational</option>
                                                <option value="O Level/Cambidge" <?php if( isset($ssc['exam_name'] ) && $ssc['exam_name'] == 'O Level/Cambidge'){?> selected <?php } ?>>O Level/Cambidge</option>
                                                <option value="SSC Equivalent" <?php if( isset($ssc['exam_name'] ) && $ssc['exam_name'] == 'SSC Equivalent'){?> selected <?php } ?>>SSC Equivalent</option>
                                            </select>
                                        </div>

                                        <!-- University / Board -->
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">University / Board</label>
                                            <input type="text" name="uni_board" class="form-control" placeholder="e.g. Dhaka Board" <?php if(isset($ssc['uni_board'])) { echo "value = '".$ssc['uni_board']."'";   } ?> <?php if($job_details['ssc_required'] == 1){?> required <?php } ?>>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <!-- Roll ID -->
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">Roll / ID</label>
                                            <input type="text" name="roll_id" class="form-control" <?php if(isset($ssc['roll_id'] )) { echo "value = '".$ssc['roll_id']."'";   } ?> <?php if($job_details['ssc_required'] == 1){?> required <?php } ?>>
                                        </div>
                                        

                                        <!-- Subject -->
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">Subject</label>
                                            <input type="text" name="subject" class="form-control" <?php if(isset($ssc['subject'])) { echo "value = '".$ssc['subject']."'";   } ?> <?php if($job_details['ssc_required'] == 1){?> required <?php } ?>>
                                        </div>
                                        <!-- result -->

                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">Result</label>
                                            <input type="text" name="result" class="form-control" <?php if(isset($ssc['result'])) { echo "value = '".$ssc['result']."'";   } ?> <?php if($job_details['ssc_required'] == 1){?> required <?php } ?>>
                                        </div>

                                        <!-- Passing Year -->
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">Passing Year</label>
                                            <input type="number" name="passing_year" class="form-control" min="1950" max="2099" <?php if(isset($ssc['passing_year'])) { echo "value = '".$ssc['passing_year']."'";   } ?> <?php if($job_details['ssc_required'] == 1){?> required <?php } ?>>
                                        </div>
                                    </div>
                                </div>
                                <div class="HSC shadow p-4 mt-4">
                                    <h3>Higher Secondary or Related Certificate <?php if($job_details['hsc_required'] == 1){ echo" <span class='text-danger'>*</span> " ;} ?></h3>
                                    <div class="row">
                                        <!-- Exam Name -->
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Exam Name</label>
                                            <select name="exam_name" class="form-control" <?php if($job_details['ssc_required'] == 1){?> required <?php } ?>>
                                                <option value="">--------select exam Name--------</option>
                                                <option value="HSC" <?php if( isset($hsc['exam_name'] ) && $hsc['exam_name'] == 'HSC'){?> selected <?php } ?>>HSC</option>
                                                <option value="Alim" <?php if( isset($hsc['exam_name'] ) && $hsc['exam_name'] == 'Alim'){?> selected <?php } ?>>Alim</option>
                                                <option value="Business Management" <?php if( isset($hsc['exam_name'] ) && $hsc['exam_name'] == 'Business Management'){?> selected <?php } ?>>Business Management</option>
                                                <option value="Diploma in Engineering" <?php if( isset($hsc['exam_name'] ) && $hsc['exam_name'] == 'Diploma in Engineering'){?> selected <?php } ?>>Diploma in Engineering</option>
                                                <option value="Diploma in Pharmacy" <?php if( isset($hsc['exam_name'] ) && $hsc['exam_name'] == 'Diploma in Pharmacy'){?> selected <?php } ?>>Diploma in Pharmacy</option>
                                                <option value="Diploma in Medical Technelogy" <?php if( isset($hsc['exam_name'] ) && $hsc['exam_name'] == 'Diploma in Medical Technelogy'){?> selected <?php } ?>>Diploma in Medical Technelogy</option>

                                                <option value="HSC Vocational" <?php if( isset($hsc['exam_name'] ) && $hsc['exam_name'] == 'HSC Vocational'){?> selected <?php } ?>>HSC Vocational</option>
                                                <option value="HSC (BM)" <?php if( isset($hsc['exam_name'] ) && $hsc['exam_name'] == 'HSC (BM)'){?> selected <?php } ?>>HSC (BM)</option>
                                                <option value="A Level/Sr.Cambidge" <?php if( isset($hsc['exam_name'] ) && $hsc['exam_name'] == 'A Level/Sr.Cambidge'){?> selected <?php } ?>>A Level/Sr.Cambidge</option>
                                                <option value="HSC Equivalent" <?php if( isset($hsc['exam_name'] ) && $hsc['exam_name'] == 'HSC Equivalent'){?> selected <?php } ?>>HSC Equivalent</option>
                                            </select>
                                        </div>

                                        <!-- University / Board -->
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">University / Board</label>
                                            <input type="text" name="uni_board" class="form-control" placeholder="e.g. Dhaka Board" <?php if(isset($hsc['uni_board'])) { echo "value = '".$hsc['uni_board']."'";   } ?> <?php if($job_details['hsc_required'] == 1){?> required <?php } ?>>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <!-- Roll ID -->
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">Roll / ID</label>
                                            <input type="text" name="roll_id" class="form-control" <?php if(isset($hsc['roll_id'])) { echo "value = '".$hsc['roll_id']."'";   } ?> <?php if($job_details['hsc_required'] == 1){?> required <?php } ?>>
                                        </div>
                                        

                                        <!-- Subject -->
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">Subject</label>
                                            <input type="text" name="subject" class="form-control" <?php if(isset($hsc['subject'])) { echo "value = '".$hsc['subject']."'";   } ?> <?php if($job_details['hsc_required'] == 1){?> required <?php } ?> >
                                        </div>
                                        <!-- result -->

                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">Result</label>
                                            <input type="text" name="result" class="form-control" <?php if(isset($hsc['result'])) { echo "value = '".$hsc['result']."'";   } ?> <?php if($job_details['hsc_required'] == 1){?> required <?php } ?> >
                                        </div>

                                        <!-- Passing Year -->
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">Passing Year</label>
                                            <input type="number" name="passing_year" class="form-control" min="1950" max="2099" <?php if(isset($hsc['passing_year'])) { echo "value = '".$hsc['passing_year']."'";   } ?> <?php if($job_details['hsc_required'] == 1){?> required <?php } ?> >
                                        </div>
                                    </div>
                                </div>
                                <div class="Bachelor shadow p-4 mt-4">
                                    <h3>Bachelor or Related Certificate <?php if($job_details['gra_required'] == 1){ echo" <span class='text-danger'>*</span> " ;} ?></h3>

                                    <div class="row">
                                        <!-- Exam Name -->
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Exam Name</label>
                                            <select name="exam_name" class="form-control" <?php if($job_details['gra_required'] == 1){?> required <?php } ?>>
                                                <option value="">-----------select----------</option>
                                                <?php foreach($gra_degree as $gra_degree){?>  
                                                <option value="<?=$gra_degree['degree_name'] ?>" <?php if( isset($gra['exam_name'] ) && $gra['exam_name'] == $gra_degree['degree_name']){?> selected <?php } ?>><?=$gra_degree['degree_name'] ?></option>
                                                <?php } ?>
                                            </select>
                                            
                                        </div>

                                        <!-- University / Board -->
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">University / Board</label>
                                            <input type="text" name="uni_board" class="form-control" placeholder="e.g. Dhaka Board" <?php if(isset($gra['uni_board'])) { echo "value = '".$gra['uni_board']."'";   } ?> <?php if($job_details['gra_required'] == 1){?> required <?php } ?>>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <!-- Roll ID -->
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">Roll / ID</label>
                                            <input type="text" name="roll_id" class="form-control" <?php if(isset($gra['roll_id'])) { echo "value = '".$gra['roll_id']."'";   } ?> <?php if($job_details['gra_required'] == 1){?> required <?php } ?>>
                                        </div>
                                        

                                        <!-- Subject -->
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">Subject</label>
                                            <input type="text" name="subject" class="form-control" <?php if(isset($gra['subject'])) { echo "value = '".$gra['subject']."'";   } ?> <?php if($job_details['gra_required'] == 1){?> required <?php } ?>>
                                        </div>
                                        <!-- result -->

                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">Result</label>
                                            <input type="text" name="result" class="form-control" <?php if(isset($gra['result'])) { echo "value = '".$gra['result']."'";   } ?> <?php if($job_details['gra_required'] == 1){?> required <?php } ?>>
                                        </div>

                                        <!-- Passing Year -->
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">Passing Year</label>
                                            <input type="number" name="passing_year" class="form-control" min="1950" max="2099" <?php if(isset($gra['passing_year'])) { echo "value = '".$gra['passing_year']."'";   } ?> <?php if($job_details['gra_required'] == 1){?> required <?php } ?>>
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
                                        <input type="text" class="form-control" id="company_name" name="company_name" required>
                                        </div>

                                        <!-- Job Title -->
                                        <div class="mb-3 col-md-6">
                                        <label for="job_title" class="form-label">Job Title</label>
                                        <input type="text" class="form-control" id="job_title" name="job_title" required>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="mb-3 col-md-4">
                                        <label for="company_type" class="form-label">Company Type</label>
                                        <input type="text" class="form-control" id="company_type" name="company_type" required>
                                        </div>
                                        <!-- Start Date -->
                                        <div class="mb-3 col-md-4">
                                        <label for="start_date" class="form-label">Start Date</label>
                                        <input type="date" class="form-control" id="start_date" name="start_date" required>
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
                                        if(isset($experience_info)){
                                            foreach($experience_info as $personal_info){
                                                
                                        ?>
                                        <div class="card-body">

                                            <!-- Job Title & Company -->
                                            <h5 class="card-title mb-1"><?= $personal_info['job_title'] ?? "N/A" ?></h5>
                                            <h6 class="text-muted"><?= $personal_info['company_name'] ?? "N/A" ?></h6>

                                            <!-- Date & Location -->
                                            <p class="text-muted mb-2">
                                                <?php if(isset($personal_info['start_date'])){ echo "from". $personal_info['start_date'] ."to". $personal_info['end_date']; }  ?>
                                            </p>

                                            <!-- Description -->
                                            <p class="card-text">
                                                <?= $personal_info['description'] ?? "N/A" ?>
                                            </p>

                                            <!-- Optional badge -->
                                            <?php if(isset($personal_info['is_current']) && $personal_info['is_current'] == 1){ ?>
                                            <span class="badge bg-success">Current</span>
                                            <?php } ?>
                                        </div>
                                        
                                        <?php }
                                        }?>

                                    </div>
                                </div> 
                                <!-- Submit Button -->
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success px-4">Save</button>
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

