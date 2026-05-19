<?php
   require_once 'database/database.php';
    $job_code = $_GET['manage'];
    $post_condition= " WHERE id = ".$job_code;
    $jobpost_details = new datamodel;
    $post_details = $jobpost_details->getSingleData('jobs', ' * ', $post_condition);
    
    

?>
<!doctype html>
<html class="no-js" lang="en">

<?php require "layouts/head.php" ?>
<style>
   
</style>
<body>
	<div class="wrapper p-2">	
        <div class="row">
        <?php require "layouts/sidemenu.php" ?>
            <div class="col-md-10">
                <div class="content  container">
                    <div class="top-content text-center">
                        <h2>📋 List of Uploaded Jobs</h2>
                        
                        <div class="date-badge">
                            <?= date("F Y"); ?>
                        </div>

                        <p>
                            🌐 <a href="https://www.teletalk.com" target="_blank">
                                www.teletalk.com
                            </a>
                        </p>
                    </div>
                    <section> 
                        <div class="container mt-4">
                            <form method="POST" action="" class="container mt-4">

                                <div class="card shadow">
                                    <div class="card-header bg-dark text-white">
                                        <h4 class="mb-0">Post Education Information</h4>
                                    </div>

                                    <div class="card-body">

                                        <div class="row g-3">

                                            <!-- Post Info -->
                                            <div class="col-md-4">
                                                <label class="form-label">Post Code</label>
                                                <input type="number" name="post_code" class="form-control" value="<?=$post_details->id?>" disabled>
                                            </div>

                                            <div class="col-md-8">
                                                <label class="form-label">Post Name</label>
                                                <input type="text" name="post_name" class="form-control" value="<?=$post_details->title?>" disabled>
                                            </div>

                                            <!-- Allowed Exams -->
                                            <div class="col-md-4 border">
                                                <label class="form-label" for="" >JSC Allowed Exam</label><br>
                                                <div class="form-check">
                                                    <input type="checkbox" id="jsc_allowed_exam" name="jsc_allowed_exam[]" class="form-check-input">
                                                    <label class="form-check-label" for="jsc_allowed_exam" >JSC</label>
                                                </div>
                                            </div>

                                            <div class="col-md-4 border" >
                                                <label class="form-label">SSC Allowed Exam</label>
                                                <div style="height:200px;overflow:scroll; scrollbar-width:none;">
                                                <?php $ssc_allowed = $jobpost_details->getData('bachelor_degrees',' * ', ' WHERE degree_level= 1'); 
                                                    foreach($ssc_allowed as $ssc_allowed_exam){ ?>
                                                <div class="form-check">
                                                     
                                                    <input type="checkbox" id="ssc_allowed_exam" name="ssc_allowed_exam[]" class="form-check-input">
                                                    <label class="form-check-label" for="ssc_allowed_exam" ><?= $ssc_allowed_exam['degree_name'] ?></label>
                                                    
                                                </div>
                                                <?php } ?>
                                                </div>

                                            </div>

                                            <div class="col-md-4 border" >
                                                <label class="form-label">HSC Allowed Exam</label>
                                                <div style="height:200px;overflow:scroll; scrollbar-width:none;">
                                                    <?php $hsc_allowed = $jobpost_details->getData('bachelor_degrees',' * ', ' WHERE degree_level= 2'); 
                                                    foreach($hsc_allowed as $hsc_allowed_exam){ ?>
                                                <div class="form-check">
                                                    
                                                    <input type="checkbox" id="hsc_allowed_exam" name="hsc_allowed_exam[]" class="form-check-input">
                                                    <label class="form-check-label" for="hsc_allowed_exam" ><?= $hsc_allowed_exam['degree_name'] ?></label>
                                                    
                                                </div>
                                                <?php } ?>
                                                </div>
                                                
                                            </div>

                                            <div class="col-md-4 border" >
                                                <label class="form-label">Graduation Allowed Exam</label>
                                                <div style="height:200px;overflow:scroll; scrollbar-width:none;">
                                                <?php $gra_allowed = $jobpost_details->getData('bachelor_degrees',' * ', ' WHERE degree_level= 3'); 
                                                foreach($gra_allowed as $gra_allowed_exam){ ?>
                                                <div class="form-check">
                                                    <input type="checkbox" id="gra_allowed_exam" name="gra_allowed_exam[]" class="form-check-input">
                                                    <label class="form-check-label" for="gra_allowed_exam" ><?= $gra_allowed_exam['degree_name'] ?></label>
                                                </div>
                                                <?php } ?>
                                                </div>
                                                
                                            </div>

                                            <div class="col-md-4 border">
                                                <label class="form-label">Masters Allowed Exam</label>
                                                <div style="height:200px;overflow:scroll; scrollbar-width:none;">
                                                <?php $mas_allowed = $jobpost_details->getData('bachelor_degrees',' * ', ' WHERE degree_level= 4'); 
                                                foreach($mas_allowed as $mas_allowed_exam){ ?>
                                                <div class="form-check">
                                                    <input type="checkbox" id="mas_allowed_exam" name="mas_allowed_exam[]" class="form-check-input">
                                                    <label class="form-check-label" for="mas_allowed_exam" ><?= $mas_allowed_exam['degree_name'] ?></label>
                                                </div>
                                                <?php } ?>
                                                </div>
                                            </div>

                                            <div class="col-md-4 border">
                                                <label class="form-label">MPH Allowed Exam</label>
                                                <div class="form-check">
                                                    <input type="checkbox" id="mph_allowed_exam" name="mph_allowed_exam[]" class="form-check-input">
                                                    <label class="form-check-label" for="mph_allowed_exam" >JSC Allowed Exam</label>
                                                </div>
                                                
                                            </div>

                                            <div class="col-md-4 border">
                                                <label class="form-label">PhD Allowed Exam</label>
                                                <div class="form-check">
                                                    <input type="checkbox" id="phd_allowed_exam" name="phd_allowed_exam[]" class="form-check-input">
                                                    <label class="form-check-label" for="phd_allowed_exam" >JSC Allowed Exam</label>
                                                </div>
                                                
                                            </div>

                                            <!-- Allowed Subjects -->
                                            <div class="col-md-4">
                                                <label class="form-label">SSC Allowed Subject</label>
                                                <textarea name="ssc_allowed_sub" class="form-control" rows="2"></textarea>
                                            </div>

                                            <div class="col-md-4">
                                                <label class="form-label">HSC Allowed Subject</label>
                                                <textarea name="hsc_allowed_sub" class="form-control" rows="2"></textarea>
                                            </div>

                                            <div class="col-md-4">
                                                <label class="form-label">Graduation Allowed Subject</label>
                                                <textarea name="gra_allowed_sub" class="form-control" rows="2"></textarea>
                                            </div>

                                            <div class="col-md-4">
                                                <label class="form-label">Masters Allowed Subject</label>
                                                <textarea name="mas_allowed_sub" class="form-control" rows="2"></textarea>
                                            </div>

                                            <div class="col-md-4">
                                                <label class="form-label">MPH Allowed Subject</label>
                                                <textarea name="mph_allowed_sub" class="form-control" rows="2"></textarea>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="form-label">PhD Allowed Subject</label>
                                                <textarea name="phd_allowed_sub" class="form-control" rows="2"></textarea>
                                            </div>

                                            <!-- Minimum Result -->
                                            <div class="col-md-2">
                                                <label class="form-label">SSC Min Result</label>
                                                <input type="number" name="ssc_min_result_eq" class="form-control">
                                            </div>

                                            <div class="col-md-2">
                                                <label class="form-label">HSC Min Result</label>
                                                <input type="number" name="hsc_min_result_eq" class="form-control">
                                            </div>

                                            <div class="col-md-2">
                                                <label class="form-label">Graduation Min Result</label>
                                                <input type="number" name="gra_min_result_eq" class="form-control">
                                            </div>

                                            <div class="col-md-2">
                                                <label class="form-label">Masters Min Result</label>
                                                <input type="number" name="mas_min_result_eq" class="form-control">
                                            </div>

                                            <div class="col-md-2">
                                                <label class="form-label">MPH Min Result</label>
                                                <input type="number" name="mph_min_result_eq" class="form-control">
                                            </div>

                                            <div class="col-md-2">
                                                <label class="form-label">PhD Min Result</label>
                                                <input type="number" name="phd_min_result_eq" class="form-control">
                                            </div>

                                        </div>

                                    </div>

                                    <div class="card-footer text-end">
                                        <button type="submit" class="btn btn-primary">
                                            Save Information
                                        </button>
                                    </div>

                                </div>

                            </form>  
                        </div>
                    </section>    
                </div>
            </div>
        </div>
    
        

        
	
    </div>
	
	<!--==================================================================-->
	<?php require "layouts/scripts.php" ?>
	
</body>

</html>
<!-- CREATE TABLE job_post_edu (
    id INT(11) NOT NULL AUTO_INCREMENT,
    
    job_code INT(3) NOT NULL,
    job_title VARCHAR(200) NOT NULL,

    jsc_allowed_exam VARCHAR(100) NULL,
    ssc_allowed_exam VARCHAR(100) NULL,
    hsc_allowed_exam VARCHAR(100) NULL,
    gra_allowed_exam VARCHAR(100) NULL,
    mas_allowed_exam VARCHAR(100) NULL,
    mph_allowed_exam VARCHAR(100) NULL,
    phd_allowed_exam VARCHAR(100) NULL,

    ssc_allowed_sub VARCHAR(200) NULL,
    hsc_allowed_sub VARCHAR(200) NULL,
    gra_allowed_sub VARCHAR(800) NULL,
    mas_allowed_sub VARCHAR(800) NULL,
    mph_allowed_sub VARCHAR(800) NULL,
    phd_allowed_sub VARCHAR(800) NULL,

    ssc_min_result_eq INT(1) NULL,
    hsc_min_result_eq INT(1) NULL,
    gra_min_result_eq INT(1) NULL,
    mas_min_result_eq INT(1) NULL,
    mph_min_result_eq INT(1) NULL,
    phd_min_result_eq INT(1) NULL,

    PRIMARY KEY (id),

    CONSTRAINT fk_post_edu_post_code
        FOREIGN KEY (job_code)
        REFERENCES jobs(id)
        ON DELETE CASCADE
        ON UPDATE CASCADE

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4; -->