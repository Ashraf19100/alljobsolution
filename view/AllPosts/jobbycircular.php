<?php
require_once 'database/database.php';
$availablepostbycircular= new datamodel();
$circular_id = $_GET['circular'];
$availableposts = $availablepostbycircular->getData('jobs', ' * ', ' WHERE post_active = 1 and circular_id='.$circular_id);

?>

<!doctype html>
<html class="no-js" lang="en">

<?php require "layouts/head.php" ?>

<body>
	<div class="wrapper p-2">	
        <div class="row">
        <?php require "layouts/sidemenu.php" ?>
            <div class="col-md-10">
                <div class="content"> 
                    
                    <!-- Page Header -->
                    <section class="page-header">
                        <div class="container">
                            <h1 class="page-title">Available Position</h1>
                            <nav aria-label="breadcrumb">
                                <label for="">
                                    <p class="page-description">
                                        Chosse View Type
                                    </p>
                                </label>
                                <ol class="breadcrumb mb-2">
                                    <li class="breadcrumb-item">
                                        <a href="#" class="px-3 rounded btn-light text-dark" id="gridViewBtn" >Grid</a>
                                    </li>
                                    <li class="breadcrumb-item active">
                                        <a href="#" class="px-3 rounded btn-light text-dark" id="tableViewBtn">Table</a>
                                        
                                    </li>
                                </ol>
                            </nav>

                        </div>
                    </section>   
                    <section id="gridList">
                        <div class="search_area">
                            <?php require "layouts/searcharea.php" ?>
                        </div>
                        <nav class="mt-4">
                            <ul id="pagination" class="pagination justify-content-center"></ul>
                        </nav>
                        <div class="row p-3 ">
                            <?php foreach($availableposts as $availablepost){ ?> 
                            <div class="col-md-3 my-2 searchcard card-item">
                                <div class="card job-card h-100 border">
                                    <div class="card-body">
                                        <?php
                                                $condition = " WHERE id = ". $availablepost['company_id'] ;
                                                
                                                $companies = $availablepostbycircular->getSingleData('companies',' * ', $condition ); 
                                                
                                                ?>
                                        <div class="d-flex align-items-center mb-3">
                                            <img src="uploads/organisations/<?= $companies->logo ?>" class="company-logo me-3">

                                            <div>
                                                <h5 class="mb-0"><?= $availablepost['title'] ?></h5>
                                                <small class="text-muted"><?= $companies->company_name ?></small>
                                            </div>
                                        </div>

                                        <p>
                                        <?= substr($availablepost['description'],0,50)?>............
                                        </p>

                                        <div class="mb-3">
                                            <span class="badge bg-danger"><?= $availablepost['emp_status'] ?></span>
                                            <span class="badge bg-success"><?= $availablepost['emp_work_place'] ?></span>
                                        </div>

                                        <div class="d-flex justify-content-between">
                                            <span>
                                                <i class="fa-solid fa-location-dot"></i> <?= $availablepost['location'] ?>
                                            </span>

                                            <span class="fw-bold text-primary">
                                                ৳<?= $availablepost['salary'] ?>
                                            </span>
                                        </div>

                                    </div>

                                    <div class="card-footer bg-white border-0">
                                        <a href="index.php?page=jobdetails&job_id=<?= $availablepost['id']?>" class="btn btn-primary w-100">
                                            Apply Now
                                        </a>
                                    </div>
                                </div>
                            </div>
                            
                            <?php } ?>
                        </div>
                    </section>
                    <section id="tableList">
                        <div class="card shadow">
                            
                            <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                                <h4 class="mb-0"></h4>
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
                                <div class="row mb-3 d-flex align-items-center justify-content-center">
                                    <div class="col-md-10 d-flex">
                                        <input type="text" class="form-control" placeholder="Search title,salary,location, job type ,date" id="searchFilter"><button class="btn btn-info text-white" disabled><i class="fa-solid fa-magnifying-glass"></i></button>
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
                                foreach($availableposts as $availablepost){
                                ?>
                                <tr>
                                    <td><?=$availablepost['title']?></td>
                                    <td><?=$availablepost['salary']?></td>
                                    <td><?=$availablepost['location']?></td>
                                    <td><?= date(" d F Y", strtotime($availablepost['deadline'])); ?></td>
                                    <td><?=$availablepost['job_type']?></td>

                                    <td>
                                        <a href="index.php?page=jobdetails&job_id=<?= $availablepost['id']?>" class="btn btn-primary w-100">
                                            Apply Now
                                        </a>
                                    </td>
                                </tr>
                                <?php } ?>
                                </tbody>
                                </table>
                            </div>
                        </div>
                    </section>
                    <div class="row">

                    </div>
                    
                  <?php require "layouts/footer.php" ?>  
                </div>
            </div>
        </div>
        		
    
        

        
	
    </div>
	
	<!--==================================================================-->
	<?php require "layouts/scripts.php" ?>
	
</body>

</html>