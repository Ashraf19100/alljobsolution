<?php  
require_once 'database/database.php';
if(isset($_GET['job_id'])){ 
       $condition = " WHERE id = ".$_GET['job_id'] ." ";                         

} 
$alljob = new datamodel();
$single_job = $alljob->getSingleData('jobs', ' * ', $condition);  

$company_id = " WHERE id = ".$single_job->company_id ." ";
$company_name = $alljob->getSingleData('companies', ' * ', $company_id);

if($single_job->mas_required == 1){
    $min_edu = "Masters"; 
    $institution = "Reputated University";
    $subject= "CSE";
}elseif($single_job->gra_required == 1){
    $min_edu = "Bachelor"; 
    $institution = "Reputated University";
    $subject= "CSE";
}elseif($single_job->hsc_required == 1){
    $min_edu = "Higher Secondary Certificate"; 
    $institution = "Board ";
    $subject= "science";
}elseif($single_job->ssc_required == 1){
$min_edu = "Secondary School Certificate"; 
    $institution = "BBoard ";
    $subject= "science";
}else{
$min_edu = "Class 8"; 
    $institution = "Reputated School";
    $subject= "any subject";
}

$responsibility= explode('.', $single_job->description);


    
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
                    <div class="container mt-2">
                        <div class="card shadow p-4">
                            <div class="bg-info text-white p-4 rounded-top">
                                <div class="information_header d-flex align-item-center justify-content-between">
                                    <div class="job-heading">
                                        <h4 class=""><?= $company_name->company_name ?></h4>
                                        <h3 class=""><?= $single_job->title ?></h3>
                                        <h6 class="">Application Deadline: <span class="text-danger"><?= $single_job->deadline ?></span> </h6>

                                    </div>
                                    <div class="text-center">
                                        <a href="index.php?page=application&job_id= <?=$single_job->id ?>" class="btn btn-success px-4">APPLY NOW</a>
                                    </div>
                                </div>
                            </div>

                            <div class="job-summary p-4 rounded-top shadow mt-4 d-flex align-item-center justify-content-between">
                                <div class="company-logo w-25">
                                    <img src="assets/img/bang-gov-logo.png" alt="" style="width:100px; height:100px">
                                </div>
                                <div class="w-75 company-details p-2 text-left row">
                                    <div class="col-4">
                                        <p><strong>Vaccancy:</strong>........</p>
                                        <p><strong>Salary:</strong><?=$single_job->salary?></p>
                                    </div>
                                    <div class="col-4">
                                        <p><strong>Age at Most:</strong><?= 32 ?></p>
                                        <p><strong>Experience:</strong><?=$single_job->min_job_exp_year ?></p>
                                    </div>
                                    <div class="col-4">
                                        <p><strong>Location:</strong><?=$single_job->location ?></p>
                                        <p><strong>Application Starting from:</strong><?=$single_job->app_start_time ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="requirements shadow p-4 mt-4">
                                <h3 class="fs-3 fw-bold text-success">Requirements</h3>
                                <div class="education py-2">
                                    <h5 class="fs-5 fw-bold">Education</h5>
                                    <ul>
                                        <li>Candidate Must have a Degree of <?= $min_edu ?> from any <?= $institution ?> in <?= $subject ?></li>
                                    </ul>
                                </div>
                                <div class="addi_requirements py-2">
                                    <h5 class="fs-5 fw-bold">Additional Requirements</h5>
                                    <ul>
                                        <li>Candidate Must have Knowledge in the field of <?= $single_job->requirements ?> </li>
                                    </ul>
                                </div>
                                <div class="experience py-2 ">
                                    <h5 class="fs-5 fw-bold">Experience</h5>
                                    <ul>
                                        <?php if($single_job->job_exp_required !=0 ){ ?>
                                        <li>Candidate must have minimum of <?= $single_job->min_job_exp_year ?> year experienece in related field</li> <?php }else{?><li>Candidate with experienece in related field will get preference</li>
                                        <li>Freashers are encouraged to apply</li> <?php } ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="responsibility p-4 mt-4 shadow">
                                
                                <div class="description">
                                    <h3 class="fs-3 fw-bold text-success">Responsibilities</h3>
                                    <ol>
                                        <?php $i=0; 
                                        foreach($responsibility as $responsibility){?>
                                        
                                        <li><?= $responsibility ?></li>
                                        <?php $i++; } ?>
                                    </ol>
                                </div>
                                <div class="company-benifits">
                                    <h3 class="fs-3 fw-bold text-success">Compensation & Other Benefits</h3>
                                    <ol>
                                        <li>Lunch Facilities: Partially Subsidize</li>
                                        <li>Festival Bonus: 2</li>
                                        <li>A competitive salary structure.</li>
                                        <li>An exceptional working environment with supportive peers and mentors.</li>
                                        <li>Lots of challenges and even more scope to implement your ideas.</li>
                                    </ol>
                                </div>
                                <div class="others">
                                    <h3 class="fs-3 fw-bold text-success">Workplace</h3>
                                    <p>Work at office</p>
                                    <h3 class="fs-3 fw-bold text-success">Employment Status</h3>
                                    <p>Full Time</p>
                                    <h3 class="fs-3 fw-bold text-success">Job Location</h3>
                                    <p><?= $single_job->location?></p>
                                </div>
                                

                            </div>
                            <div class="company-information p-4 shadow mt-4">
                                <h4 class="fs-3 fw-bold text-success">Company Information</h4>
                                <h5><?=$company_name->company_name ?></h3>
                                <h6>Address:</h5>
                                <p><?=$company_name->location ?></p>
                                <h6>Description</h5>
                                <p><?= $company_name->description ?></p> 
                            </div>
                            <div class="apply-link p-4 mt-4 shadow text-center">
                                <a href="index.php?page=application&job_id= <?=$single_job->id ?>" class="btn btn-success px-4">APPLY NOW</a>
                            </div>

                 
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

