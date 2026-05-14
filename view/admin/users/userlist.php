<?php
   require_once 'database/database.php';
    $limit='';
    
    $adminuser = new datamodel();
    if(isset($_GET['status'])){
        if($_GET['state']== 1){
            $state = 0;
        }else{
            $state = 1;
        }
        $status['status'] = $state;
        $statusui = " WHERE id =".$_GET['status'];
        $adminuser->updateData('users', $status, $statusui );
    }
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
    $allusers = $adminuser->getData('users',' * ', $WHERE);
    
    
    
    

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
                            <h2 class="page-title mb-1">User Management</h2>
                            <p class="text-muted mb-0">
                                Manage users, roles, passwords and account status
                            </p>
                        </div>

                        <button class="btn btn-primary">
                            <i class="fa-solid fa-user-plus"></i> Add User
                        </button>
                    </div>

                    <!-- Search & Filter -->
                    <div class="card mb-4">
                        <div class="card-body">

                            <h5 class="mb-3">
                                <i class="fa-solid fa-filter"></i>
                                Search / Filter Users
                            </h5>
                            <form method="POST" >
                                <div class="row g-3">

                                    <div class="col-md-4">
                                        <input name="email" type="text" class="form-control"
                                            placeholder="Search by name or email">
                                    </div>

                                    <div class="col-md-2">
                                        <select name="role" class="form-select">
                                            <option selected>Filter by Role</option>
                                            <option value="admin" >Admin</option>
                                            <option value="employer">employee</option>
                                            <option value="job_seeker"> Job seeker</option>
                                        </select>
                                    </div>

                                    

                                    <div class="col-md-2 d-grid">
                                        <button class="btn btn-success">
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                            Search
                                        </button>
                                    </div>
                                    <div class="col-md-2 d-grid">
                                        <a href="index.php?page=userslist" class="btn btn-primary">
                                            <i class="fa-solid fa-down-arrow"></i>
                                            Reset
                                        </a>
                                    </div>
                                    <div class="col-md-2">
                                        <select class="form-select " id="statusFilter">
                                            <option value="all">All Status</option>
                                            <option value="Active">Active</option>
                                            <option value="Pending">Pending</option>
                                            <option value="Inactive">Inactive</option>
                                        </select>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- View All Users -->
                    <div class="card shadow-sm border-0">
                            <div class="card-body">

                                <!-- Header -->
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <h3 class="mb-0">Employee List</h3>

                                    
                                </div>

                                <!-- Table -->
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover align-middle text-center" id="employeeTable">

                                        <thead class="table-dark">
                                            <tr>
                                                <th>#Sl</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                        <?php $sl=0; foreach($allusers as $user){ ?> 
                                            <tr>
                                                <td><?= ++$sl ?></td>
                                                <td><?= $user['name']?></td>
                                                <td><?= $user['email']?></td>
                                                <td>
                                                    <span class="badge <?= ($user['status'] == 1) ? 'bg-success' : 'bg-danger' ?>"><?= ($user['status'] == 1) ? 'Active' : 'Inactive' ?></span>
                                                </td>
                                                <td>
                                                    <a href="index.php?page=showuser&actvui=<?=$user['id']?>&<?=uniqid();?>" class="btn btn-sm btn-info mb-1">Show</a>
                                                    <a href="" class="btn btn-sm btn-warning mb-1">Edit</a>
                                                    <a href="index.php?page=userslist&status=<?=$user['id']?>&<?=uniqid();?>&state=<?=$user['status']?>" class="btn btn-sm <?= ($user['status'] == 1) ? 'btn-success' : 'btn-danger' ?> mb-1"><?= ($user['status'] == 1) ? 'Activate' : 'Deactivate' ?></a>
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




