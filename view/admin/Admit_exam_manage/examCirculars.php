<?php
   require_once 'database/database.php';
    
    $job_circulars = new datamodel();
    $today = new DateTime();
    
    $circular_companies = $job_circulars->getData('companies',' * ', '');
    $jobCirculars = $job_circulars->getData('job_circulars',' * ', " WHERE status = 'active'");
   
    

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
                                if(isset($jobCirculars )){ foreach($jobCirculars  as $jobCirculars ){
                                ?>
                                <tr>
                                    <td><?php $circular_companie = $job_circulars->getSingleData('companies',' * ', ' WHERE id= '.$jobCirculars ['company_id']);
                                    echo $circular_companie->company_name; ?></td>
                                    <td><?=$jobCirculars ['circular_reference']?></td>
                                    <td class="<?= $jobCirculars ['status'] == 'expired' ? 'text-danger' : '' ?>" ><?=$jobCirculars ['status']?></td>
                                    
                                    <td><?= date(" d F Y", strtotime($jobCirculars ['published_date'])); ?></td>
                                    <td><?= $jobCirculars ['expected_activation_date'] ? date(" d F Y h:i:s A", strtotime($jobCirculars ['expected_activation_date'])): 'null' ?></td>
                                    <td>
                                        <?= $jobCirculars ['apply_last_date'] ? date(" d F Y h:i:s A", strtotime($jobCirculars ['apply_last_date'])): 'null' ?>
                                    </td>

                                    <td>
                                        <?php if(isset($jobCirculars ['circular_doc'])){ echo '<a href="uploads/circulars/'.$jobCirculars ['circular_doc'].'" target="_blank" class="mb-1 btn btn-primary btn-sm">
                                            View PDF
                                        </a>';}else{ echo "not uploaded";} ?>
                                        
                                        <a href="index.php?page=examCreate&circular=<?= $jobCirculars ['id']?>&<?=uniqid()?>&<?=uniqid()?>&ref=<?=$jobCirculars['circular_reference']?>" class="btn btn-sm btn-success mb-1">Create Exam</a>
                                        
                                    </td>
                                </tr>
                                <?php } } ?>
                                </tbody>
                                </table>
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


