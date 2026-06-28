<?php
    require_once 'database/database.php';
    $allpostlimit=8;
    $allpostpagn = isset($_GET['pagination']) ? (int)$_GET['pagination'] : 1;
    $allpostoffset = ($allpostpagn - 1)*$allpostlimit;
    $alljob = new datamodel();

    $totalpost = $alljob->getData('jobs',' COUNT(*) as total ');
    $postRows = $totalpost[0]['total'];
    $totalpgn= ceil( $postRows / $allpostlimit);
    $jobpostresult = $alljob->getData('jobs',' * ', '', $allpostlimit, $allpostoffset);
    $crnt_page= isset($_GET['page']) ?  $_GET['page'] : '' ;


    $totalcircul = $alljob->getData('jobs',' COUNT(*) as total ');
    $circulRows = $totalcircul[0]['total'];
    $totalpgncircul= ceil( $circulRows / $allpostlimit);
    $jobCirculresult = $alljob->getData('job_circulars',' * ', ' WHERE status= "active"', $allpostlimit, $allpostoffset);



?>
    <div class="job-head mb-3">
        <div class="hero">

            <h1 class="text-center text-capitalize fw-bold ">Job Listings</h1>
            <p class="text-muted text-center">
                Find your perfect opportunity
            </p>

            <div class="d-flex justify-content-center gap-3 mt-4">

                <button class="btn btn-primary  switch-btn active"
                        id="circularBtn">
                    <i class="bi bi-file-earmark-text"></i>
                    Circular
                </button>

                <button class="btn btn-outline-primary switch-btn"
                        id="postBtn">
                    <i class="bi bi-briefcase"></i>
                    All Posts
                </button>

            </div>

        </div>
    </div>
    <div id="Circular_section">
            <?php if(!empty($_GET['page']) && $_GET['page'] != 'home'){ ?> 
            <nav>
                <ul class="pagination justify-content-center py-3">

                    <!-- Prev Button -->
                    <li class="pagination-item <?= ($allpostpagn <= 1) ? 'disabled' : '' ?>">
                        <a class="pagination-link " href="index.php?page=<?=$crnt_page?>&pagination=<?= ($allpostpagn <= 1) ? 1 : $allpostpagn - 1 ?>" >Prev</a>
                    </li>

                    <!-- pagination Numbers -->
                    <?php for($i = 1; $i <= $totalpgn; $i++): ?>
                        <li class="pagination-item <?= ($allpostpagn == $i) ? 'active' : '' ?>">
                            <a class="pagination-link" href="index.php?page=<?=$crnt_page?>&pagination=<?= $i ?>">
                                <?= $i ?>
                            </a>
                        </li>
                    <?php endfor; ?>

                    <!-- Next Button -->
                    <li class="pagination-item <?= ($allpostpagn >= $totalpgn) ? 'disabled' : '' ?>">
                        <a class="pagination-link" href="index.php?page=<?=$crnt_page?>&pagination=<?= ($allpostpagn >= $totalpgn) ? $totalpgn: $allpostpagn + 1 ?>">Next</a>
                    </li>

                </ul>
            </nav>
            <?php } else{ ?> 
                        <div class="d-flex align-item-center justify-content-between my-2">
                            <h3 class="text-capitalize " style="color:#1e3c72">Apply for your desire position</h3>
                            <a href="index.php?page=dashboard" class="btn btn-success px-4 text-capitalize">See all <i class="fa fa-arrow-right me-2   text-light"></i> </a>
                        </div>
            <?php } ?>
        <div class="jobs">
            
            <div class="row">
                
            <?php foreach($jobCirculresult as $Circular) {?>
                        <div class="col-md-3 my-2 searchcard">
                            <div class="card job-card h-100 border">
                                <div class="card-body">
                                    <?php
                                            $Circularcondition = " WHERE id = ". $Circular['company_id'] ;
                                            
                                            $circompanies = $alljob->getSingleData('companies',' * ', $Circularcondition ); 
                                            
                                            ?>
                                    <div class="d-flex align-items-center mb-3">
                                        <img src="uploads/organisations/<?= $circompanies->logo ?>" class="company-logo me-3">

                                        <div>
                                            <h5 class="mb-0"><?= $circompanies->company_name ?></h5>
                                            <small class="text-muted"><?= $Circular['circular_reference'] ?></small>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <span class="badge"><?php if(isset($Circular['circular_doc'])){ echo '<a href="uploads/circulars/'.$Circular['circular_doc'].'" target="_blank" class="mb-1 btn btn-primary btn-sm">
                                            See Circular Details
                                        </a>';}else{ echo "not uploaded";} ?></span>
                                    </div>

                                    <div class="d-flex justify-content-between">
                                        <span><small class="fw-bold">published:</small><?= date(" d F Y", strtotime($Circular['published_date'])); ?></span>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <span class="text-danger"><small class="fw-bold">Last date to Apply:</small><?= date(" d F Y h:m A", strtotime($Circular['apply_last_date'])); ?></span>
                                    </div>

                                </div>

                                <div class="card-footer bg-white border-0">
                                    <a href="index.php?page=jobspercircular&circular=<?= $Circular['id']?>&<?=uniqid()?>" class="btn btn-primary w-100">
                                        Apply Now
                                    </a>
                                </div>
                            </div>
                        </div>
            <?php } ?>
            </div>
                
        </div>
    </div>
    <div id="Allpost_section">
        <?php if(!empty($_GET['page']) && $_GET['page'] != 'home'){ ?> 
            <nav>
                <ul class="pagination justify-content-center py-3">

                    <!-- Prev Button -->
                    <li class="pagination-item <?= ($allpostpagn <= 1) ? 'disabled' : '' ?>">
                        <a class="pagination-link " href="index.php?page=<?=$crnt_page?>&pagination=<?= ($allpostpagn <= 1) ? 1 : $allpostpagn - 1 ?>" >Prev</a>
                    </li>

                    <!-- pagination Numbers -->
                    <?php for($i = 1; $i <= $totalpgn; $i++): ?>
                        <li class="pagination-item <?= ($allpostpagn == $i) ? 'active' : '' ?>">
                            <a class="pagination-link" href="index.php?page=<?=$crnt_page?>&pagination=<?= $i ?>">
                                <?= $i ?>
                            </a>
                        </li>
                    <?php endfor; ?>

                    <!-- Next Button -->
                    <li class="pagination-item <?= ($allpostpagn >= $totalpgn) ? 'disabled' : '' ?>">
                        <a class="pagination-link" href="index.php?page=<?=$crnt_page?>&pagination=<?= ($allpostpagn >= $totalpgn) ? $totalpgn: $allpostpagn + 1 ?>">Next</a>
                    </li>

                </ul>
            </nav>
            <?php } else{ ?> 
                        <div class="d-flex align-item-center justify-content-between my-2">
                            <h3 class="text-capitalize " style="color:#1e3c72">Apply for your desire position</h3>
                            <a href="index.php?page=dashboard" class="btn btn-success px-4 text-capitalize">See all <i class="fa fa-arrow-right me-2   text-light"></i> </a>
                        </div>
            <?php } ?>
        <div class="jobs">
            
            <div class="row">
                
            <?php foreach($jobpostresult as $job) {?>
                        <div class="col-md-3 my-2 searchcard">
                            <div class="card job-card h-100 border">
                                <div class="card-body">
                                    <?php
                                            $condition = " WHERE id = ". $job['company_id'] ;
                                            
                                            $companies = $alljob->getSingleData('companies',' * ', $condition ); 
                                            
                                            ?>
                                    <div class="d-flex align-items-center mb-3">
                                        <img src="uploads/organisations/<?= $companies->logo ?>" class="company-logo me-3">

                                        <div>
                                            <h5 class="mb-0"><?= $job['title'] ?></h5>
                                            <small class="text-muted"><?= $companies->company_name ?></small>
                                        </div>
                                    </div>

                                    <p>
                                    <?= substr($job['description'],0,50)?>............
                                    </p>

                                    <div class="mb-3">
                                        <span class="badge bg-danger"><?= $job['emp_status'] ?></span>
                                        <span class="badge bg-success"><?= $job['emp_work_place'] ?></span>
                                    </div>

                                    <div class="d-flex justify-content-between">
                                        <span>
                                            <i class="fa-solid fa-location-dot"></i> <?= $job['location'] ?>
                                        </span>

                                        <span class="fw-bold text-primary">
                                            ৳<?= $job['salary'] ?>
                                        </span>
                                    </div>

                                </div>

                                <div class="card-footer bg-white border-0">
                                    <a href="index.php?page=jobdetails&job_id=<?= $job['id']?>" class="btn btn-primary w-100">
                                        Apply Now
                                    </a>
                                </div>
                            </div>
                        </div>
            <?php } ?>
            </div>
                
        </div>
    </div>
    