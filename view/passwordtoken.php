<!doctype html>
<html class="no-js" lang="en">

<?php require "layouts/head.php" ?>

<body>
	<div class="wrapper">
		<?php require "layouts/navbar.php" ?>
        <div class="login_form d-flex justify-content-center align-items-center" style="min-height:100vh; background:#f5f7fb;">

        <div class="login_card mt-3 shadow-lg  rounded-4" style="width:480px; background:#fff;">
            
            <?php if(isset($_GET['message'])){ 
            echo  '<div class="alert alert-danger text-center p-2">'.$_GET['message'].'</div>';
            } ?>

            <div class="login_card_top text-center mb-3">
                <img src="assets/img/logo.png" alt="" style="width:80px;">
            </div>

            <div class="card_from">
                <h3 class="text-center mb-3">Reset Your Password</h3>


                <form action="index.php?page=pass-token" method="post" id="resetPassForm">
                    <small class="text-danger text-center" id="resetemailerror"></small>
                    <div class="username mb-3 d-flex">
                        <label for="email" class="text-capitalize">User email</label>
                        <input type="text" name="email" id="email" class="w-100 form-control resetemailerror" placeholder="Enter your email"> 
                    </div>
                    

                    <button type="submit" class="btn btn-primary w-100">Submit</button>
                </form>

            </div>
        </div>
    </div>
  
    </div>
	<?php require "layouts/footer.php" ?>
	
	<!--==================================================================-->
	<?php require "layouts/scripts.php" ?>
</body>

</html>
