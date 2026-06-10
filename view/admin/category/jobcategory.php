<?php
   require_once 'database/database.php';
    
    
    $jobcategory = new datamodel();

    $allcategory = $jobcategory->getData('category',' * ');
    
    
    

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
                    <h2>📋 List of companiess</h2>
                    
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
                    <div class="container py-5">
                                    <?php if(isset($_GET['message'])){ 
                                        echo  '<h3 class="text-danger text-center p-2">'.$_GET['message'].'</h3>';

                                        } ?>
                        <div class="card shadow-sm border-0">
                            <div class="card-body">
                                
                                <!-- Header -->
                                <div class="d-flex justify-content-between align-items-center mb-1 card-header bg-dark text-white">
                                    
                                        <h4 class="mb-0">Category List</h4>
                                        <a href="add_job.php" class="btn btn-light btn-sm" data-bs-toggle="modal" data-bs-target="#organisationModal">
                                            + Add New Category
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
                                        </select>
                                    </div>
                                </div>
                                <!-- pagination -->
                                 <div class="pagination_div my-2 d-flex justify-content-center align-item-center">
                                    <div class="d-flex pagination">
                                        <button id="prevbtncat" class="btn btn-warning">previous</button>
                                        <div id="catpaginationID"></div>
                                        <button id="nxtbtncat" class="btn btn-warning" >next</button>
                                    </div>
                                </div>
                                <!-- Table -->
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover align-middle text-center" id="categorytable">

                                        <thead class="table-dark">
                                            <tr>
                                                <th>Sl</th>
                                                <th>Company Name</th>

                                                <th>Action</th>
                                                
                                            </tr>
                                        </thead>

                                        <tbody>
                                        <?php foreach($allcategory as $category){ ?> 
                                            <tr>
                                                <td><?= $category['id']?></td>
                                                <td><?= $category['category_name']?></td>
                                                <td>
                                                    <a href="index.php?page=showcompany&cmp_i=<?= $category['id']?>" class="btn btn-sm btn-info mb-1">Show</a>
                                                    <a href="" class="btn btn-sm btn-success mb-1">Active</a>
                                                    <a href="" class="btn btn-sm btn-danger mb-1">Delete</a>
                                                </td>
                                                
                                            </tr>
                                        <?php } ?>
                                            

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
                                            <h3 class="mb-0">Add New Category</h3>
                                        </div>

                                        <div class="card-body p-4">

                                            <form action="index.php?page=addcategory" method="POST" enctype="multipart/form-data">

                                                <!-- Company Name -->
                                                <div class="mb-3">
                                                    <label class="form-label fw-semibold">
                                                        Category Name
                                                    </label>

                                                    <input 
                                                        type="text" 
                                                        name="category_name" 
                                                        class="form-control"
                                                        placeholder="Enter company name"
                                                        required
                                                    >
                                                </div>
                                                    <!-- Submit Button -->
                                                <div class="text-end">
                                                    <button type="submit" class="btn btn-primary px-4">
                                                        Save Category
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




