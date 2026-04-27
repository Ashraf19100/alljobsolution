<?php  
    require_once 'database/database.php';
    $userinfo = new datamodel();
    $condition = " WHERE id ='".$_SESSION['id']."'";
    $image_profile = $userinfo->getSingleData('users', ' * ', $condition);
// if(isset($userprofile)){
//     foreach($userprofile as $row){
//         foreach($row as $key => $val){
//             $image_profile[$key] = $val;
//         }
//     }
// }
    
    
?>

<!doctype html>
<html class="no-js" lang="en">

<?php require "layouts/head.php" ?>

<body>
	<div class="wrapper p-2">	
        <div class="row">
        <?php require "layouts/sidemenu.php" ?>
            <div class="col-md-10">
                <div class="content  container">
                    <div class="search_area">
                        <?php require "layouts/searcharea.php" ?>

                    </div>
                    <div class="information-section">
                        
                        <div class="container mt-4">
                            <div class="card shadow-lg border-0 rounded-4 overflow-hidden">

                                <!-- Header -->
                                <div class="bg-gradient bg-primary text-white p-4">
                                    <div class="information_header d-flex align-items-center justify-content-between">
                                        <h4 class="mb-0 fw-semibold">Profile Information</h4>
                                        <button  class="btn btn-light text-primary fw-semibold px-4 rounded-pill shadow-sm" data-bs-toggle="modal" data-bs-target="#personalinfoModal">
                                            EDIT +
                                        </button>
                                    </div>
                                </div>

                                <!-- Body -->
                                <div class="card-body p-4">

                                    <?php if(isset($_GET['message'])){ 
                                        echo  '<div class="alert alert-danger text-center">'.$_GET['message'].'</div>';
                                    } ?>

                                    <div class="row align-items-center g-4">

                                        <!-- Profile Image -->
                                        <div class="col-md-3 text-center">
                                            <img src="uploads/img/<?= $_SESSION['profile_image'] ?>" 
                                                class="img-fluid rounded-circle shadow border border-3 border-primary p-1" 
                                                style="width:250px; height:250px; object-fit:cover;" 
                                                alt="img">
                                        </div>

                                        <!-- Info -->
                                        <div class="col-md-9">
                                            <div class="info">

                                                <p class="mb-2 fs-5">
                                                    <strong class="text-muted">Name:</strong> 
                                                    <span class="text-dark text-capitalize"><?= $_SESSION['name'] ?></span>
                                                </p>

                                                <p class="mb-2 fs-5">
                                                    <strong class="text-muted">Email:</strong> 
                                                    <span class="text-primary text-lowercase"><?= $_SESSION['email'] ?></span>
                                                </p>

                                                <p class="mb-2 fs-5">
                                                    <strong class="text-muted">User Type:</strong> 
                                                    <span class="badge bg-success px-3 py-2 text-capitalize"><?= $_SESSION['role'] ?></span>
                                                </p>

                                                <p class="mb-3 fs-5">
                                                    <strong class="text-muted">Contact:</strong> 
                                                    <span class="text-dark"><?= $_SESSION['phone'] ?></span>
                                                </p>

                                                <!-- Signature -->
                                                <div class="mt-3">
                                                    <label class="text-muted fw-semibold">Signature:</label><br>
                                                    <img src="uploads/signature/<?= $_SESSION['signature'] ?>" 
                                                        class="img-fluid mt-2 border rounded p-2 bg-light shadow-sm" 
                                                        style="max-height:80px;" 
                                                        alt="">
                                                </div>

                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="modal fade" id="personalinfoModal" tabindex="-1">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content rounded-4">
                                <div class="modal-header bg-primary text-white">
                                    <h5 class="modal-title">update profile</h5>
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="" id="add_degree" >
                                    <div class="card shadow p-4">
                                        <form action="index.php?page=imageupload-submit" method="POST" enctype="multipart/form-data" >

                                            <div class="row">
                                                <div class="col-md-4 mb-3">
                                                    <label class="form-label">Phone</label>
                                                    <input type="number" name="phone" class="form-control" <?php if($image_profile->phone !=''){
                                                        ?> value=<?= $image_profile->phone ?> <?php
                                                    } ?> placeholder="e.g. +8801">
                                                </div>
                                                <!-- Exam Name -->
                                                <div class="col-md-4 mb-3">
                                                    <label class="form-label">Image</label>
                                                    <input type="file" name="profile_image" class="form-control" placeholder="e.g. jpg,png,jpeg">
                                                </div>
                                                <!-- University / Board -->
                                                <div class="col-md-4 mb-3">
                                                    <label class="form-label">Signature</label>
                                                    <input type="file" name="signature" class="form-control" placeholder="e.g. jpg,png,jpeg">
                                                    
                                                </div>
                                                
                                            </div>

                                            

                                            <!-- Submit Button -->
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-success px-4">Save</button>
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
	
	<!--==================================================================-->
	<?php require "layouts/scripts.php" ?>
	
</body>

</html>

