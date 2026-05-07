<?php
   require_once 'database/database.php';
    $limit=10;
    $pagination = isset($_GET['pagination']) ? (int)$_GET['pagination'] : 1;
    $offset = ($pagination - 1)*$limit;
    $jobpost = new datamodel();
    
    $totalData = $jobpost->getData('jobs',' COUNT(*) as total ');
    $totalRows = $totalData[0]['total'];
    $totalpaginations = ceil($totalRows / $limit);
  
    $allposts = $jobpost->getData('jobs',' * ', '', $limit, $offset);
    
    

?>
<!doctype html>
<html class="no-js" lang="en">

<?php require "layouts/head.php" ?>
<style>
    .top-content {
        background: linear-gradient(135deg, #0d6efd, #0dcaf0);
        color: #fff;
        padding: 30px 20px;
        border-radius: 12px;
        box-shadow: 0 6px 15px rgba(0,0,0,0.1);
        margin-bottom: 25px;
    }

    .top-content h2 {
        font-weight: 700;
        margin-bottom: 10px;
    }

    .top-content p {
        margin: 5px 0;
        font-size: 16px;
    }

    .top-content a {
        color: #fff;
        text-decoration: none;
        font-weight: 500;
        border-bottom: 1px solid rgba(255,255,255,0.6);
        transition: 0.3s;
    }

    .top-content a:hover {
        color: #ffe082;
        border-bottom: 1px solid #ffe082;
    }

    .top-content .date-badge {
        display: inline-block;
        background: rgba(255,255,255,0.2);
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 14px;
        margin-bottom: 10px;
    }
   
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
                        <div class="card shadow">
                            
                            <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                                <h4 class="mb-0">Job Management</h4>
                                <a href="add_job.php" class="btn btn-light btn-sm">
                                    + Add New Post
                                </a>
                            </div>
                            <nav>
                                <ul class="pagination justify-content-center py-3">

                                    <!-- Prev Button -->
                                    <li class="pagination-item <?= ($pagination <= 1) ? 'disabled' : '' ?>">
                                        <a class="pagination-link " href="index.php?page=postjob&pagination=<?= ($pagination <= 1) ? 1 : $pagination - 1 ?>" >Prev</a>
                                    </li>

                                    <!-- pagination Numbers -->
                                    <?php for($i = 1; $i <= $totalpaginations; $i++): ?>
                                        <li class="pagination-item <?= ($pagination == $i) ? 'active' : '' ?>">
                                            <a class="pagination-link" href="index.php?page=postjob&pagination=<?= $i ?>">
                                                <?= $i ?>
                                            </a>
                                        </li>
                                    <?php endfor; ?>

                                    <!-- Next Button -->
                                    <li class="pagination-item <?= ($pagination >= $totalpaginations) ? 'disabled' : '' ?>">
                                        <a class="pagination-link" href="index.php?page=postjob&pagination=<?= ($pagination >= $totalpaginations) ? $totalpaginations : $pagination + 1 ?>">Next</a>
                                    </li>

                                </ul>
                            </nav>
                            <div class="card-body">
                                <!-- filter row -->
                                 <div class="row mb-3 align-items-center">
                                    <div class="col-md-2">
                                        <input type="text" class="form-control" placeholder="Search title...">
                                    </div>

                                    

                                    <div class="col-md-2">
                                        <input type="number" class="form-control" placeholder="salary">
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" class="form-control" placeholder="Search title...">
                                    </div>
                                    <div class="col-md-2">
                                        <input type="date" class="form-control">
                                    </div>
                                    <div class="col-md-1">
                                        <select class="form-select">
                                            <option value="">Job Type</option>
                                            <option>Full Time</option>
                                            <option>Part Time</option>
                                            <option>Contract</option>
                                        </select>
                                    </div>

                                    <div class="col-md-3 text-end">
                                        <button class="btn btn-primary">Filter</button>
                                        <button class="btn btn-secondary">Reset</button>
                                    </div>
                                </div>
                                <!-- Header Row -->
                                <div class="row fw-bold border-bottom pb-2 mb-2 text-center">
                                    <div class="col-md-2">Title</div>
                                    <div class="col-md-2">Salary</div>
                                    <div class="col-md-2">Location</div>
                                    <div class="col-md-2">Deadline</div>
                                    <div class="col-md-1">Type</div>
                                    <div class="col-md-3">Actions</div>
                                </div>
                                <?php
                                foreach($allposts as $allpost){
                                ?>
                                <div class="row align-items-center border-bottom py-2 text-center">
                                    <div class="col-md-2"><?=$allpost['title']?></div>
                                    <div class="col-md-2"><?=$allpost['salary']?></div>
                                    <div class="col-md-2"><?=$allpost['location']?></div>
                                    <div class="col-md-2"><?= date(" d F Y", strtotime($allpost['deadline'])); ?></div>
                                    <div class="col-md-1"><?=$allpost['job_type']?></div>

                                    <div class="col-md-3">
                                        <a href="index.php?page=jobdetails&job_id=<?= $allpost['id']?>" class="btn btn-sm btn-info mb-1">Show</a>
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