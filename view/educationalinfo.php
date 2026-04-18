<?php  
    require_once 'database/database.php';
    $eduinfo = new datamodel();
    $condition = " WHERE user_id ='".$_SESSION['id']."'";

    $result = $eduinfo->getData('user_education',' * ', $condition );
    
    
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
                            <h4 class="mb-3">ADD NEW DEGREE</h4>

                            <form>

                                <div class="row">
                                    <!-- Exam Name -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Exam Name</label>
                                        <input type="text" name="exam_name" class="form-control" placeholder="e.g. SSC, HSC, BSc">
                                    </div>

                                    <!-- University / Board -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">University / Board</label>
                                        <input type="text" name="uni_board" class="form-control" placeholder="e.g. Dhaka Board">
                                    </div>
                                </div>

                                <div class="row">
                                    <!-- Roll ID -->
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Roll / ID</label>
                                        <input type="text" name="roll_id" class="form-control">
                                    </div>

                                    <!-- Subject -->
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Subject</label>
                                        <input type="text" name="subject" class="form-control">
                                    </div>

                                    <!-- Passing Year -->
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Passing Year</label>
                                        <input type="number" name="passing_year" class="form-control" min="1950" max="2099">
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
                                    <h4 class="mb-4">Educational Information</h4>
                                    <div class="text-center">
                                        <button id='edit_btn' class="btn btn-info px-4">ADD NEW+</button>
                                    </div>
                                </div>
                            </div>
                            
                            
                        <?php foreach($result as $education){ ?>
                            <div class="card shadow p-1">
                                <div class="row mb-3">
                                <div class="col-md-6">
                                    <strong>Exam Name:</strong>
                                    <p id="exam_name"><?= $education['exam_name'] ?></p>
                                </div>

                                <div class="col-md-6">
                                    <strong>University / Board:</strong>
                                    <p id="uni_board"><?= $education['uni_board'] ?></p>
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
                            <?php } ?>
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

