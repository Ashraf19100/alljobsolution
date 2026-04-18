<!doctype html>
<html class="no-js" lang="en">

<?php require "layouts/head.php" ?>

<body>
	<div class="wrapper">
		<?php require "layouts/navbar.php" ?>
        
        <div class="login_form">

            <div class="login_card">
                <?php if(isset($_GET['message'])){ 
                  echo  '<h3 class="text-danger text-center p-2">'.$_GET['message'].'</h3>';

                 } ?>
                
                <div class="login_card_top">
                    <img src="assets/img/logo.png" alt="">
                </div>
                <div class="card_from">
                    <h3>Login</h3>
                    <form action="index.php?page=login-submit" method = "post">
                        <div class="username">
                            <label for="email" class="text-capitalize">User email</label>
                            <input type="text" name="email" id="email">
                        </div>
                        <div class="password">
                            <label for="password"  class="text-capitalize">Password</label>
                            <input type="password" name="password" id="password">
                        </div>
                        <button type="submit" class="btn btn-primary">login</button>
                    </form>
                </div>
            </div>
        </div>  
    </div>
	
	<!--==================================================================-->
	<?php require "layouts/scripts.php" ?>
</body>

</html>
