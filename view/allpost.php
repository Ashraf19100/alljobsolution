<?php
require_once 'database/database.php';

$alljob = new datamodel();
$result = $alljob->getData('jobs');


?>
<div class="jobs ">
    <div class="job-head">
        <h1 class="text-center">ALL JOB</h1>
    </div>
    <div class="row">
        <?php foreach($result as $job) {?>
        <div class="col-md-4">
            <div class="jobcard p-2 my-3">
                <div class="card-detail d-flex">
                    <div class="company-logo">
                        <img src="assets/img/bang-gov-logo.png" alt="" style="width:100px; height:100px">
                    </div>
                    <div class="company-details p-2 text-left">
                        <h2 class="fs-6"><?= $job['title'] ?></h2>
                            
                        <?php
                        $condition = " WHERE id = ". $job['company_id'] ;
                        
                        $companies = $alljob->getData('companies',' * ', $condition ); 
                        foreach($companies as $companie){
                        ?>
                        <h4 class="fs-6 fw-light"><?= $companie['company_name'] ?></h4>
                        <?php } ?>
                        <p><?= $job['location'] ?></p>
                        <p class="text-danger"> Deadline:<strong><?= $job['deadline'] ?></strong></p>
                    </div>
                </div>
            
                <a href="index.php?page=jobdetails&job_id=<?= $job['id']?>" class="w-100 btn bg-info m-1 text-center text-white">Details</a>
            </div>
        </div>
        <?php } ?>
    </div>

</div>