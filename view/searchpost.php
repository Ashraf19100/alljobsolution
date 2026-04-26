<?php  
require_once 'database/database.php';

$searchjob = new datamodel();
if(!empty($_GET['search'])){
    if($_GET['search'] == 'gov' || $_GET['search'] == 'non_gov' ){
        $condition = " WHERE job_type = '".$_GET['search']."'";
    }else{
        $condition = " WHERE title LIKE '%".$_GET['search']."%' OR description LIKE '%".$_GET['search']."%' OR requirements LIKE '%".$_GET['search']."%' OR location LIKE '%".$_GET['search']."%' OR emp_status LIKE '%".$_GET['search']."%' OR emp_work_place LIKE '%".$_GET['search']."%'";
    }
    
    $searchresult = $searchjob->getData('jobs', ' * ', $condition);
	 
    
    
}

    
?>

<div class="jobs ">
    <div class="job-head">
        <h1 class="text-center text-capitalize text-success py-3"> Result for  <?php if($_GET['search'] == 'gov'){
            echo"Governnment Jobs";
        }elseif($_GET['search'] == 'non_gov'){
            echo "Non Governnment Jobs";
        }else{
            echo $_GET['search'];
        }   ?></h1>
    </div>
    <div class="row">
        
        <?php if(!empty($searchresult)){  foreach($searchresult as $searchresult) {?>
        <div class="col-md-4 py-2">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">

                    <div class="d-flex align-items-center mb-3">
                        <img src="assets/img/bang-gov-logo.png" width="60" class="me-3">
                        <div>
                        <h6 class="mb-0"><?= $searchresult['title'] ?></h6>
                        <?php
                                    $condition = " WHERE id = ". $searchresult['company_id'] ;
                                    
                                    $companies = $searchjob->getData('companies',' * ', $condition ); 
                                    foreach($companies as $companie){
                                    ?>
                        <small class="text-muted"><?= $companie['company_name'] ?></small>
                        <?php } ?>
                        </div>
                    </div>

                    <p class="mb-1"><i class="fa fa-map-marker-alt text-info"></i><?= $searchresult['location'] ?></p>
                    <p class="mb-1"><i class="fa fa-briefcase text-info"></i>  <?= $searchresult['emp_status'] ?></p>
                    <p class="text-danger mb-2">Deadline:  <?= $searchresult['deadline'] ?></p>

                    <a href="index.php?page=jobdetails&job_id=<?= $searchresult['id']?>" class="btn btn-info w-100 text-white">View Details</a>

                </div>
            </div>
        
        </div>
        
        <?php }}else{
            echo "<h3 class='text-center text-danger p-5'> No Data Found</h3>";
        } ?>
    </div>

</div>