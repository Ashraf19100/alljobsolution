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
    $jobcategories = $jobpost->getData('category',' * ', '');
    $jobcompanies = $jobpost->getData('companies',' * ', '');
    
    

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
                                <a href="add_job.php" class="btn btn-light btn-sm" data-bs-toggle="modal" data-bs-target="#jobpostModal">
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
                        <div class="modal fade" id="jobpostModal" tabindex="-1">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                <div class="modal-content rounded-4">
                                        <form action="index.php?page=jobpost_upload_submit" method="POST" class="container my-5">

                                            <div class="card shadow-lg border-0 rounded-4">
                                                
                                                <!-- Header -->
                                                <div class="card-header bg-primary text-white py-3 rounded-top-4">
                                                    <h3 class="mb-0">Job Information Form</h3>
                                                </div>

                                                <div class="card-body p-4">

                                                    <div class="row g-4">

                                                        <!-- Title -->
                                                        <div class="col-md-6">
                                                            <label class="form-label fw-semibold">Job Title</label>
                                                            <input type="text" name="title" class="form-control" placeholder="Enter job title" required>
                                                        </div>

                                                        <!-- Salary -->
                                                        <div class="col-md-6">
                                                            <label class="form-label fw-semibold">Salary</label>
                                                            <input type="text" name="salary" class="form-control" placeholder="e.g. 25000" required>
                                                        </div>

                                                        <!-- Description -->
                                                        <div class="col-12">
                                                            <label class="form-label fw-semibold">Description</label>
                                                            <textarea name="description" rows="4" class="form-control" placeholder="Write job description" required></textarea>
                                                        </div>

                                                        <!-- Requirements -->
                                                        <div class="col-12">
                                                            <label class="form-label fw-semibold">Requirements</label>
                                                            <textarea name="requirements" rows="4" class="form-control" placeholder="Write requirements" required></textarea>
                                                        </div>

                                                        <!-- Location -->
                                                        <div class="col-md-6">
                                                            <label class="form-label fw-semibold">Location</label>
                                                            <input type="text" name="location" class="form-control" placeholder="e.g. Dhaka" required>
                                                        </div>

                                                        <!-- Deadline -->
                                                        <div class="col-md-6">
                                                            <label class="form-label fw-semibold">Deadline</label>
                                                            <input type="date" name="deadline" class="form-control" required>
                                                        </div>

                                                        <!-- Job Type -->
                                                        <div class="col-md-4">
                                                            <label class="form-label fw-semibold">Job Type</label>

                                                            <select name="job_type" class="form-select" required>
                                                                <option value="">Select Job Type</option>
                                                                <option value="gov">Government</option>
                                                                <option value="non_gov">Non Government</option>
                                                            </select>
                                                        </div>
                                                    
                                                        <!-- Category -->
                                                         
                                                        <div class="col-md-4">
                                                            <label class="form-label fw-semibold" >Category ID</label>
                                                            <select name="category_id" id="category_id" class="form-select" required>
                                                                <option value="">----select job category----</option>
                                                                <?php foreach($jobcategories as $jobcategory){?>
                                                                    <option value="<?= $jobcategory['id'] ?? '' ?>"><?= $jobcategory['category_name'] ?? '' ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>

                                                        <!-- Company -->
                                                         
                                                        <div class="col-md-4">
                                                            <label class="form-label fw-semibold">Company</label>
                                                            <select name="company_id" id="company_id" class="form-select" required>
                                                                <option value="">----select job category----</option>
                                                                <?php foreach($jobcompanies as $jobcompany){?>
                                                                    <option value="<?= $jobcompany['id'] ?? '' ?>"><?= $jobcompany['company_name'] ?? '' ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                        <!-- Min Age -->
                                                        <div class="col-md-6">
                                                            <label class="form-label fw-semibold">Minimum Age</label>
                                                            <input type="number" name="min_age" class="form-control" required>
                                                        </div>

                                                        <!-- Max Age -->
                                                        <div class="col-md-6">
                                                            <label class="form-label fw-semibold">Maximum Age</label>
                                                            <input type="number" name="max_age" class="form-control" required>
                                                        </div>

                                                        <!-- Company Benefits -->
                                                        <div class="col-12">
                                                            <label class="form-label fw-semibold">Company Benefits</label>
                                                            <textarea name="comp_benifits" rows="3" class="form-control" required></textarea>
                                                        </div>

                                                        <!-- Employment Status -->
                                                        <div class="col-md-6">
                                                            <label class="form-label fw-semibold">Employment Status</label>

                                                            <select name="emp_status" class="form-select" required>
                                                                <option value="">Select Status</option>
                                                                <option value="Full time">Full Time</option>
                                                                <option value="Contractual">Contractual</option>
                                                            </select>
                                                        </div>

                                                        <!-- Work Type -->
                                                        <div class="col-md-6">
                                                            <label class="form-label fw-semibold">Work Type</label>

                                                            <select name="emp_work_place" class="form-select" required>
                                                                <option value="">Select Work Type</option>
                                                                <option value="Work on office">Work on Office</option>
                                                                <option value="Remote">Remote</option>
                                                            </select>
                                                        </div>

                                                    </div>

                                                    <!-- Education Requirement Section -->
                                                    <div class="mt-5">
                                                        <h4 class="mb-4 border-bottom pb-2">
                                                            Education & Experience Requirements
                                                        </h4>

                                                        <div class="row g-4">

                                                            <!-- Reusable Radio Groups -->

                                                            <!-- JSC -->
                                                            <div class="col-md-6">
                                                                <label class="fw-bold d-block mb-2">JSC Active</label>

                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="jsc_active" value="1" required>
                                                                    <label class="form-check-label">Yes</label>
                                                                </div>

                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="jsc_active" value="0">
                                                                    <label class="form-check-label">No</label>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <label class="fw-bold d-block mb-2">JSC Required</label>

                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="jsc_required" value="1" required>
                                                                    <label class="form-check-label">Required</label>
                                                                </div>

                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="jsc_required" value="0">
                                                                    <label class="form-check-label">Not Required</label>
                                                                </div>
                                                            </div>

                                                            <!-- SSC -->
                                                            <div class="col-md-6">
                                                                <label class="fw-bold d-block mb-2">SSC Active</label>

                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="ssc_active" value="1" required>
                                                                    <label class="form-check-label">Yes</label>
                                                                </div>

                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="ssc_active" value="0">
                                                                    <label class="form-check-label">No</label>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <label class="fw-bold d-block mb-2">SSC Required</label>

                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="ssc_required" value="1" required>
                                                                    <label class="form-check-label">Required</label>
                                                                </div>

                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="ssc_required" value="0">
                                                                    <label class="form-check-label">Not Required</label>
                                                                </div>
                                                            </div>

                                                            <!-- HSC -->
                                                            <div class="col-md-6">
                                                                <label class="fw-bold d-block mb-2">HSC Active</label>

                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="hsc_active" value="1" required>
                                                                    <label class="form-check-label">Yes</label>
                                                                </div>

                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="hsc_active" value="0">
                                                                    <label class="form-check-label">No</label>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <label class="fw-bold d-block mb-2">HSC Required</label>

                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="hsc_required" value="1" required>
                                                                    <label class="form-check-label">Required</label>
                                                                </div>

                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="hsc_required" value="0">
                                                                    <label class="form-check-label">Not Required</label>
                                                                </div>
                                                            </div>

                                                            <!-- Graduation -->
                                                            <div class="col-md-6">
                                                                <label class="fw-bold d-block mb-2">Graduation Active</label>

                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="gra_active" value="1" required>
                                                                    <label class="form-check-label">Yes</label>
                                                                </div>

                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="gra_active" value="0">
                                                                    <label class="form-check-label">No</label>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <label class="fw-bold d-block mb-2">Graduation Required</label>

                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="gra_required" value="1" required>
                                                                    <label class="form-check-label">Required</label>
                                                                </div>

                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="gra_required" value="0">
                                                                    <label class="form-check-label">Not Required</label>
                                                                </div>
                                                            </div>

                                                            <!-- Masters -->
                                                            <div class="col-md-6">
                                                                <label class="fw-bold d-block mb-2">Masters Active</label>

                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="mas_active" value="1" required>
                                                                    <label class="form-check-label">Yes</label>
                                                                </div>

                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="mas_active" value="0">
                                                                    <label class="form-check-label">No</label>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <label class="fw-bold d-block mb-2">Masters Required</label>

                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="mas_required" value="1" required>
                                                                    <label class="form-check-label">Required</label>
                                                                </div>

                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="mas_required" value="0" >
                                                                    <label class="form-check-label">Not Required</label>
                                                                </div>
                                                            </div>

                                                            <!-- MPHIL -->
                                                            <div class="col-md-6">
                                                                <label class="fw-bold d-block mb-2">MPhil Active</label>

                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="mph_active" value="1" required>
                                                                    <label class="form-check-label">Yes</label>
                                                                </div>

                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="mph_active" value="0">
                                                                    <label class="form-check-label">No</label>
                                                                </div>
                                                            </div>

                                                            <!-- Continue similarly for remaining fields -->
                                                            
                                                        </div>
                                                    </div>

                                                    <!-- Submit -->
                                                    <div class="text-center mt-5">
                                                        <button type="submit" class="btn btn-success px-5 py-2">
                                                            Save Job Information
                                                        </button>
                                                    </div>

                                                </div>
                                            </div>

                                        </form>
                                </div>
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