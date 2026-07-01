<?php
    require_once 'database/database.php';

    $createExm = new datamodel();
    $today = new DateTime();
    $circular_id = $_GET['circular'];
    $circular_ref = $_GET['ref'];
    $circular_jobs = $createExm->getData('jobs', ' * ', ' WHERE circular_id='.$circular_id );



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
                            <form method="POST" action="index.php?page=setexam" class="container mt-4">

                                <div class="card shadow">
                                    <div class="card-header bg-dark text-white">
                                        <h4 class="mb-0">Set Exam for Available Positions</h4>
                                    </div>

                                    <div class="card-body">

                                        <div class="row g-3">

                                            <!-- Post Info -->
                                            <div class="col-md-4">
                                                <label class="form-label">Circular Reference</label>
                                                <input type="text"  class="form-control" value="<?=$circular_ref ?>" readonly>
                                                <input type="hidden" name="circular_id" value="<?=$circular_id?>">
                                            </div>

                                            <div class="col-md-4">
                                                <label class="form-label">Post Name</label>
                                                <select name="exam_posts_title" id="" class="form-control">
                                                    <option value="">-----select-----</option>
                                                    <?php foreach($circular_jobs as $job){?> 
                                                    <option value="<?= $job['title'] ?>"><?= $job['title'] ?></option>
                                                    
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label">Exam Type</label>
                                                <select name="exam_type" id="" class="form-control">
                                                    <option value="">-----select-----</option>
                                                    <option value="MCQ">MCQ</option>
                                                    <option value="Written">Written</option>
                                                    <option value="Practical">Practical</option>
                                                    <option value="Viva">Viva</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label fw-bold">Exam Date</label>
                                                <input type="date" name="exam_date" class="form-control" placeholder="e.g. 25000" required>
                                                
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label fw-bold">Start time</label>
                                                <input type="time" name="start_time" class="form-control" placeholder="e.g. 25000" required>    
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label fw-bold">End Time</label>
                                                <input type="time" name="end_time" class="form-control" placeholder="e.g. 25000" required>    
                                            </div>
                                            <div class="col-md-12">
                                                <label class="form-label fw-bold">End Time</label>
                                                <textarea name="instructions" id="" class="form-control"></textarea>   
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


                 
                    
                    