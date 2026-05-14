

<?php
   require_once 'database/database.php';
    $limit='';
    
    $showuser = new datamodel();
    $WHERE = " WHERE id =".$_GET['actvui'];
    $WHEREid = " WHERE user_id =".$_GET['actvui'];
    $userinfo = $showuser->getSingleData('users',' * ', $WHERE);
    $userdetail = $showuser->getSingleData('user_details',' * ', $WHEREid);
    
    
    

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

                        <div class="card-body p-4">

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

                                <button class="btn btn-success">
                                    <i class="fa-solid fa-user-check"></i>
                                    Activate
                                </button>

                                <button class="btn btn-warning text-white">
                                    <i class="fa-solid fa-user-lock"></i>
                                    Deactivate
                                </button>

                                <button class="btn btn-danger">
                                    <i class="fa-solid fa-ban"></i>
                                    Ban User
                                </button>

                                <button class="btn btn-secondary">
                                    <i class="fa-solid fa-key"></i>
                                    Reset Password
                                </button>

                                <button class="btn btn-primary">
                                    <i class="fa-solid fa-user-gear"></i>
                                    Assign Role
                                </button>

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




