<?php  
    require_once 'database/database.php';
    $application = new datamodel();
    $condition = " WHERE user_id ='".$_SESSION['id']."'";
    $condition_resume = " WHERE user_id = '".$_SESSION['id']."'";
    if(isset($_GET['job_id'])){
        $conditionjob = " WHERE id ='".$_GET['job_id']."'";
        $job_details = $application->getSingleData('jobs',' * ', $conditionjob );

    }
    
    $user_resume = $application->getSingleData('resumes', ' * ', $condition_resume);
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
                                <div class="card shadow p-4 my-2">
                                    <div class="w-100 company-details p-2 text-left row">
                                        <div class="col-4">
                                            <p><strong>Vaccancy:</strong>........</p>
                                            <p><strong>Salary:</strong><?=$job_details->salary?></p>
                                        </div>
                                        <div class="col-4">
                                            <p><strong>Age at Most:</strong><?= 32 ?></p>
                                            <p><strong>Experience:</strong><?=$job_details->min_job_exp_year ?></p>
                                        </div>
                                        <div class="col-4">
                                            <p><strong>Location:</strong><?=$job_details->location ?></p>
                                            <p><strong>Application Starting from:</strong><?=$job_details->app_start_time ?></p>
                                        </div>
                                    </div>
                                </div>
                            <div class="card shadow p-4 my-2">
                                <form action="index.php?page=application_submit" method="POST">
                
                                    <input type="hidden" name="job_id" value =<?= $job_details->id  ?? '' ?>>
                                    <input type="hidden" name="resume_id" value =<?= $user_resume->id ?? '' ?>>
                                    <div class="row">
                                        <!-- previous Salary -->
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">previous Salary</label>
                                            <input type="number" name="previous_salary" class="form-control" value="">
                                        </div>

                                        <!-- expected Salary -->
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">expected Salary <span class="text-danger">***</span></label>
                                            <input type="number" name="expected_salary" class="form-control" value="" required>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Cover Letter</label>
                                        <textarea name="cover_letter" class="form-control" rows="3" ></textarea>
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
    
        

        
	
    </div>
	
	<!--==================================================================-->
	<?php require "layouts/scripts.php" ?>
	
</body>

</html>

