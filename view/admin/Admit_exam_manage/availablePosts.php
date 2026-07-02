<?php
    require_once 'database/database.php';

    $availableposts = new datamodel();
    $today = new DateTime();
    $circular_id = $_GET['circular'];
    $circular_ref = $_GET['ref'];
    $examPosts = $availableposts->getData('exams', ' * ', ' WHERE circular_id='.$circular_id );

?>


<!doctype html>
<html class="no-js" lang="en">

<?php require "layouts/head.php" ?>
<style>
    .top-content {
        background: linear-gradient(135deg, #0d6efd, #0dcaf0);
        color: #fff;
        padding: 30px 20px;
        border-radius: 12px;
        box-shadow: 0 6px 15px rgba(0,0,0,0.1);
        margin-bottom: 25px;
    }

    .top-content h2 {
        font-weight: 700;
        margin-bottom: 10px;
    }

    .top-content p {
        margin: 5px 0;
        font-size: 16px;
    }

    .top-content a {
        color: #fff;
        text-decoration: none;
        font-weight: 500;
        border-bottom: 1px solid rgba(255,255,255,0.6);
        transition: 0.3s;
    }

    .top-content a:hover {
        color: #ffe082;
        border-bottom: 1px solid #ffe082;
    }

    .top-content .date-badge {
        display: inline-block;
        background: rgba(255,255,255,0.2);
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 14px;
        margin-bottom: 10px;
    }
   
</style>
<body>
	<div class="wrapper p-2">	
        <div class="row">
        <?php require "layouts/sidemenu.php" ?>
        <div class="col-md-10">
            <div class="content  container">
                <div class="top-content text-center">
                    <h2>📋 List of Uploaded Jobs</h2>
                    
                    <div class="date-badge">
                        <?= date("F Y"); ?>
                    </div>

                    <p>
                        🌐 <a href="https://www.teletalk.com" target="_blank">
                            www.teletalk.com
                        </a>
                    </p>
                    <?php if( isset($_GET['message'])){ echo "<p class='alert alert-warning text-danger' >". $_GET['message'] ." </p>";} ?>
                </div>
                <section> 
                    <div class="container mt-4">
                        <div class="card shadow">
                            
                            <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                                <h4 class="mb-0">Job Circulars</h4>
                                
                                <div class="rowfilter d-flex">
                                        <label for="" class="px-2 text-center">Number of Rows</label>
                                        <select class="form-select w-auto" id="totalrow">
                                        <option value="10">10</option>
                                        <option value="15">15</option>
                                        <option value="20">20</option>
                                        <option value="25">25</option>
                                        <option value="30">30</option>
                                        <option value="35">35</option>
                                        <option value="40">40</option>
                                        <option value="50">50</option>
                                        </select>
                                    </div>
                            </div>
                            <div class="pagination_div my-2 d-flex justify-content-center align-item-center">
                                    <div class="d-flex pagination">
                                        <button id="prevbtn" class="btn btn-warning">previous</button>
                                        <div id="DatapaginationID"></div>
                                        <button id="nxtbtn" class="btn btn-warning" >next</button>
                                    </div>
                            </div>
                            <div class="card-body">
                                <!-- filter row -->
                                 <div class="row mb-3 align-items-center">
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" placeholder="Search Circulars ,date" id="searchFilter">
                                    </div>
                                </div>
                                <!-- Header Row -->
                                <table class="table searchtableData table-bordered table-hover align-middle text-center" id="DataTable">
                                    <thead >
                                        <tr>
                                            <th>Exam Posts</th>
                                            <th>Exam Type</th>
                                            <th>Exam Date</th>
                                            <th>Start Time</th>
                                            <th>End Time</th>
                                            <th>Duration</th>
                                            <th>status</th>
                                            <th >Actions</th>
                                        </tr>
                                    </thead>
                                <tbody>

                                
                                <?php
                                if(isset($examPosts )){ foreach($examPosts  as $examPosts ){
                                ?>
                                <tr>
                                    <td><?=$examPosts ['exam_posts_title']?></td>
                                    <td><?=$examPosts ['exam_type']?></td>
                                    <td class="<?= $examPosts ['status'] == 'cancelled' ? 'text-danger' : '' ?>" ><?=$examPosts ['status']?></td>
                                    
                                    <td><?= date(" d F Y", strtotime($examPosts ['exam_date'])); ?></td>
                                    <td><?= $examPosts ['start_time'] ? date("h:i:s A", strtotime($examPosts ['start_time'])): 'null' ?></td>
                                    <td>
                                        <?= $examPosts ['end_time'] ? date(" h:i:s A", strtotime($examPosts ['end_time'])): 'null' ?>
                                    </td>
                                    <td><?=$examPosts ['duration']?></td>

                                    <td>
                                        
                                        
                                        <a href="index.php?page=setExmCenter&circular=<?= $examPosts['id']?>&<?=uniqid()?>&<?=uniqid()?>&ref=" class="btn btn-sm btn-success mb-1 text-uppercase">set Exam Centers</a>
                                        
                                    </td>
                                </tr>
                                <?php } } ?>
                                </tbody>
                                </table>
                            </div>
                        </div>
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


