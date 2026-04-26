<!doctype html>
<html class="no-js" lang="en">
<?php require "layouts/head.php" ?>

<body>
	<div class="wrapper">
        <?php require "layouts/navbar.php" ?>
        <div class="login_form d-flex justify-content-center align-items-center" style="min-height:100vh; background:#f5f7fb;">
    
            <div class="login_card shadow-lg p-4 rounded-4" style="width:380px; background:#fff;">
                
                <div class="login_card_top text-center mb-3">
                    <img src="assets/img/logo.png" alt="" style="width:80px;">
                </div>

                <div class="card_from">
                    <h3 class="text-center mb-3">Create Account</h3>

                    <!-- Social Register Buttons -->
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

                    <form action="index.php?page=register-submit" method="POST">
                        
                        <div class="name mb-3 d-flex">
                            <label for="name">Full Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter your full name" required>
                        </div>

                        <div class="email mb-3 d-flex">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
                        </div>

                        <div class="password mb-3 d-flex">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Create a password" required>
                        </div>
                        
                        <div class="role mb-3 d-flex">
                            <label for="role">User Type</label>
                            <select name="role" class="form-select">
                                <option value="job_seeker">Job Seeker</option>
                                <option value="employer">Employer</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Register</button>
                    </form>

                    <!-- Extra Options -->
                    <div class="text-center mt-3">
                        <span>Already have an account?</span>
                        <a href="index.php?page=login" class="text-decoration-none fw-bold">Login</a>
                    </div>

                </div>
            </div>
        </div>

    </div>
	
	<!--==================================================================-->
	<?php require "layouts/scripts.php" ?>
</body>

</html>

