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
            <div class="content container">
            <?php if($_SESSION['role'] == 'job_seeker'){ ?>    
                <div class="search_area">
                    <?php require "layouts/searcharea.php" ?>
                </div>

               <?php
                require_once 'view/allpost.php';
               }
               ?> 
            <div class="container py-4">

                <!-- Page Heading -->
                <div class="mb-4">
                    <h2 class="fw-bold">Admin Dashboard</h2>
                    <p class="text-muted mb-0">Welcome back, Admin</p>
                </div>

                <!-- Top Cards -->
                <div class="row g-4">

                    <div class="col-md-3">
                        <div class="card dashboard-card shadow-sm border border-success">
                            <div class="card-body">
                                <h6 class="text-muted">Users</h6>
                                <h3 class="fw-bold"><?=$totalusers[0]['total']?></h3>
                                <a href="index.php?page=userslist" class="mb-0 text-success">See Users <i class="fa fa-arrow-right me-2  "></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card dashboard-card shadow-sm border border-info">
                            <div class="card-body">
                                <h6 class="text-muted">Jobs</h6>
                                <h3 class="fw-bold"><?=$totaljobs[0]['total']?></h3>
                                <a href="" class="mb-0 text-info">See Uploaded Jobs <i class="fa fa-arrow-right me-2  "></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card dashboard-card shadow-sm border border-warning">
                            <div class="card-body">
                                <h6 class="text-muted">Companies</h6>
                                <h3 class="fw-bold"><?=$totalcompanies[0]['total']?></h3>
                                <a href="" class="mb-0 text-warning">See Companies <i class="fa fa-arrow-right me-2  "></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card dashboard-card shadow-sm border border-dark">
                            <div class="card-body">
                                <h6 class="text-muted">Applications</h6>
                                <h3 class="fw-bold"><?=$totalapplications[0]['total']?></h3>
                                <a href="" class="mb-0 text-dark">See Applications <i class="fa fa-arrow-right me-2  "></i></a>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Quick Actions -->
                <div class="mt-5">
                    <h4 class="mb-3">Quick Actions</h4>

                    <div class="row g-3">

                        <div class="col-md-3">
                            <button class="btn btn-primary w-100 quick-btn">
                                Create New
                            </button>
                        </div>

                        <div class="col-md-3">
                            <button class="btn btn-success w-100 quick-btn">
                                View Reports
                            </button>
                        </div>

                        <div class="col-md-3">
                            <button class="btn btn-warning w-100 quick-btn">
                                Manage Settings
                            </button>
                        </div>

                        <div class="col-md-3">
                            <button class="btn btn-dark w-100 quick-btn">
                                Notifications
                            </button>
                        </div>

                    </div>
                </div>

                <!-- Recent Activity -->
                <div class="card mt-5 shadow-sm border-0">
                    <div class="card-body">
                        <h4 class="mb-4">Recent Activity</h4>

                        <table class="table align-middle">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Activity</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Dashboard Updated</td>
                                    <td>10 May 2026</td>
                                    <td><span class="badge bg-success">Done</span></td>
                                </tr>

                                <tr>
                                    <td>2</td>
                                    <td>New Record Added</td>
                                    <td>09 May 2026</td>
                                    <td><span class="badge bg-primary">New</span></td>
                                </tr>

                                <tr>
                                    <td>3</td>
                                    <td>Settings Modified</td>
                                    <td>08 May 2026</td>
                                    <td><span class="badge bg-warning text-dark">Pending</span></td>
                                </tr>
                            </tbody>

                        </table>
                    </div>
                </div>

            </div>


                
                
            </div>
        </div>
        </div>
        		<?php require "layouts/footer.php" ?>
    
        

        
	
    </div>
	
	<!--==================================================================-->
	<?php require "layouts/scripts.php" ?>
	
</body>

</html>