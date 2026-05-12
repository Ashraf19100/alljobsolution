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
        <div class="col-md-3 py-2" >
            <div class="card border-2 shadow-sm h-100" style="background: linear-gradient(105deg, #fff, #d4d9e0, #fff);">
                <div class="card-body">
                    <?php
                                    $condition = " WHERE id = ". $job['company_id'] ;
                                    
                                    $companies = $alljob->getSingleData('companies',' * ', $condition ); 
                                    
                                    ?>
                    <div class="d-flex align-items-center mb-3">
                        <img src="uploads/organisations/<?= $companies->logo ?>" width="60" class="me-3">
                        <div>
                        <h6 class="mb-0"><?= $job['title'] ?></h6>
                       
                        <small class="text-muted"><?= $companies->company_name ?></small>
                        
                        </div>
                    </div>

                    <p class="mb-1"><i class="fa fa-map-marker-alt text-info"></i><?= $job['location'] ?></p>
                    <p class="mb-1"><i class="fa fa-briefcase text-info"></i>  <?= $job['emp_status'] ?></p>
                    <p class="text-danger mb-2">Deadline:  <?= $job['deadline'] ?></p>

                    <a href="index.php?page=jobdetails&job_id=<?= $job['id']?>" class="btn w-100 text-white" style="background: linear-gradient(135deg, #8aa6da, #ff7e00, #ff7e00); ">View Details</a>

                </div>
            </div>
        
        </div>
    <?php } ?>
    </div>
        
</div>