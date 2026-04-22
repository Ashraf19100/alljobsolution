<?php
require_once 'database/database.php';

$alljob = new datamodel();
$result = $alljob->getData('jobs');


?>
<div class="jobs ">
    <div class="job-head">
        <h1 class="text-center ">ALL JOB</h1>
    </div>
    <div class="row">
        
        <?php foreach($result as $job) {?>
        <div class="col-md-4 my-2">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <div class="company-logo ">
                        <img class="" src="assets/img/bang-gov-logo.png" alt="" style="width:100px; height:100px">
                    </div>
                    <h5 class="card-title"><?= $job['title'] ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?php
                        $condition = " WHERE id = ". $job['company_id'] ;
                        
                        $companies = $alljob->getData('companies',' * ', $condition ); 
                        foreach($companies as $companie){
                        ?>
                        <h4 class="fs-6 fw-light"><?= $companie['company_name'] ?></h4>
                        <?php } ?></h6>
                    <p><strong>Location:</strong> <?= $job['location'] ?></p>
                    <p><strong>Salary:</strong> $80,000 - $120,000</p>
                    <p class="text-danger"> Deadline:<strong><?= $job['deadline'] ?></strong></p>
                    <a href="index.php?page=jobdetails&job_id=<?= $job['id']?>" class="btn btn-primary w-100">Details</a>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>

</div>