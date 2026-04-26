<?php  
    require_once 'database/database.php';
    $eduinfo = new datamodel();
    $condition = " WHERE user_id ='".$_SESSION['id']."'";
    $all_degree = $eduinfo->getData('bachelor_degrees',' * ', '' );


    $educationinfo = $eduinfo->getData('user_education',' * ', $condition );
    
    
    
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
                        <input name=""class="w-75 p-2 shadow-sm border-0 text-start text-uppercase text-info" type="text" name="search" placeholder="search your desire position">
                        <button type="submit" class="btn btn-info shadow-sm border-0 text-start text-uppercase text-white ">Search</button>
                    </form>
                </div>
                <div class="information-section">
                    
                    <div class="container ">
                        <div class="card shadow p-4">
                            <div class="bg-primary text-white text-center p-4 rounded-top">
                                <div class="information_header d-flex align-item-center justify-content-between">
                                    <h4 class="mb-4">Educational Information</h4>
                                    <div class="text-center">
                                        <button class="btn btn-light px-4 py-2" data-bs-toggle="modal" data-bs-target="#degreeModal">ADD NEW+</button>
                                    </div>
                                </div>
                            </div>
                            
                            
                        <?php 
                            if(isset($educationinfo)){
                                foreach($educationinfo as $educationinfo){
                                    
                               
                         ?>
                            <div class="card shadow p-1">
                                <div class="row mb-3">
                                <div class="col-md-6">
                                    <strong>Exam Name:</strong>
                                    <p id="exam_name"><?= $educationinfo['exam_name'] ?></p>
                                </div>

                                <div class="col-md-6">
                                    <strong>University / Board:</strong>
                                    <p id="uni_board"><?= $educationinfo['uni_board'] ?></p>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <strong>Roll / ID:</strong>
                                    <p id="roll_id">123456</p>
                                </div>

                                <div class="col-md-4">
                                    <strong>Subject:</strong>
                                    <p id="subject">Science</p>
                                </div>

                                <div class="col-md-4">
                                    <strong>Passing Year:</strong>
                                    <p id="passing_year">2020</p>
                                </div>
                            </div>
                            </div>
                            <?php } }?>
                        </div>
                    </div>
                    
                </div>
                <div class="modal fade" id="degreeModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content rounded-4">

            <!-- Header -->
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">Add New Degree</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>

            <!-- Body -->
            <div class="modal-body">

                <form action="index.php?page=education-submit" method="POST">

                    <div class="row g-3">

                        <!-- Exam Name -->
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Exam Name</label>
                            <select name="exam_name" class="form-control" required >
                                                <option value="">--------select exam Name--------</option>
                                                <?php foreach($all_degree as $all_degree){?>  
                                                <option value="<?=$all_degree['degree_name'] ?>" ><?=$all_degree['degree_name'] ?></option>
                                                <?php } ?>
                                            </select>
                        </div>

                        <!-- University / Board -->
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">University / Board</label>
                            <input name="uni_board" type="text" class="form-control" placeholder="e.g. Dhaka Board">
                        </div>

                        <!-- Roll ID -->
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Roll / ID</label>
                            <input name="roll_id" type="text" class="form-control" placeholder="Enter roll or ID">
                        </div>

                        <!-- Subject -->
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Subject</label>
                            <input name="subject" type="text" class="form-control" placeholder="e.g. Science">
                        </div>

                        <!-- Result -->
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Result</label>
                            <input name="result" type="text" class="form-control" placeholder="e.g. GPA 5.00">
                        </div>

                        <!-- Passing Year -->
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Passing Year</label>
                            <input name="passing_year" type="number" class="form-control" min="1950" max="2099" placeholder="e.g. 2022">
                        </div>

                    </div>

                    <!-- Submit -->
                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-success px-5 py-2">
                            Save Degree
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
    
        

        
	
    </div>
	
	<!--==================================================================-->
	<?php require "layouts/scripts.php" ?>
	
</body>

</html>

