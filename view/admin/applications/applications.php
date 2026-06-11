<?php
   require_once 'database/database.php';
    $limit='';
    
    $applications = new datamodel();
    // if(isset($_GET['status'])){
    //     if($_GET['state']== 1){
    //         $state = 0;
    //     }else{
    //         $state = 1;
    //     }
    //     $status['status'] = $state;
    //     $statusui = " WHERE id =".$_GET['status'];
    //     $adminuser->updateData('users', $status, $statusui );
    // }
    $WHERE = " ";
    if(!empty($_POST)){
        $c=count($_POST);
        $cchk=1;
        $WHERE .= " WHERE ";
        foreach($_POST as $key => $val){
            $WHERE .= $key. " = '". $val."'" ;
            if($cchk < $c){
                $WHERE .= " and ";
            }
            $cchk++;
        }
        
    }
    $allapplications = $applications->getData('applications',' * ', $WHERE);
    
    
    
    

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
               <div class="container py-4">

                    <!-- Header -->
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div>
                            <h2 class="page-title mb-1">Application List</h2>
                            <p class="text-muted mb-0">
                                Manage Applications, Applications Status, 
                            </p>
                        </div>
                        
                    </div>

                    <!-- View All Users -->
                    <div class="card shadow-sm border-0">
                            <div class="card-body">

                                <!-- Header -->
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <h3 class="mb-0">Applicant list</h3>
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
                                <!-- Table -->
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover align-middle text-center" id="DataTable">

                                        <thead class="table-dark">
                                            <tr>
                                                <th>#Sl</th>
                                                <th>Applicant Name</th>
                                                <th>Previous salary</th>
                                                <th>Expected Salary</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                        <?php $sl=0; foreach($allapplications as $applicationdata){ ?> 
                                            <tr>
                                                <td><?= ++$sl ?></td>
                                                <td><?php $applicantName= $applications->getSingleData('users',' * ', ' WHERE id ='.$applicationdata['user_id']);
                                                print($applicantName->name); ?></td>
                                                <td><?= $applicationdata['previous_salary']?></td>
                                                <td><?= $applicationdata['expected_salary']?></td>
                                                <td>
                                                    <span class="badge <?= ($applicationdata['status'] == 'pending') ? 'bg-warning' : 'bg-sucess' ?>"><?= $applicationdata['status'] ?></span>
                                                </td>
                                                <td>
                                                    <a href="index.php?page=showuser&actvui=<?=$applicationdata['id']?>&<?=uniqid();?>" class="btn btn-sm btn-info mb-1">Show</a>
                                                    <a href="index.php?page=userslist&status=<?=$applicationdata['id']?>&<?=uniqid();?>&state=<?=$applicationdata['status']?>" class="btn btn-sm <?= ($applicationdata['status'] == 1) ? 'btn-success' : 'btn-danger' ?> mb-1"><?= ($applicationdata['status'] == 1) ? 'Activate' : 'Deactivate' ?></a>
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
                
                
            </div>
        </div>
        </div>
    
        

        
	
    </div>
	
	<!--==================================================================-->
	<?php require "layouts/scripts.php" ?>
	
</body>

</html>




