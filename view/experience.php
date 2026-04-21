<?php  
require_once 'database/database.php';

$experience = new datamodel();   
$condition = " WHERE user_id ='".$_SESSION['id']."'";
$experience_info = $experience->getData('user_experience',' * ', $condition );   



    
?>

<!doctype html>
<html class="no-js" lang="en">

<?php require "layouts/head.php" ?>

<body>
	<div class="wrapper p-2">	
        <div class="row">
        <?php require "layouts/sidemenu.php" ?>
        <div class="col-md-10">
            <div class="content container">
                <div class="search_area">
                    <form action="">
                        <input class="w-75 p-2 shadow-sm border-0 text-start text-uppercase text-info" type="text" name="search" placeholder="search your desire position">
                        <button type="submit" class="btn btn-info shadow-sm border-0 text-start text-uppercase text-white ">Search</button>
                    </form>
                </div>
                <div class="information-section ">
                    <div class="container">
                        <div class="card shadow add-btn-action " id="add_degree">
                            <h3 class="mb-4 text-center">Experience</h3>
                            <form action="index.php?page=experience-submit" method="POST">
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

                                <!-- Submit -->
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary px-5">Submit</button>
                                </div>

                            </form>
                        </div>
                    </div>
                    <div class="container mt-5">
                    <div class="card p-4 shadow-lg border-0 rounded-4">

                        <!-- Header -->
                        <div class="bg-primary text-white p-4 rounded-top">
                            <div class="information_header d-flex align-item-center justify-content-between">
                                <div class="p-3 text-left">
                                        <h4 class="">Job Experience of</h4>
                                        <h5 class=""><?= $_SESSION['name'] ?? 'N/A' ?></h5>
                                </div>
                                <div class="text-center">
                                    <button id='edit_btn' class="btn btn-info px-4">ADD Experience</button>
                                </div>
                            </div>
                        </div>

                        <!-- Body -->
                        <div class="card-body p-2">
                            <?php if(isset($_GET['message'])){ 
                                echo  '<h3 class="text-danger text-center p-2">'.$_GET['message'].'</h3>';

                                } ?>
                            <div class="row g-2">
                                <?php 
                                if(isset($experience_info)){
                                    foreach($experience_info as $row){
                                        
                                ?>
                                <div class="card-body">

                                    <!-- Job Title & Company -->
                                    <h5 class="card-title mb-1"><?= $row['job_title'] ?? "N/A" ?></h5>
                                    <h6 class="text-muted"><?= $row['company_name'] ?? "N/A" ?></h6>

                                    <!-- Date & Location -->
                                    <p class="text-muted mb-2">
                                        <?php if(isset($row['start_date'])){ echo "from". $row['start_date'] ."to". $row['end_date']; }  ?>
                                    </p>

                                    <!-- Description -->
                                    <p class="card-text">
                                        <?= $row['description'] ?? "N/A" ?>
                                    </p>

                                    <!-- Optional badge -->
                                     <?php if(isset($row['is_current']) && $row['is_current'] == 1){ ?>
                                    <span class="badge bg-success">Current</span>
                                    <?php } ?>
                                </div>
                                
                                   <?php }
                                }?>


                            </div>

                            

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