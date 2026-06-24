

<?php
   require_once 'database/database.php';
   require_once 'validator/validation.php';

    
    
    $showuser = new datamodel();
    $actionvalidate = new validation();
    if(isset($_GET['action'])){
        if($_SESSION['role'] != 'admin'){
            $usrChck=$actionvalidate->actionPermitValidate($_GET['action'],$_SESSION['id']);
            if($usrChck['result'] == false){
                header("Location:../alljobsolution/index.php?page=userslist&message=You are not allowed to manage user data");
                exit;
            }
        }
    }
    $WHERE = " WHERE id =".$_GET['actvui'];
    $WHEREid = " WHERE user_id =".$_GET['actvui'];
    $userinfo = $showuser->getSingleData('users',' * ', $WHERE);
    $userdetail = $showuser->getSingleData('user_details',' * ', $WHEREid);
    if(isset($_GET['status'])){
        if($_GET['state']== 1){
            $state = 0;
        }else{
            $state = 1;
        }
        $status['status'] = $state;
        $statusui = " WHERE id =".$_GET['status'];
        $showuser->updateData('users', $status, $statusui );
    }
    

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

                    <div class="card shadow-sm border-0 rounded-4">

                        <div class="card-body p-4 my-4">
                            
                            <!-- Header -->
                            <div class="d-flex align-items-center mb-4">

                                <img src="uploads/img/<?= $userinfo->profile_image?>"
                                    class="rounded-circle border"
                                    width="100"
                                    height="100"
                                    alt="User Image">

                                <div class="ms-4">

                                    <h4 class="mb-1 fw-bold">
                                        <?= $userinfo->name?>
                                    </h4>

                                    <p class="text-muted mb-2">
                                        <?= $userinfo->email?>

                                    </p>

                                    <span class="badge <?= ($userinfo->status == 1) ? 'bg-success' : 'bg-danger '?>">
                                    <?= ($userinfo->status == 1) ? 'Active' : 'Inactive '?>

                                    </span>

                                    <span class="badge bg-primary">
                                        <?= $userinfo->role?>
                                    </span>

                                </div>

                            </div>

                            <!-- User Information -->
                            <div class="row g-4">

                                <div class="col-md-6">
                                    <div class="border rounded-3 p-3 h-100">

                                        <small class="text-muted d-block mb-1">
                                            Full Name
                                        </small>

                                        <div class="fw-semibold">
                                            <?= $userinfo->name?>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="border rounded-3 p-3 h-100">

                                        <small class="text-muted d-block mb-1">
                                            User Email?ID
                                        </small>

                                        <div class="fw-semibold">
                                            <?= $userinfo->email?>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="border rounded-3 p-3 h-100">

                                        <small class="text-muted d-block mb-1">
                                            Phone Number
                                        </small>

                                        <div class="fw-semibold">
                                            <?= $userinfo->phone?>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="border rounded-3 p-3 h-100">

                                        <small class="text-muted d-block mb-1">
                                            Location
                                        </small>

                                        <div class="fw-semibold">
                                            <?= $userdetail->address?>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="border rounded-3 p-3 h-100">

                                        <small class="text-muted d-block mb-1">
                                            Joined Date
                                        </small>

                                        <div class="fw-semibold">
                                            14 May 2026
                                        </div>

                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="border rounded-3 p-3 h-100">

                                        <small class="text-muted d-block mb-1">
                                            Last Login
                                        </small>

                                        <div class="fw-semibold">
                                            15 May 2026 - 10:30 AM
                                        </div>

                                    </div>
                                </div>

                            </div>

                            <!-- Action Buttons -->
                            <div class="mt-4 d-flex flex-wrap gap-2">

                                <a class="btn btn-danger text-dark">
                                    <i class="fa-solid fa-ban"></i>
                                    Ban User
                                </a>

                                <!-- Dropdown Form -->
                                <div class="dropdown">
                                    <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                        <i class="fa-solid fa-gear"></i>
                                        Assigne Role
                                    </button>

                                    <div class="dropdown-menu p-3" style="min-width: 300px;">
                                        <form action="index.php?page=roleaction" method="POST">
                                            <input type="hidden" name="id" value="<?=$userinfo->id?>">
                                            <input type="hidden" name="tab" value="users">
                                            <div class="mb-3">
                                                <label class="form-label fw-bold">Set Role</label>
                                                <select class="form-select" name="role">
                                                    <option value="">Select Action</option>
                                                    <option value="job_seeker" <?= ($userinfo->role == 'job_seeker') ? 'selected': '' ?> >job_seeker</option>
                                                    <option value="employer" <?= ($userinfo->role == 'employer') ? 'selected': '' ?> >employee</option>
                                                    <option value="admin" <?= ($userinfo->role == 'admin') ? 'selected': '' ?> >Admin</option>
                                                </select>
                                            </div>

                                            <button type="submit" class="btn btn-primary w-100">
                                                Submit
                                            </button>

                                        </form>
                                    </div>
                                </div>
                                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#actionModal">
                                    <i class="fa-solid fa-gear"></i>
                                    Assign Action 
                                </button>
                                    
                            </div>

                        </div>
                            
                    </div>
                    <div class="modal fade" id="actionModal" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <div class="modal-header">
                                    <h5 class="modal-title">User Action</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>

                                <form action="index.php?page=roleaction" method="POST">
                                            <input type="hidden" name="id" value="<?=$userinfo->id?>">
                                            <input type="hidden" name="tab" value="action_permission">
                                    <div class="modal-body row">
                                        <div class="col-md-6">
                                            <label class="fw-bold d-block mb-2">Delete Data</label>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="delete_data" value="1" required>
                                                <label class="form-check-label">Yes</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="delete_data" value="0">
                                                <label class="form-check-label">No</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="fw-bold d-block mb-2">Edit Data </label>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="edit_data" value="1" required>
                                                <label class="form-check-label">Yes</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="edit_data" value="0">
                                                <label class="form-check-label">No</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="fw-bold d-block mb-2">Add Data</label>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="add_data" value="1" required>
                                                <label class="form-check-label">Yes</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="add_data" value="0">
                                                <label class="form-check-label">No</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="fw-bold d-block mb-2">Active/Deactive Data</label>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="activate_deactivate_data" value="1" required>
                                                <label class="form-check-label">Yes</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="active_deactive_data" value="0">
                                                <label class="form-check-label">No</label>
                                            </div>
                                        </div>
                                        

                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                            Close
                                        </button>
                                        <button type="submit" class="btn btn-primary">
                                            Save Action
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
	
	<!--==================================================================-->
	<?php require "layouts/scripts.php" ?>
	
</body>

</html>




