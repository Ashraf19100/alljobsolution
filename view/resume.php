<?php  
    require_once 'database/database.php';
    $resumes = new datamodel();
    $skill = new datamodel();
    $resume_condition = " WHERE user_id ='".$_SESSION['id']."'";
    $resumeinfo = $resumes->getSingleData('resumes', ' * ', $resume_condition);
    $skill_list = $skill->getData('skills', ' * ', '');
    if(!empty($resumeinfo->skills)){
        $cvskills = explode(",", $resumeinfo->skills);
    }
   
    
?>
<!DOCTYPE html>
<html lang="en">
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
                    <div class="container mt-2"></div>

                    <div class="container">
                        <div class="card shadow-lg rounded-4 overflow-hidden">

                            <!-- Header -->
                            <div class="bg-primary text-white p-4">
                                <div class="information_header d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0">CV Profile Information</h4>

                                    <!-- Modal Trigger Button -->
                                    <button class="btn btn-light fw-bold" data-bs-toggle="modal" data-bs-target="#editModal">
                                        EDIT+
                                    </button>
                                </div>
                            </div>

                            <div class="p-4">

                                <?php if(isset($_GET['message'])){ 
                                    echo  '<h3 class="text-danger text-center p-2">'.$_GET['message'].'</h3>';
                                } ?>

                                <h5 class="mb-3">Resume Management</h5>

                                <div class="table-responsive">
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
                                            <?php if(isset($resumeinfo)){?>
                                            <tr>
                                                <td><?= $resumeinfo->skills ?></td>
                                                <td><?= $resumeinfo->file_path ?></td>
                                                <td>
                                                    <a href="uploads/resume/<?= $resumeinfo->file_path ?>" target="_blank" class="btn btn-primary btn-sm">
                                                        View PDF
                                                    </a>
                                                </td>
                                                <td>
                                                    <button class="btn btn-success btn-sm" onclick="generatePDF('john')">
                                                        Generate PDF
                                                    </button>
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
                <div class="fade modal" id="editModal" tabindex="-1" >
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content rounded-4">
                            <form action="index.php?page=resumeupload-submit" method="POST" enctype="multipart/form-data" class="p-4">

                                <div class="row g-4">
                                    
                                    <!-- Skills -->
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold">Select Skills</label>

                                        <div class="border rounded p-3" style="max-height:220px; overflow-y:auto;">
                                            <?php foreach($skill_list as $skill_list) {?>
                                            <div class="form-check">
                                                <input type="checkbox" name="skills[]" class="form-check-input" value="<?= $skill_list['skill_name'] ?>" id="skill1">
                                                <label class="form-check-label" for="skill1"><?= $skill_list['skill_name'] ?></label>
                                            </div>
                                            <?php } ?>
                                        </div>

                                        <small class="text-muted">You can select multiple skills</small>
                                    </div>

                                    <!-- File Upload -->
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold">Upload Your Resume</label>

                                        <input type="file" name="file_path" class="form-control" accept=".pdf">

                                        <div class="form-text">
                                            Only PDF allowed. Max size: 2MB
                                        </div>

                                        <!-- Preview Placeholder -->
                                        <div class="mt-3 p-3 border rounded text-center text-muted">
                                            No file selected
                                        </div>
                                    </div>

                                </div>

                                <!-- Submit -->
                                <div class="text-center mt-4">
                                    <button type="submit" class="btn btn-success px-4 py-2">
                                        Save Changes
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