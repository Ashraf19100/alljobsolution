<?php
   require_once 'database/database.php';
    $limit='';
    
    $admincompany = new datamodel();
    
    $allcompanies = $admincompany->getData('companies',' * ', '');
    
    
    

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

                        <div class="card shadow-sm border-0">
                            <div class="card-body">

                                <!-- Header -->
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <h3 class="mb-0">Employee List</h3>

                                    <!-- Filter -->
                                    <select class="form-select w-auto" id="typeFilter">
                                        <option value="all">All</option>
                                        <option value="Government">Government</option>
                                        <option value="Nongovernment">Nongovernment</option>
                                    </select>
                                </div>

                                <!-- Table -->
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover align-middle text-center" id="companyTable">

                                        <thead class="table-dark">
                                            <tr>
                                                <th>Sl</th>
                                                <th>Company Name</th>
                                                <th>Website</th>
                                                <th>Location</th>
                                                <th>Organization type</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                        <?php foreach($allcompanies as $companies){ ?> 
                                            <tr>
                                                <td><?= $companies['id']?></td>
                                                <td><?= $companies['company_name']?></td>
                                                <td><?= $companies['website']?></td>
                                                <td><?= $companies['location']?></td>
                                                <td>
                                                    <span class="badge <?= ($companies['company_type'] == 'gov') ? 'bg-success' : 'bg-warning' ?>"><?= ($companies['company_type'] == 'gov') ? 'Government' : 'Nongovernment' ?></span>
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
                
                
            </div>
        </div>
        </div>
    
        

        
	
    </div>
	
	<!--==================================================================-->
	<?php require "layouts/scripts.php" ?>
	
</body>

</html>




