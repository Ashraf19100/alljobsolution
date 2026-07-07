<?php
    require_once 'database/database.php';

    $set_examCenter = new datamodel();
    $today = new DateTime();
    $circular_id = $_GET['circular'];
    $ref = $_GET['ref'];
    $exam_id = $_GET['exam'];
    $all_centers = $set_examCenter->getobjectData('exam_centers', ' * ', ' WHERE status=1');
    $exams_posts = $set_examCenter->getSingleData('exams', ' * ', ' WHERE id='.$exam_id);
    
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
                <section class="page-header">
                    <div class="container">
                        <h1 class="page-title"> Create Exam </h1>
                    </div>
                </section>
                <section> 
                        <div class="container mt-4">
                            <form method="POST" action="index.php?page=assigned_exam_vanue&circular=<?=$circular_id?>&ref=<?=$ref?>" class="container mt-4">

                                <div class="card shadow">
                                    <div class="card-header bg-dark text-white">
                                        <h4 class="mb-0">Set Exam for Available Positions</h4>
                                    </div>

                                    <div class="card-body">

                                        <div class="row g-3">

                                            <!-- Post Info -->
                                            <div class="col-md-6">
                                                <label class="form-label">Circular Reference</label>
                                                <input type="text" name="" class="form-control" id="searchDatainput" placeholder="Search Center">
                                                <div  style="max-height:220px; overflow-y:auto;">
                                                    <?php foreach($all_centers as $center){ ?>
                                                    <div class="form-check searchcard">
                                                        <input type="checkbox" name="center_ids[]" class="form-check-input" value="<?= $center->id ?>" id="skill1">
                                                        <label class="form-check-label" for="skill1"><?= $center->center_name ?></label>
                                                        
                                                    </div>
                                                    <?php }   ?>
                                                </div>
                                                
                                            </div>
                                            <div class="col-md-6">
                                                <div class="col-md-12">
                                                    <label class="form-label">Post Name</label>
                                                    <input type="hidden" name="exam_id" value="<?=$exam_id?>" >
                                                    <input type="text" class="form-control" value="<?=$exams_posts->exam_posts_title?>" readonly>
                                                </div>
                                                <div class="col-md-12">
                                                    <label class="form-label">Exam Date</label>
                                                    <input type="hidden" name="exam_date" value="<?=$exams_posts->exam_date?>" >
                                                    <input type="text" class="form-control" value="<?=$exams_posts->exam_date?>" readonly>
                                                </div>
                                            </div>
                                            

                                        

                                        </div>

                                    </div>

                                    <div class="card-footer text-end">
                                        <button type="submit" class="btn btn-primary">
                                            Save Information
                                        </button>
                                    </div>

                                </div>

                            </form>  
                        </div>
                    </section> 
                
                
            </div>
        </div>
        </div>
    
        

        
	
    </div>
	
	<!--==================================================================-->
	<?php require "layouts/scripts.php" ?>
	
</body>

</html>


                 
                    
                    