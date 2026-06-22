<?php
   require_once 'database/database.php';
    
    $jobpost = new datamodel();
  
    $allposts = $jobpost->getData('jobs',' * ');
    $jobcategories = $jobpost->getData('category',' * ', '');
    $jobcompanies = $jobpost->getData('companies',' * ', '');
    $jobCirculars = $jobpost->getData('job_circulars',' * ', " WHERE status = 'active'");
    
    

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
                                <div class="rowfilter d-flex">
                                    <label for="" class="px-2 text-center">Number of Rows</label>
                                    <select class="form-select w-auto" id="totalrow">
                                    <option value="10">10</option>
                                    <option value="15">15</option>
                                    <option value="20">20</option>
                                    <option value="25">25</option>
                                    <option value="30">30</option>
                                    <option value="35">35</option>
                                    <option value="40">40</option>
                                    <option value="50">50</option>
                                    </select>
                                </div>
                            </div>
                            <div class="pagination_div my-2 d-flex justify-content-center align-item-center">
                                    <div class="d-flex pagination">
                                        <button id="prevbtn" class="btn btn-warning">previous</button>
                                        <div id="DatapaginationID"></div>
                                        <button id="nxtbtn" class="btn btn-warning" >next</button>
                                    </div>
                            </div>
                            <div class="card-body">
                                <!-- filter row -->
                                 <div class="row mb-3 align-items-center">
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" placeholder="Search title,salary,location, job type ,date" id="searchFilter">
                                    </div>

                                    <div class="col-md-2">
                                        <select class="form-select">
                                            <option value="">Job Type</option>
                                            <option>Full Time</option>
                                            <option>Part Time</option>
                                            <option>Contract</option>
                                        </select>
                                    </div>

                                    <div class="col-md-1 text-end">
                                        <button class="btn btn-secondary">Reset</button>
                                    </div>
                                </div>
                                <!-- Header Row -->
                                <table class="table searchtableData table-bordered table-hover align-middle text-center" id="DataTable">
                                    <thead >
                                        <tr>
                                        <th>Title</th>
                                        <th>Salary</th>
                                        <th>Location</th>
                                        <th>Deadline</th>
                                        <th >Type</th>
                                        <th >Actions</th>
                                        </tr>
                                    </thead>
                                <tbody>

                                
                                <?php
                                foreach($allposts as $allpost){
                                ?>
                                <tr>
                                    <td><?=$allpost['title']?></td>
                                    <td><?=$allpost['salary']?></td>
                                    <td><?=$allpost['location']?></td>
                                    <td><?= date(" d F Y", strtotime($allpost['deadline'])); ?></td>
                                    <td><?=$allpost['job_type']?></td>

                                    <td>
                                        <a href="index.php?page=jobdetails&job_id=<?= $allpost['id']?>" class="btn btn-sm btn-info mb-1">Show</a>
                                        <a href="index.php?page=jobpostmanage&manage=<?= $allpost['id']?>" class="btn btn-sm btn-warning mb-1">Manage</a>
                                        <a href="" class="btn btn-sm btn-success mb-1">Active</a>
                                        <a href="" class="btn btn-sm btn-danger mb-1">Delete</a>
                                    </td>
                                </tr>
                                <?php } ?>
                                </tbody>
                                </table>
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
                                                            <select name="company_id" id="company_name" class="form-select" required>
                                                                <option value="">----select job category----</option>
                                                                <?php foreach($jobcompanies as $jobcompany){?>
                                                                    <option value="<?= $jobcompany['id'] ?? '' ?>"><?= $jobcompany['company_name'] ?? '' ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                        <!--circular no-->
                                                        <div class="col-md-4">
                                                            <label class="form-label fw-semibold">Circular Reference</label>
                                                            <select name="circular_id" id="circulars_list" class="form-select" required>
                                                                <option value="">----select Circulars----</option>
                                                                
                                                            </select>
                                                        </div>
                                                        <!-- Min Age -->
                                                        <div class="col-md-4">
                                                            <label class="form-label fw-semibold">Minimum Age</label>
                                                            <input type="number" name="min_age" class="form-control" required>
                                                        </div>

                                                        <!-- Max Age -->
                                                        <div class="col-md-4">
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
                                                            <div class="col-md-4">
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

                                                            <div class="col-md-4">
                                                                <label class="fw-bold d-block mb-2">MPhil Required</label>

                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="mph_required" value="1" required>
                                                                    <label class="form-check-label">Required</label>
                                                                </div>

                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="mph_required" value="0" >
                                                                    <label class="form-check-label">Not Required</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label class="fw-bold d-block mb-2">MPhil Running</label>

                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="mph_running" value="1" required>
                                                                    <label class="form-check-label">Yes</label>
                                                                </div>

                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="mph_running" value="0">
                                                                    <label class="form-check-label">No</label>
                                                                </div>
                                                            </div>
                                                            <!--------Phd ------------>
                                                            <div class="col-md-4">
                                                                <label class="fw-bold d-block mb-2">Phd Active</label>

                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="phd_active" value="1" required>
                                                                    <label class="form-check-label">Yes</label>
                                                                </div>

                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="phd_active" value="0">
                                                                    <label class="form-check-label">No</label>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <label class="fw-bold d-block mb-2">Phd Required</label>

                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="phd_required" value="1" required>
                                                                    <label class="form-check-label">Required</label>
                                                                </div>

                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="phd_required" value="0" >
                                                                    <label class="form-check-label">Not Required</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label class="fw-bold d-block mb-2">Phd Running</label>

                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="phd_running" value="1" required>
                                                                    <label class="form-check-label">Yes</label>
                                                                </div>

                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="phd_running" value="0">
                                                                    <label class="form-check-label">No</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label class="fw-bold d-block mb-2">Job Experience Active</label>

                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="job_exp_active" value="1" required>
                                                                    <label class="form-check-label">Yes</label>
                                                                </div>

                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="job_exp_active" value="0">
                                                                    <label class="form-check-label">No</label>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <label class="fw-bold d-block mb-2">Job Experience Required</label>

                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="job_exp_required" value="1" required>
                                                                    <label class="form-check-label">Required</label>
                                                                </div>

                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="job_exp_required" value="0">
                                                                    <label class="form-check-label">Not Required</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label class="form-label fw-bold d-block mb-2">Minimum Job Experience year</label>
                                                                <div class="">
                                                                    <input class="form-control" type="number" name="min_job_exp_year" value="0">
                                                                </div>
                                                            </div>
                                                            <!----------application start time --------->
                                                            <div class="col-md-6">
                                                                <label class="form-label fw-bold">Application Start Time</label>
                                                                <input type="datetime-local" name="app_start_time" class="form-control" placeholder="e.g. 25000" required>
                                                                
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label class="form-label fw-bold">Application End Time</label>
                                                                <input type="datetime-local" name="app_end_time" class="form-control" placeholder="e.g. 25000" required>
                                                                
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label class="form-label fw-bold">total vacancy</label>
                                                                <input type="number" name="vacancy" class="form-control" placeholder="e.g. 25000" required>
                                                                
                                                            </div>
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