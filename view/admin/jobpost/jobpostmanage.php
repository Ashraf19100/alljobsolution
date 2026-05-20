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
                    <section> 
                        <div class="container mt-4">
                            <form method="POST" action="index.php?page=jobedu" class="container mt-4">

                                <div class="card shadow">
                                    <div class="card-header bg-dark text-white">
                                        <h4 class="mb-0">Post Education Information</h4>
                                    </div>

                                    <div class="card-body">

                                        <div class="row g-3">

                                            <!-- Post Info -->
                                            <div class="col-md-4">
                                                <label class="form-label">Post Code</label>
                                                <input type="number" name="job_code" class="form-control" value="<?=$post_details->id?>" >
                                            </div>

                                            <div class="col-md-8">
                                                <label class="form-label">Post Name</label>
                                                <input type="text" name="job_title" class="form-control" value="<?=$post_details->title?>" >
                                            </div>

                                            <!-- Allowed Exams -->
                                            <div class="col-md-4 border" >
                                                <label class="form-label">SSC Allowed Exam</label>
                                                <div style="height:200px;overflow:scroll; scrollbar-width:none;">
                                                <?php $ssc_allowed = $jobpost_details->getData('bachelor_degrees',' * ', ' WHERE degree_level= 1'); 
                                                    foreach($ssc_allowed as $ssc_allowed_exam){ ?>
                                                <div class="form-check">
                                                     
                                                    <input type="checkbox" id="ssc_allowed_exam" name="ssc_allowed_exam[]" class="form-check-input" value="<?= $ssc_allowed_exam['id'] ?>" >
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
                                                    
                                                    <input type="checkbox" id="hsc_allowed_exam" name="hsc_allowed_exam[]" class="form-check-input" value="<?= $hsc_allowed_exam['id'] ?>">
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
                                                    <input type="checkbox" id="gra_allowed_exam" name="gra_allowed_exam[]" class="form-check-input" value="<?= $gra_allowed_exam['id'] ?>">
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
                                                    <input type="checkbox" id="mas_allowed_exam" name="mas_allowed_exam[]" class="form-check-input" value="<?= $mas_allowed_exam['id'] ?>">
                                                    <label class="form-check-label" for="mas_allowed_exam" ><?= $mas_allowed_exam['degree_name'] ?></label>
                                                </div>
                                                <?php } ?>
                                                </div>
                                            </div>

                                            <div class="col-md-4 border">
                                                <label class="form-label">MPH Allowed Exam</label>
                                                <div style="height:200px;overflow:scroll; scrollbar-width:none;">
                                                <?php $mph_allowed = $jobpost_details->getData('bachelor_degrees',' * ', ' WHERE degree_level= 5'); 
                                                foreach($mph_allowed as $mph_allowed_exam){ ?>
                                                <div class="form-check">
                                                    <input type="checkbox" id="mph_allowed_exam" name="mph_allowed_exam[]" class="form-check-input" value="<?= $mph_allowed_exam['id'] ?>">
                                                    <label class="form-check-label" for="mph_allowed_exam" ><?= $mph_allowed_exam['degree_name'] ?></label>
                                                </div>
                                                <?php } ?>
                                                </div>   
                                            </div>

                                            <div class="col-md-4 border">
                                                <label class="form-label">PhD Allowed Exam</label>
                                                <div style="height:200px;overflow:scroll; scrollbar-width:none;">
                                                    <?php $phd_allowed = $jobpost_details->getData('bachelor_degrees',' * ', ' WHERE degree_level= 5'); 
                                                    foreach($phd_allowed as $phd_allowed_exam){ ?>
                                                    <div class="form-check">
                                                        <input type="checkbox" id="phd_allowed_exam" name="phd_allowed_exam[]" class="form-check-input" value="<?= $phd_allowed_exam['id'] ?>">
                                                        <label class="form-check-label" for="phd_allowed_exam" ><?= $phd_allowed_exam['degree_name'] ?></label>
                                                    </div>
                                                    <?php } ?>
                                                </div> 
                                            </div>

                                            <!-- Allowed Subjects -->
                                            <div class="col-md-4 border">
                                                <label class="form-label">SSC Allowed Subject</label>
                                                
                                                    <div class="form-check">
                                                        <input type="checkbox" name="ssc_allowed_sub[]" id="ssc_allowed_sub" class="form-check-input" vlaue="ssc_science, ssc_business, ssc_humanities">
                                                        <label class="form-check-label" for="ssc_allowed_sub">All</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input type="checkbox" name="ssc_allowed_sub[]" id="ssc_allowed_sub" class="form-check-input" value="ssc_science">
                                                        <label class="form-check-label" for="ssc_allowed_sub">SCience</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input type="checkbox" name="ssc_allowed_sub[]" id="ssc_allowed_sub" class="form-check-input" value="ssc_business">
                                                        <label class="form-check-label" for="ssc_allowed_sub">Business</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input type="checkbox" name="ssc_allowed_sub[]" id="ssc_allowed_sub" class="form-check-input" value="ssc_humanities">
                                                        <label class="form-check-label" for="ssc_allowed_sub">Humanities</label>
                                                    </div>
                                                
                                            </div>

                                            <div class="col-md-4 border">
                                                <label class="form-label">HSC Allowed Subject</label>
                                                    <div class="form-check">
                                                        <input type="checkbox" name="hsc_allowed_sub[]" id="hsc_allowed_sub" class="form-check-input" value="hsc_science, hsc_business, hsc_humanities">
                                                        <label class="form-check-label" for="hsc_allowed_sub">All</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input type="checkbox" name="hsc_allowed_sub[]" id="hsc_allowed_sub" class="form-check-input" value="hsc_science">
                                                        <label class="form-check-label" for="hsc_allowed_sub">SCience</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input type="checkbox" name="hsc_allowed_sub[]" id="hsc_allowed_sub" class="form-check-input" value="hsc_business">
                                                        <label class="form-check-label" for="hsc_allowed_sub">Business</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input type="checkbox" name="hsc_allowed_sub[]" id="hsc_allowed_sub" class="form-check-input" value="hsc_humanities">
                                                        <label class="form-check-label" for="hsc_allowed_sub">Humanities</label>
                                                    </div>
                                                
                                            </div>

                                            <div class="col-md-4 border">
                                                <label class="form-label">Graduation Allowed Subject</label>
                                                <div class="form-check">
                                                    <input type="checkbox" name="gra_allowed_sub[]" id="gra_allowed_sub" class="form-check-input" value="gra_science, gra_business, gra_arts">
                                                    <label class="form-check-label" for="gra_allowed_sub">All</label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="checkbox" name="gra_allowed_sub[]" id="gra_allowed_sub" class="form-check-input" value="gra_science">
                                                    <label class="form-check-label" for="gra_allowed_sub">science</label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="checkbox" name="gra_allowed_sub[]" id="gra_allowed_sub" class="form-check-input" value="gra_business">
                                                    <label class="form-check-label" for="gra_allowed_sub">Business</label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="checkbox" name="gra_allowed_sub[]" id="gra_allowed_sub" class="form-check-input" value="gra_arts">
                                                    <label class="form-check-label" for="gra_allowed_sub">Arts</label>
                                                </div>
                                            </div>

                                            <div class="col-md-4 border">
                                                <label class="form-label">Masters Allowed Subject</label>
                                                <div class="form-check">
                                                    <input type="checkbox" name="mas_allowed_sub[]" id="mas_allowed_sub" class="form-check-input" value="Msc , MBA, MA">
                                                    <label class="form-check-label" for="mas_allowed_sub">All</label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="checkbox" name="mas_allowed_sub[]" id="mas_allowed_sub" class="form-check-input" value="MSc">
                                                    <label class="form-check-label" for="mas_allowed_sub">science</label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="checkbox" name="mas_allowed_sub[]" id="mas_allowed_sub" class="form-check-input" value="MBA">
                                                    <label class="form-check-label" for="mas_allowed_sub">Business</label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="checkbox" name="mas_allowed_sub[]" id="mas_allowed_sub" class="form-check-input" value="MA">
                                                    <label class="form-check-label" for="mas_allowed_sub">Arts</label>
                                                </div>
                                            </div>

                                            <div class="col-md-4 border">
                                                <label class="form-label">MPH Allowed Subject</label>
                                                <div class="form-check">
                                                    <input type="checkbox" name="mph_allowed_sub[]" id="mph_allowed_sub" class="form-check-input" value="">
                                                    <label class="form-check-label" for="mph_allowed_sub">All</label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="checkbox" name="mph_allowed_sub[]" id="mph_allowed_sub" class="form-check-input" value="">
                                                    <label class="form-check-label" for="mph_allowed_sub">science</label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="checkbox" name="mph_allowed_sub[]" id="mph_allowed_sub" class="form-check-input" value="">
                                                    <label class="form-check-label" for="mph_allowed_sub">Business</label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="checkbox" name="mph_allowed_sub[]" id="mph_allowed_sub" class="form-check-input" value="">
                                                    <label class="form-check-label" for="mph_allowed_sub">Arts</label>
                                                </div>
                                            </div>

                                            <div class="col-md-4 border">
                                                <label class="form-label">PhD Allowed Subject</label>
                                                <div class="form-check">
                                                    <input type="checkbox" name="phd_allowed_sub[]" id="phd_allowed_sub" class="form-check-input" value="">
                                                    <label class="form-check-label" for="phd_allowed_sub">All</label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="checkbox" name="phd_allowed_sub[]" id="phd_allowed_sub" class="form-check-input" value="">
                                                    <label class="form-check-label" for="phd_allowed_sub">science</label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="checkbox" name="phd_allowed_sub[]" id="phd_allowed_sub" class="form-check-input" value="">
                                                    <label class="form-check-label" for="phd_allowed_sub">Business</label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="checkbox" name="phd_allowed_sub[]" id="phd_allowed_sub" class="form-check-input" value="" value="">
                                                    <label class="form-check-label" for="phd_allowed_sub">Arts</label>
                                                </div>
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