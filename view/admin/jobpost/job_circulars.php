<?php
   require_once 'database/database.php';
    
    $job_circulars = new datamodel();
    $today = new DateTime();
    $allcirculars = $job_circulars->getData('job_circulars',' * ');
    $circular_companies = $job_circulars->getData('companies',' * ', '');
    $jobCirculars = $job_circulars->getData('job_circulars',' * ', " WHERE status = 'active'");
    foreach($allcirculars as $circul){
        $deadline = new DateTime($circul['apply_last_date']);
       
        if( $deadline > $today && $circul['status'] != 'expired' ){
             print_r( $deadline);
        echo '<br>';
            $cir_col['status'] = 'expired';
            $job_circulars->updateData('job_circulars', $cir_col , " WHERE id =".$circul['id']);
            
        }
    }/////start from here

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
                    <?php if( isset($_GET['message'])){ echo "<p class='alert alert-warning text-danger' >". $_GET['message'] ." </p>";} ?>
                </div>
                <section> 
                    <div class="container mt-4">
                        <div class="card shadow">
                            
                            <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                                <h4 class="mb-0">Job Circulars</h4>
                                <a href="add_job.php" class="btn btn-light btn-sm" data-bs-toggle="modal" data-bs-target="#job_circularsModal">
                                    + Add New Circular
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
                                        <input type="text" class="form-control" placeholder="Search Circulars ,date" id="searchFilter">
                                    </div>

                                    <div class="col-md-2">
                                        <select class="form-select">
                                            <option value="">Circular Status</option>
                                            <option>active</option>
                                            <option>inactive</option>
                                            <option>draft</option>
                                            <option>expired</option>
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
                                        <th>Company</th>
                                        <th>Circular no (reference)</th>
                                        <th>status</th>
                                        
                                        <th>publish date</th>
                                        <th >expected Activation Date</th>
                                        <th>Deadline/last Date</th>
                                        <th >Actions</th>
                                        </tr>
                                    </thead>
                                <tbody>

                                
                                <?php
                                if(isset($allcirculars)){ foreach($allcirculars as $allcirculars){
                                ?>
                                <tr>
                                    <td><?php $circular_companie = $job_circulars->getSingleData('companies',' * ', ' WHERE id= '.$allcirculars['company_id']);
                                    echo $circular_companie->company_name; ?></td>
                                    <td><?=$allcirculars['circular_reference']?></td>
                                    <td class="<?= $allcirculars['status'] == 'expired' ? 'text-danger' : '' ?>" ><?=$allcirculars['status']?></td>
                                    
                                    <td><?= date(" d F Y", strtotime($allcirculars['published_date'])); ?></td>
                                    <td><?= $allcirculars['expected_activation_date'] ? date(" d F Y h:i:s A", strtotime($allcirculars['expected_activation_date'])): 'null' ?></td>
                                    <td>
                                        <?= $allcirculars['apply_last_date'] ? date(" d F Y h:i:s A", strtotime($allcirculars['apply_last_date'])): 'null' ?>
                                    </td>

                                    <td>
                                        <?php if(isset($allcirculars['circular_doc'])){ echo '<a href="uploads/circulars/'.$allcirculars['circular_doc'].'" target="_blank" class="mb-1 btn btn-primary btn-sm">
                                            View PDF
                                        </a>';}else{ echo "not uploaded";} ?>
                                        
                                        <a href="index.php?page=job_circular_submit&activate=<?= $allcirculars['id']?>&<?=uniqid()?>&<?=uniqid()?>" onclick="return confirm('Are you sure you want to Change the status')" class="btn btn-sm btn-success mb-1">Activate</a>
                                        <a href="index.php?page=job_circular_submit&delete=<?= $allcirculars['id']?>&<?=uniqid()?>&<?=uniqid()?>" onclick="return confirm('Are you sure you want to delete this data?')" class="btn btn-sm btn-danger mb-1">Delete</a>
                                    </td>
                                </tr>
                                <?php } } ?>
                                </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="modal fade" id="job_circularsModal" tabindex="-1">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                <div class="modal-content rounded-4">
                                    <div class="text-center mt-5">
                                        <h3 class="alert bg-primary text-center fw-bold text-dark ">
                                            ADD NEW CIRCULAR
                                        </h3>
                                    </div>
                                        <form action="index.php?page=job_circular_submit" method="POST" class="container my-5" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-md-6 mb-3 ">
                                                    <label class="form-label fw-bold">Company</label>
                                                    <select name="company_id" class="form-select" required>
                                                        <option value="">Select Company</option>
                                                        <?php foreach($circular_companies as $companie){ ?>
                                                        <option value="<?= $companie['id'] ?> "><?= $companie['company_name'] ?></option>
                                                        <?php } ?>    
                                                    </select>
                                                </div>
                                                <div class="col-md-6 mb-3 ">
                                                    <label class="form-label fw-bold">Circular reference</label>
                                                    <input type="text" name="circular_reference" class="form-control" required>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label fw-bold">Circular Documents</label>
                                                    <input type="file" name="circular_doc" class="form-control" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label fw-bold">published Date</label>
                                                    <input type="datetime-local" name="published_date" class="form-control" placeholder="e.g. 25000" required>
                                                    
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label fw-bold">Expected Activation Date</label>
                                                    <input type="datetime-local" name="expected_activation_date" class="form-control" placeholder="e.g. 25000" required>    
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label fw-bold">Application Last Date</label>
                                                    <input type="datetime-local" name="apply_last_date" class="form-control" placeholder="e.g. 25000" required>    
                                                </div>
                                            </div>
                                            <div class="text-center mt-5">
                                                <button type="submit" class="btn btn-success px-5 py-2">
                                                    Save Information
                                                </button>
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