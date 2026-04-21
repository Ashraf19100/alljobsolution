<?php  
require_once 'database/database.php';

$personalinfo = new datamodel();   
$condition = " WHERE user_id ='".$_SESSION['id']."'";
$user_info = $personalinfo->getData('user_details',' * ', $condition );   
if(isset($user_info)){
    foreach($user_info as $user_info){
        foreach($user_info as $key => $val){
        $row[$key] = $val;
    }
    }
}


    
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
                <div class="search_area">
                    <form action="">
                        <input class="w-75 p-2 shadow-sm border-0 text-start text-uppercase text-info" type="text" name="search" placeholder="search your desire position">
                        <button type="submit" class="btn btn-info shadow-sm border-0 text-start text-uppercase text-white ">Search</button>
                    </form>
                </div>
                <div class="information-section container">
                    <div class=" card shadow add-btn-action " id="add_degree">
                        <h3 class="mb-4 text-center">Personal Information</h3>
                        <form action="index.php?page=personalinfo-submit" method="POST">
                            <div class="row">
                                <!-- Father Name -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Father Name</label>
                                    <input type="text" name="father_name" class="form-control" <?php if(isset($row['father_name'])){?> value="<?= $row['father_name'] ?> " <?php  } ?>  required>
                                </div>

                                <!-- Mother Name -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Mother Name</label>
                                    <input type="text" name="mother_name" class="form-control" <?php if(isset($row['mother_name'])){?> value="<?= $row['mother_name']?> " <?php  } ?> required>
                                </div>
                            </div>

                            <div class="row">
                                <!-- Date of Birth -->
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Date of Birth</label>
                                    <input type="date" name="dob" class="form-control" <?php if(isset($row['dob'])){?> value="<?= $row['dob']?> " <?php  } ?> required>
                                </div>

                                <!-- Nationality -->
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Nationality</label>
                                    <input type="text" name="nationality" <?php if(isset($row['nationality'])){?> value="<?= $row['nationality']?> " <?php  } ?> class="form-control">
                                </div>

                                <!-- Religion -->
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Religion</label>
                                    <input type="text" name="religion" <?php if(isset($row['religion'])){?> value="<?= $row['religion']?> " <?php  } ?> class="form-control">
                                </div>
                            </div>

                            <div class="row">
                                <!-- Gender -->
                                <div class="col-md-4 mb-3">
                                    <label class="form-label d-block">Gender</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" value="Male" >
                                        <label class="form-check-label">Male</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" value="Female" >
                                        <label class="form-check-label">Female</label>
                                    </div>
                                </div>

                                <!-- Marital Status -->
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Marital Status</label>
                                    <select name="marital_status" class="form-select">
                                        <option value="">Select</option>
                                        <option value="single" <?php if(isset($row['marital_status'])){if($row['marital_status']=='single'){?> selected  <?php } } ?>>Single</option>
                                        <option value="married" <?php if(isset($row['marital_status'])){if($row['marital_status']=='married'){?> selected  <?php } } ?> >Married</option>
                                    </select>
                                </div>

                                <!-- NID -->
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">NID</label>
                                    <input type="text" name="nid" class="form-control" <?php if(isset($row['nid'])){?> value="<?= $row['nid']?> " <?php  } ?> >
                                </div>
                            </div>

                            <div class="row">
                                <!-- Birth Registration -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Birth Registration No</label>
                                    <input type="text" name="birth_registration" class="form-control" <?php if(isset($row['birth_registration'])){?> value="<?= $row['birth_registration']?> " <?php  } ?>>
                                </div>

                                <!-- Passport -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Passport No</label>
                                    <input type="text" name="passport_no" class="form-control" <?php if(isset($row['passport_no'])){?> value="<?= $row['passport_no']?> " <?php  } ?>>
                                </div>
                            </div>

                            <!-- Address -->
                            <div class="mb-3">
                                <label class="form-label">Address</label>
                                <textarea name="address" class="form-control" rows="3" ><?php if(isset($row['address'])){?> <?= $row['address']?> <?php  } ?></textarea>
                            </div>

                            <!-- Submit -->
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary px-5">Submit</button>
                            </div>

                        </form>
                    </div>

                    <div class=" mt-5">
                    <div class="card p-4 shadow-lg border-0 rounded-4">

                        <!-- Header -->
                        <div class="bg-primary text-white p-4 rounded-top">
                            <div class="information_header d-flex align-item-center justify-content-between">
                                <div class="p-3 text-left">
                                        <h4 class="">Personal Information of</h4>
                                        <h5 class=""><?= $_SESSION['name'] ?? 'N/A' ?></h5>
                                </div>
                                <div class="text-center">
                                    <button id='edit_btn' class="btn btn-info px-4">EDIT</button>
                                </div>
                            </div>
                        </div>

                        <!-- Body -->
                        <div class="card-body p-2">
                            <?php if(isset($_GET['message'])){ 
                                echo  '<h3 class="text-danger text-center p-2">'.$_GET['message'].'</h3>';

                                } ?>
                            <div class="row g-2">

                                <!-- Father Name -->
                                <div class="col-md-6">
                                    <div class="p-3 bg-light rounded-3 h-100">
                                        <small class="text-muted">Father Name</small>
                                        <h6 class="mb-0"><?= $row['father_name'] ?? 'N/A' ?></h6>
                                    </div>
                                </div>

                                <!-- Mother Name -->
                                <div class="col-md-6">
                                    <div class="p-3 bg-light rounded-3 h-100">
                                        <small class="text-muted">Mother Name</small>
                                        <h6 class="mb-0"><?= $row['mother_name'] ?? 'N/A' ?></h6>
                                    </div>
                                </div>

                                <!-- DOB -->
                                <div class="col-md-4">
                                    <div class="p-3 border rounded-3 text-center">
                                        <small class="text-muted">Date of Birth</small>
                                        <h6 class="mt-1"><?= $row['dob'] ?? 'N/A' ?></h6>
                                    </div>
                                </div>

                                <!-- Nationality -->
                                <div class="col-md-4">
                                    <div class="p-3 border rounded-3 text-center">
                                        <small class="text-muted">Nationality</small>
                                        <h6 class="mt-1"><?= $row['nationality'] ?? 'N/A' ?></h6>
                                    </div>
                                </div>

                                <!-- Religion -->
                                <div class="col-md-4">
                                    <div class="p-3 border rounded-3 text-center">
                                        <small class="text-muted">Religion</small>
                                        <h6 class="mt-1"><?= $row['religion'] ?? 'N/A' ?></h6>
                                    </div>
                                </div>

                                <!-- Gender -->
                                <div class="col-md-4">
                                    <div class="p-3 bg-light rounded-3 text-center">
                                        <small class="text-muted">Gender</small>
                                        <h6 class="mt-1"><?= $row['gender'] ?? 'N/A' ?></h6>
                                    </div>
                                </div>

                                <!-- Marital Status -->
                                <div class="col-md-4">
                                    <div class="p-3 bg-light rounded-3 text-center">
                                        <small class="text-muted">Marital Status</small>
                                        <h6 class="mt-1"><?= $row['marital_status'] ?? 'N/A' ?></h6>
                                    </div>
                                </div>

                                <!-- NID -->
                                <div class="col-md-4">
                                    <div class="p-3 bg-light rounded-3 text-center">
                                        <small class="text-muted">NID</small>
                                        <h6 class="mt-1"><?= $row['nid'] ?? 'N/A' ?></h6>
                                    </div>
                                </div>

                                <!-- Birth Registration -->
                                <div class="col-md-6">
                                    <div class="p-3 border rounded-3">
                                        <small class="text-muted">Birth Registration No</small>
                                        <h6 class="mb-0"><?= $row['birth_registration'] ?? 'N/A' ?></h6>
                                    </div>
                                </div>

                                <!-- Passport -->
                                <div class="col-md-6">
                                    <div class="p-3 border rounded-3">
                                        <small class="text-muted">Passport No</small>
                                        <h6 class="mb-0"><?= $row['passport_no'] ?? 'N/A' ?></h6>
                                    </div>
                                </div>

                                <!-- Address -->
                                <div class="col-12">
                                    <div class="p-3 bg-light rounded-3">
                                        <small class="text-muted">Address</small>
                                        <p class="mb-0"><?= $row['address'] ?? 'N/A' ?></p>
                                    </div>
                                </div>

                            </div>

                            

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