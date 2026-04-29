<?php
require_once 'database/database.php';

$alljob = new datamodel();
$result = $alljob->getData('jobs');


?>
<div class="jobs my-5">
    <div class="job-head">
        <h1 class="text-center text-capitalize  py-3 mb-4 fw-bold " style="color:#1e3c72">All Jobs</h1>
    </div>
    <div class="row">
    <?php foreach($result as $job) {?>
        <div class="col-md-4 py-2">
            <div class="card border-2 shadow-sm h-100" >
                <div class="card-body">

                    <div class="d-flex align-items-center mb-3">
                        <img src="assets/img/bang-gov-logo.png" width="60" class="me-3">
                        <div>
                        <h6 class="mb-0"><?= $job['title'] ?></h6>
                        <?php
                                    $condition = " WHERE id = ". $job['company_id'] ;
                                    
                                    $companies = $alljob->getData('companies',' * ', $condition ); 
                                    foreach($companies as $companie){
                                    ?>
                        <small class="text-muted"><?= $companie['company_name'] ?></small>
                        <?php } ?>
                        </div>
                    </div>

                    <p class="mb-1"><i class="fa fa-map-marker-alt text-info"></i><?= $job['location'] ?></p>
                    <p class="mb-1"><i class="fa fa-briefcase text-info"></i>  <?= $job['emp_status'] ?></p>
                    <p class="text-danger mb-2">Deadline:  <?= $job['deadline'] ?></p>

                    <a href="index.php?page=jobdetails&job_id=<?= $job['id']?>" class="btn w-100 text-white" style="background: linear-gradient(135deg, #8aa6da, #ff7e00, #ff7e00); ">View Details</a>

                </div>
            </div>
        
        </div>
    <?php } ?>
    </div>
        
</div>