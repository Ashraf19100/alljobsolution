<!doctype html>
<html class="no-js" lang="en">

<?php require "layouts/head.php" ?>

<body>
	<div class="wrapper">
		<?php require "layouts/navbar.php" ?>
        <div class="login_form d-flex justify-content-center align-items-center" style="min-height:100vh; background:#f5f7fb;">

        <div class="login_card mt-3 shadow-lg  rounded-4" style="width:350px; background:#fff;">
            
            <?php if(isset($_GET['message'])){ 
            echo  '<h3 class="text-danger text-center p-2">'.$_GET['message'].'</h3>';
            } ?>

            <div class="login_card_top text-center mb-3">
                <img src="assets/img/logo.png" alt="" style="width:80px;">
            </div>

            <div class="card_from">
                <h3 class="text-center mb-3">Login</h3>

                <!-- Social Login Buttons -->
                <div class="mb-3">
                    <button type="button" class="btn w-100 mb-2 d-flex align-items-center justify-content-center" style="border:1px solid #ddd;">
                        <img src="https://img.icons8.com/color/20/google-logo.png" class="me-2">
                        Continue with Google
                    </button>

                    <button type="button" class="btn w-100 d-flex align-items-center justify-content-center" style="background:#1877f2; color:#fff;">
                        <i class="bi bi-facebook me-2"></i>
                        Continue with Facebook
                    </button>
                </div>

                <div class="text-center my-2 text-muted">or</div>

                <form action="index.php?page=login-submit" method="post">
                    
                    <div class="username mb-3 d-flex">
                        <label for="email" class="text-capitalize">User email</label>
                        <input type="text" name="email" id="email" class="form-control" placeholder="Enter your email">
                    </div>

                    <div class="password mb-3 d-flex">
                        <label for="password" class="text-capitalize">Password</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password">
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Login</button>
                </form>

                <!-- Extra Options -->
                <div class="text-center mt-3">
                    <a href="#" class="text-decoration-none">Forgot Password?</a>
                </div>

                <div class="text-center mt-2">
                    <span>Don't have an account?</span>
                    <a href="index.php?page=register" class="text-decoration-none fw-bold">Register</a>
                </div>

            </div>
        </div>
    </div>
  
    </div>
	<?php require "layouts/footer.php" ?>
	
	<!--==================================================================-->
	<?php require "layouts/scripts.php" ?>
</body>

</html>
