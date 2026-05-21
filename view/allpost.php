<?php
require_once 'database/database.php';
$allpostlimit=8;
    $allpostpagn = isset($_GET['pagination']) ? (int)$_GET['pagination'] : 1;
    $allpostoffset = ($allpostpagn - 1)*$allpostlimit;
$alljob = new datamodel();

    $totalpost = $alljob->getData('jobs',' COUNT(*) as total ');
    $postRows = $totalpost[0]['total'];
    $totalpgn= ceil( $postRows / $allpostlimit);
$result = $alljob->getData('jobs',' * ', '', $allpostlimit, $allpostoffset);
$crnt_page= isset($_GET['page']) ?  $_GET['page'] : '' ;




?>
<div class="job-head">
        <h1 class="text-center text-capitalize  py-1 mb-4 fw-bold " style="color:#1e3c72">All Jobs</h1>
    </div>
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
    <?php foreach($result as $job) {?>
                <div class="col-md-3 my-2">
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