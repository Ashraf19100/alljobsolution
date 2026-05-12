<?php
   require_once 'database/database.php';
    
    
    $showcompany = new datamodel();
    if(isset($_GET['cmp_i'])){
        $whereID= " WHERE id =".$_GET['cmp_i'];
        $singlecompany = $showcompany->getSingleData('companies',' * ', $whereID);
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
                <section> 
                    <div class=" py-5">
                                    <?php if(isset($_GET['message'])){ 
                                        echo '<h3 class="text-danger text-center p-2">'.$_GET['message'].'</h3>';

                                        } ?>
                            <div class="row justify-content-center">
                                <div class="d-flex justify-content-between align-items-center mb-1 card-header bg-dark text-white">
                                    
                                    <h4 class="mb-0">Organisation Details</h4>
                                    <a href="add_job.php" class="btn btn-light btn-sm" data-bs-toggle="modal" data-bs-target="#organisationModal">
                                        Edit
                                    </a>
                                </div>
                                <div class="col-lg-12">

                                    <div class="card border-0 shadow-lg rounded-4 overflow-hidden">

                                        <!-- Top Banner -->
                                        <div class="bg-light text-dark p-4 text-center">

                                            <img 
                                                src="uploads/organisations/<?= $singlecompany->logo ?>" 
                                                alt="Company Logo"
                                                class=" border border-4 border-white shadow img-fluid"
                                                width="500px"
                                                height="200"
                                                
                                            >

                                            <h2 class="mt-3 mb-1 fw-bold ">
                                                <?= $singlecompany->company_name ?>
                                            </h2>

                                            <span class="badge bg-light bg-dark text-light px-3 py-2">
                                                <?= ($singlecompany->company_type == 'gov') ? 'Government Organisations' : 'Private Organistaions' ?>
                                            </span>

                                        </div>

                                        <!-- Card Body -->
                                        <div class="card-body p-4">

                                            <!-- Website -->
                                            <div class="mb-4">

                                                <h5 class="fw-bold text-primary mb-2">
                                                    Website
                                                </h5>

                                                <a 
                                                    href="<?= $singlecompany->website ?>" 
                                                    target="_blank"
                                                    class="text-decoration-none"
                                                >
                                                    <?= $singlecompany->website ?>
                                                </a>

                                            </div>

                                            <!-- Location -->
                                            <div class="mb-4">

                                                <h5 class="fw-bold text-primary mb-2">
                                                    Location
                                                </h5>

                                                <p class="mb-0 text-muted">
                                                     <?= $singlecompany->location ?>
                                                </p>

                                            </div>

                                            <!-- Description -->
                                            <div>

                                                <h5 class="fw-bold text-primary mb-3">
                                                    Company Description
                                                </h5>

                                                <p class="text-muted lh-lg mb-0">
                                                     <?= $singlecompany->description ?>
                                                </p>

                                            </div>

                                        </div>

                                    </div>
                                

                                </div>

                            </div>
                    </div>
                </section>
                <div class="modal fade" id="organisationModal" tabindex="-1">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content rounded-4">
                                <div class="row justify-content-center">
                                    <div class="card shadow border-0 rounded-4">

                                        <div class="card-header bg-primary text-white py-3">
                                            <h3 class="mb-0">Edit Company Information</h3>
                                        </div>

                                        <div class="card-body p-4">

                                            <form action="index.php?page=addcompany&cmppass_i=<?=$singlecompany->id ?>" method="POST" enctype="multipart/form-data">

                                                <!-- Company Name -->
                                                <div class="mb-3">
                                                    <label class="form-label fw-semibold">
                                                        Company Name
                                                    </label>

                                                    <input 
                                                        type="text" 
                                                        name="company_name" 
                                                        class="form-control"
                                                        placeholder="Enter company name"
                                                        value ="<?= $singlecompany->company_name ?>"
                                                        required
                                                    >
                                                </div>

                                                <!-- Description -->
                                                <div class="mb-3">
                                                    <label class="form-label fw-semibold">
                                                        Description
                                                    </label>

                                                    <textarea 
                                                        name="description" 
                                                        class="form-control"
                                                        rows="5"
                                                        placeholder="Enter company description"
                                                        
                                                        required
                                                    ><?= $singlecompany->description ?></textarea>
                                                </div>

                                                <!-- Website -->
                                                <div class="mb-3">
                                                    <label class="form-label fw-semibold">
                                                        Website
                                                    </label>

                                                    <input 
                                                        type="text" 
                                                        name="website" 
                                                        class="form-control"
                                                        value ="<?= $singlecompany->website ?>"
                                                    >
                                                </div>

                                                <!-- Logo -->
                                                <div class="mb-3">
                                                    <label class="form-label fw-semibold">
                                                        Company Logo
                                                    </label>

                                                    <input 
                                                        type="file" 
                                                        name="logo" 
                                                        class="form-control"
                                                        
                                                    >
                                                </div>

                                                <!-- Location -->
                                                <div class="mb-3">
                                                    <label class="form-label fw-semibold">
                                                        Location
                                                    </label>

                                                    <input 
                                                        type="text" 
                                                        name="location" 
                                                        class="form-control"
                                                        placeholder="Enter company location"
                                                        value ="<?= $singlecompany->location ?>"
                                                        required
                                                    >
                                                </div>

                                                <!-- Company Type -->
                                                <div class="mb-4">
                                                    <label class="form-label fw-semibold">
                                                        Company Type
                                                    </label>

                                                    <select 
                                                        name="company_type" 
                                                        class="form-select"
                                                        
                                                        required
                                                    >
                                                        <option value="">Select Type</option>
                                                        <option value="gov" <?= ($singlecompany->company_type == 'gov') ? 'selected' : '' ?>>Government</option>
                                                        <option value="non_gov" <?= ($singlecompany->company_type == 'non_gov') ? 'selected' : '' ?>>Non Government</option>
                                                    </select>
                                                </div>

                                                <!-- Submit Button -->
                                                <div class="text-end">
                                                    <button type="submit" class="btn btn-primary px-4">
                                                        Save Company
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
        </div>
    
        

        
	
    </div>
	
	<!--==================================================================-->
	<?php require "layouts/scripts.php" ?>
	
</body>

</html>




