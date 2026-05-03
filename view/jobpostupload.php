<?php
   require_once 'database/database.php';

    $jobpost = new datamodel();
    $allposts = $jobpost->getData('jobs');

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
                <div class="top-content text-center">
                    <h2>List of Uploaded Jobs </h2>
                    <p><strong><?=date("m-y");?></strong></p>
                    <p><a href="https://www.teletalk.com">www.teletalk.com</a></p>

                </div>            
                <section> 
                    <div class="container mt-4">
                        <div class="card shadow">
                            
                            <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                                <h4 class="mb-0">Job Management</h4>
                                <a href="add_job.php" class="btn btn-light btn-sm">
                                    + Add New Post
                                </a>
                            </div>

                            <div class="card-body">

                                <!-- Header Row -->
                                <div class="row fw-bold border-bottom pb-2 mb-2 text-center">
                                    <div class="col-md-2">Title</div>
                                    <div class="col-md-2">Description</div>
                                    <div class="col-md-1">Salary</div>
                                    <div class="col-md-1">Location</div>
                                    <div class="col-md-2">Deadline</div>
                                    <div class="col-md-1">Type</div>
                                    <div class="col-md-3">Actions</div>
                                </div>
                                <?php
                                foreach($allposts as $allpost){
                                ?>
                                <div class="row align-items-center border-bottom py-2 text-center">
                                    <div class="col-md-2"><?=$allpost['title']?></div>
                                    <div class="col-md-2 text-truncate"><?=$allpost['description']?></div>
                                    <div class="col-md-1"><?=$allpost['salary']?></div>
                                    <div class="col-md-1"><?=$allpost['location']?></div>
                                    <div class="col-md-2"><?=$allpost['deadline']?></div>
                                    <div class="col-md-1"><?=$allpost['job_type']?></div>

                                    <div class="col-md-3">
                                        <a href="" class="btn btn-sm btn-info mb-1">Show</a>
                                        <a href="" class="btn btn-sm btn-warning mb-1">Edit</a>
                                        <a href="" class="btn btn-sm btn-success mb-1">Active</a>
                                        <a href="" class="btn btn-sm btn-danger mb-1">Delete</a>
                                    </div>
                                </div>
                            <?php } ?>
                            </div>
                        </div>
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