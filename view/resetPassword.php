<?php
require_once 'database/database.php';

$retypepass = new datamodel();

if($_GET['token']){

    $userreset = $retypepass->getSingleData('users', '*', " WHERE pass_reset_token = '".$_GET['token']."'");
    if(!$userreset){
        header("Location: ../alljobsolution/index.php?page=login&message=Sorry the link is expired");
        exit;  
    }


}


?>
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
                <h3 class="text-center mb-3">Reset New Password</h3>


                <form action="index.php?page=newpassset" method="post" id="updatePassForm">
                    <input type="hidden" name="id" value="<?=$userreset->id ?? ''?>">
                    <small id="passErr"></small>
                    <div class="newpasswod mb-3 d-flex">
                        <label for="password" class="w-25 text-capitalize ">New Password</label>
                        <input type="password" name="password" id="password" class="w-75 form-control passErr" placeholder="Enter your new Password">
                    </div>
                    <small id="passmatchErr"></small>
                    <div class="newpasswod mb-3 d-flex">
                        <label for="confirm_password" class="w-25 text-capitalize">Confirm Password</label>
                        <input type="password" name="confirm_password" id="confirm_password" class="w-75 form-control passmatchErr" placeholder="Retype your new password">
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Confirm</button>
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
