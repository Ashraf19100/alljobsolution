<?php  
require_once 'database/database.php';

$personalinfo = new datamodel();   
$condition = " WHERE user_id ='".$_SESSION['id']."'";
$personal_info = $personalinfo->getSingleData('user_details',' * ', $condition );   



    
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
                                

                        <div class=" mt-5">
                            <div class="card p-4 shadow-lg border-0 rounded-4">

                                <!-- Header -->
                                <div class="bg-primary text-white p-4 rounded-top">
                                    <div class="information_header d-flex align-item-center justify-content-between">
                                        <div class="p-3 text-left">
                                                <h4 class="">Personal Information of</h4>
                                                <h5 class=""><?= $_SESSION['name'] ?></h5>
                                        </div>
                                        <div class="text-center">
                                            <button class="btn btn-light px-4 py-2" data-bs-toggle="modal" data-bs-target="#personalinfoModal">EDIT</button>
                                        </div>
                                    </div>
                                </div>

                                <!-- Body -->
                                <div class="card-body p-2">
                                    <?php if(isset($_GET['message'])){ 
                                        echo  '<h3 class="text-danger text-center p-2">'.$_GET['message'].'</h3>';

                                        } ?>
                                    <div class="row g-2">
                                        <?php if(isset($personal_info)){ ?>
                                        <!-- Father Name -->
                                        <div class="col-md-6">
                                            <div class="p-3 bg-light rounded-3 h-100">
                                                <small class="text-muted">Father Name</small>
                                                <h6 class="mb-0"><?= $personal_info->father_name ?></h6>
                                            </div>
                                        </div>

                                        <!-- Mother Name -->
                                        <div class="col-md-6">
                                            <div class="p-3 bg-light rounded-3 h-100">
                                                <small class="text-muted">Mother Name</small>
                                                <h6 class="mb-0"><?= $personal_info->mother_name   ?></h6>
                                            </div>
                                        </div>

                                        <!-- DOB -->
                                        <div class="col-md-4">
                                            <div class="p-3 border rounded-3 text-center">
                                                <small class="text-muted">Date of Birth</small>
                                                <h6 class="mt-1"><?= $personal_info->dob   ?></h6>
                                            </div>
                                        </div>

                                        <!-- Nationality -->
                                        <div class="col-md-4">
                                            <div class="p-3 border rounded-3 text-center">
                                                <small class="text-muted">Nationality</small>
                                                <h6 class="mt-1"><?= $personal_info->nationality   ?></h6>
                                            </div>
                                        </div>

                                        <!-- Religion -->
                                        <div class="col-md-4">
                                            <div class="p-3 border rounded-3 text-center">
                                                <small class="text-muted">Religion</small>
                                                <h6 class="mt-1"><?= $personal_info->religion  ?></h6>
                                            </div>
                                        </div>

                                        <!-- Gender -->
                                        <div class="col-md-4">
                                            <div class="p-3 bg-light rounded-3 text-center">
                                                <small class="text-muted">Gender</small>
                                                <h6 class="mt-1"><?= $personal_info->gender   ?></h6>
                                            </div>
                                        </div>

                                        <!-- Marital Status -->
                                        <div class="col-md-4">
                                            <div class="p-3 bg-light rounded-3 text-center">
                                                <small class="text-muted">Marital Status</small>
                                                <h6 class="mt-1"><?= $personal_info->marital_status   ?></h6>
                                            </div>
                                        </div>

                                        <!-- NID -->
                                        <div class="col-md-4">
                                            <div class="p-3 bg-light rounded-3 text-center">
                                                <small class="text-muted">NID</small>
                                                <h6 class="mt-1"><?= $personal_info->nid   ?></h6>
                                            </div>
                                        </div>

                                        <!-- Birth Registration -->
                                        <div class="col-md-6">
                                            <div class="p-3 border rounded-3">
                                                <small class="text-muted">Birth Registration No</small>
                                                <h6 class="mb-0"><?= $personal_info->birth_registration   ?></h6>
                                            </div>
                                        </div>

                                        <!-- Passport -->
                                        <div class="col-md-6">
                                            <div class="p-3 border rounded-3">
                                                <small class="text-muted">Passport No</small>
                                                <h6 class="mb-0"><?= $personal_info->passport_no   ?></h6>
                                            </div>
                                        </div>

                                        <!-- Address -->
                                        <div class="col-12">
                                            <div class="p-3 bg-light rounded-3">
                                                <small class="text-muted">Address</small>
                                                <p class="mb-0"><?= $personal_info->address   ?></p>
                                            </div>
                                        </div>
                                        <?php } ?>

                                    </div>

                                    

                                </div>
                            </div>
                        </div>    
                            
                    </div>
                    <div class="modal fade" id="personalinfoModal" tabindex="-1">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content rounded-4">
                                <div class=" card shadow p-4" id="add_degree">
                                    <div class="modal-top-header d-flex justify-content-between">
                                        <h3 class="mb-4 text-center">Personal Information</h3>
                                        <button type="button" class="btn-close btn-close-dark" data-bs-dismiss="modal"></button>
                                    </div>
                                    <form action="index.php?page=personalinfo-submit" method="POST">
                                        <div class="row">
                                            <!-- Father Name -->
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Father Name</label>
                                                <input type="text" name="father_name" class="form-control" value=<?= $personal_info->father_name ?>  required>
                                            </div>

                                            <!-- Mother Name -->
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Mother Name</label>
                                                <input type="text" name="mother_name" class="form-control" value=<?= $personal_info->mother_name ?> required>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <!-- Date of Birth -->
                                            <div class="col-md-4 mb-3">
                                                <label class="form-label">Date of Birth</label>
                                                <input type="date" name="dob" class="form-control" value=<?= $personal_info->dob ?>  required>
                                            </div>

                                            <!-- Nationality -->
                                            <div class="col-md-4 mb-3">
                                                <label class="form-label">Nationality</label>
                                                <input type="text" name="nationality" value=<?= $personal_info->nationality ?>  class="form-control">
                                            </div>

                                            <!-- Religion -->
                                            <div class="col-md-4 mb-3">
                                                <label class="form-label">Religion</label>
                                                <input type="text" name="religion"  class="form-control" value=<?= $personal_info->religion ?> >
                                            </div>
                                        </div>

                                        <div class="row">
                                            <!-- Gender -->
                                            <div class="col-md-4 mb-3">
                                                <label class="form-label d-block">Gender</label>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="gender" value="Male" <?php if($personal_info->gender == 'male'){ echo " checked "; } ?>>
                                                    <label class="form-check-label">Male</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="gender" value="Female" <?php if($personal_info->gender == 'female'){ echo " checked "; } ?>>
                                                    <label class="form-check-label">Female</label>
                                                </div>
                                            </div>

                                            <!-- Marital Status -->
                                            <div class="col-md-4 mb-3">
                                                <label class="form-label">Marital Status</label>
                                                <select name="marital_status" class="form-select">
                                                    <option value="">Select</option>
                                                    <option value="single" >Single</option>
                                                    <option value="married"  >Married</option>
                                                </select>
                                            </div>

                                            <!-- NID -->
                                            <div class="col-md-4 mb-3">
                                                <label class="form-label">NID</label>
                                                <input type="text" name="nid" class="form-control" value=<?= $personal_info->nid ?> >
                                            </div>
                                        </div>

                                        <div class="row">
                                            <!-- Birth Registration -->
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Birth Registration No</label>
                                                <input type="text" name="birth_registration" class="form-control" value=<?= $personal_info->birth_registration ?>>
                                            </div>

                                            <!-- Passport -->
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Passport No</label>
                                                <input type="text" name="passport_no" class="form-control" value=<?= $personal_info->passport_no ?>>
                                            </div>
                                        </div>

                                        <!-- Address -->
                                        <div class="mb-3">
                                            <label class="form-label">Address</label>
                                            <textarea name="address" class="form-control" rows="3" >value=<?= $personal_info->address ?></textarea>
                                        </div>

                                        <!-- Submit -->
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary px-5">Submit</button>
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
	
	<!--==================================================================-->
	<?php require "layouts/scripts.php" ?>
	
</body>

</html>