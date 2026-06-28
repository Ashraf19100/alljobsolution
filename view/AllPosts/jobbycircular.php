<?php
require_once 'database/database.php';
$admin_dashboard= new datamodel();
$totalusers = $admin_dashboard->getData('users',' COUNT(*) as total ');
$totaljobs = $admin_dashboard->getData('jobs',' COUNT(*) as total ');
$totalapplications = $admin_dashboard->getData('applications',' COUNT(*) as total ');
$totalcompanies = $admin_dashboard->getData('companies',' COUNT(*) as total ');

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
                            <h1 class="page-title">Software Engineer</h1>
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