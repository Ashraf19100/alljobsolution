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
                    <div class="search_area">
                        <?php require "layouts/searcharea.php" ?>
                    </div>
                    <!-- Page Header -->
                    <section class="page-header">
                        <div class="container">
                            <h1 class="page-title">Available Position</h1>
                            <p class="page-description">
                                View complete job information including company details,
                                requirements, responsibilities, benefits, and application process.
                            </p>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-2">
                                    <li class="breadcrumb-item">
                                        <a href="#" class="px-3 rounded btn-light text-dark" >List</a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="#" class="px-3 rounded btn-light text-dark">Grid</a>
                                    </li>
                                    <li class="breadcrumb-item active">
                                        <a href="#" class="px-3 rounded btn-light text-dark">Table</a>
                                        
                                    </li>
                                </ol>
                            </nav>

                        </div>
                    </section>   
                    <section id="gridList ">
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