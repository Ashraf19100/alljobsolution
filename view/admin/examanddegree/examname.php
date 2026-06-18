<?php
   require_once 'database/database.php';
    
    
    $exam_degree = new datamodel();

    $all_degrees = $exam_degree->getData('bachelor_degrees',' * ');
    
    
    

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
                
                <section> 
                    <div class="container py-5">
                                    <?php if(isset($_GET['message'])){ 
                                        echo  '<h3 class="text-danger text-center p-2">'.$_GET['message'].'</h3>';

                                        } ?>
                        <div class="card shadow-sm border-0">
                            <div class="card-body">
                                <div class="col-md-12 mb-2">
                                        <input type="text" class="text-center form-control border-3" placeholder="Search Degree" id="searchFilter">
                                </div>
                                <!-- Header -->
                                <div class="d-flex justify-content-between align-items-center mb-1 card-header bg-dark text-white">
                                    
                                        <h4 class="mb-0">Exam Name List</h4>
                                        <a href="add_job.php" class="btn btn-light btn-sm" data-bs-toggle="modal" data-bs-target="#organisationModal">
                                            + Add New 
                                        </a>

                                    <!-- Filter -->

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
                                        <option value="100">100</option>
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
                                <!-- Table -->
                                <div class="table-responsive">
                                    <table class="table searchtableData table-bordered table-hover align-middle text-center" id="DataTable">

                                        <thead class="table-dark">
                                            <tr>
                                                <th>Sl</th>
                                                <th>Degree Name</th>
                                                <th>Duration</th>
                                                <th>Degree Level</th>

                                                <th>Action</th>
                                                
                                            </tr>
                                        </thead>

                                        <tbody>
                                        <?php $sl=1; foreach($all_degrees as $degree){ ?> 
                                            <tr>
                                                <td><?= $sl?></td>
                                                <td><?= $degree['degree_name']?></td>
                                                <td><?= $degree['duration_year']?> years </td>
                                                <td><?= $degree['degree_level']?></td>
                                                <td>
                                                    <a href="" class="btn btn-sm btn-info mb-1">Show</a>
                                                    <a href="index.php?page=addexam&delete=<?= $degree['id']?>&<?=uniqid()?>&<?=uniqid()?>" onclick="return confirm('Are you sure you want to delete this data?')"  class="btn btn-sm btn-danger mb-1">Delete</a>
                                                </td>
                                                
                                            </tr>
                                        <?php $sl++; } ?>
                                            

                                        </tbody>

                                    </table>
                                </div>

                            </div>
                        </div>

                    </div>
                </section>
                    <div class="modal fade" id="organisationModal" tabindex="-1">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content rounded-4">
                                <div class="row justify-content-center">
                                    <div class="card shadow border-0 rounded-4">

                                        <div class="card-header bg-primary text-white py-3">
                                            <h3 class="mb-0">Add New</h3>
                                        </div>

                                        <div class="card-body p-4">

                                            <form action="index.php?page=addexam" method="POST" enctype="multipart/form-data">

                                                <div class="row">
                                                    <!-- degree name -->
                                                    <div class="mb-3 col-md-6">
                                                        <label class="form-label fw-semibold">
                                                           Degree Name
                                                        </label>

                                                        <input 
                                                            type="text" 
                                                            name="degree_name" 
                                                            class="form-control"
                                                            placeholder="Enter company name"
                                                            required
                                                        >
                                                    </div>
                                                    <!-- Duration -->
                                                    <div class="mb-3 col-md-3">
                                                        <label class="form-label fw-semibold">
                                                            Duration/years
                                                        </label>
                                                        
                                                        <select name="duration_year" class="form-control" required >
                                                            <option value="">--select Duration--</option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>

                                                        </select>
                                                    </div>
                                                    <!-- degree level -->
                                                    <div class="mb-3 col-md-3">
                                                        <label class="form-label fw-semibold">
                                                            Degree Level
                                                        </label>

                                                        <select name="degree_level" class="form-control" required >
                                                            <option value="">--select exam Level--</option>
                                                            <option value="1">SSC or Equivilant</option>
                                                            <option value="2">HSC or Equivilant</option>
                                                            <option value="3">Bechalor</option>
                                                            <option value="4">Masters</option>
                                                            <option value="5">Phd or Mphil</option>
                                                            
                                                        </select>
                                                    </div>
                                                </div>
                                                    <!-- Submit Button -->
                                                <div class="text-end">
                                                    <button type="submit" class="btn btn-primary px-4">
                                                        Save
                                                    </button>
                                                </div>

                                            </form>

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




