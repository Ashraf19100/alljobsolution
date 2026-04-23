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
                    <form action="">
                        <input class="w-75 p-2 shadow-sm border-0 text-start text-uppercase text-info" type="text" name="search" placeholder="search your desire position">
                        <button type="submit" class="btn btn-info shadow-sm border-0 text-start text-uppercase text-white ">Search</button>
                    </form>
                </div>
                <div class="information-section">
                    <div class="container mt-2  add-btn-action " id="add_degree" >
                        <div class="card shadow p-4">
                            <h4 class="mb-3">Update Profile  </h4>

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
                    <div class="container ">
                        <div class="card shadow p-4">
                            <div class="bg-primary text-white text-center p-4 rounded-top">
                                <div class="information_header d-flex align-item-center justify-content-between">
                                    <h4 class="mb-4">Profile Information</h4>
                                    <button id='edit_btn' class="rounded btn btn-info text-center fs-5">EDIT+</button>
                             
                                </div>
                            </div>
                            <div class="image-signature row">
                                <?php if(isset($_GET['message'])){ 
                  echo  '<h5 class="text-danger text-center p-2">'.$_GET['message'].'</h5>';

                 } ?>
                                <div class="col-md-3">
                                    <img src="uploads/img/<?= $_SESSION['profile_image'] ?>" class="w-100 img-fluid rounded-circle " alt="img"> 
                                </div>
                                <div class="col-md-9">
                                    <div class="info ">
                                        <h3 class="fs-4 fw-light text-capitalize"> name :<?= $_SESSION['name'] ?></h3>
                                        <h3 class="fs-4 fw-light text-Capitalize"> User email : <span class="text-lowercase"><?= $_SESSION['email'] ?></span> </h3>
                                        <h3 class="fs-4 fw-light text-capitalize"> user type :<?= $_SESSION['role'] ?></h3>
                                        <h3 class="fs-4 fw-light text-capitalize"> user contact :<?= $_SESSION['phone'] ?></h3>
                                    </div>
                                    <img class="img-fluid" src="uploads/signature/<?= $_SESSION['signature'] ?>" alt="">
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

