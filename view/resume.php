<?php  
    require_once 'database/database.php';
    $resumes = new datamodel();
    $skills = new datamodel();
    $condition = " WHERE user_id ='".$_SESSION['id']."'";
    $resumeinfo = $resumes->getData('resumes', ' * ', $condition);
    $skill_list = $skills->getData('skills', ' * ', '');
    if(isset($resumeinfo)){
        foreach($resumeinfo as $row){
            foreach($row as $key => $val){
                $cvprofile[$key] = $val;
            }
        }
    }
    if(isset($cvprofile)){
        $cvskills = explode(",",$cvprofile['skills']);
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
                            <h4 class="mb-3">Update cvprofile  </h4>

                            <form action="index.php?page=resumeupload-submit" method="POST" enctype="multipart/form-data" >

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <?php foreach($skill_list as $skill){ ?>
                                        <input type="checkbox" name="skill[]" class="form-check-input" value="<?= $skill['skill_name'] ?>" placeholder="" <?php if(in_array($skill['skill_name'] , $cvskills)){?>Checked <?php } ?> ><label class="form-label px-1"><?= $skill['skill_name'] ?></label>
                                            <?php } ?>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Yor Resume</label>
                                        <input type="file" name="file_path" class="form-control" placeholder="">
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
                                    <h4 class="mb-4">cvprofile Information</h4>
                                    <button id='edit_btn' class="rounded btn btn-info text-center fs-5">EDIT+</button>
                             
                                </div>
                            </div>
                            <div class="image-signature row">
                                <?php if(isset($_GET['message'])){ 
                                    echo  '<h3 class="text-danger text-center p-2">'.$_GET['message'].'</h3>';

                                    } ?>
                                <div class="container my-5">
                                    <h3 class="mb-4">Resume Management Table</h3>

                                    <table class="table table-bordered table-hover align-middle">
                                        <thead class="table-dark">
                                        <tr>
                                            <th>Skills</th>
                                            <th>Resume (File Name)</th>
                                            <th>Your Resume</th>
                                            <th>JO Solution Resume</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php if(isset($cvprofile)){?>
                                            <tr>
                                                <td><?= $cvprofile['skills'] ?></td>
                                                <td><?= $cvprofile['file_path'] ?>td>
                                                <td>
                                                <a href="uploads/resume/<?= $cvprofile['file_path'] ?>" target="_blank" class="btn btn-primary btn-sm">
                                                    View PDF
                                                </a>
                                                </td>
                                                <td>
                                                <button class="btn btn-success btn-sm" onclick="generatePDF('john')">
                                                    Generate PDF
                                                </button>
                                                </td>
                                            </tr><?php } ?>
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
    
        

        
	
    </div>
	
	<!--==================================================================-->
	<?php require "layouts/scripts.php" ?>
	
</body>

</html>

