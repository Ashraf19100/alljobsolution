<!doctype html>
<html class="no-js" lang="en">
<?php require "layouts/head.php" ?>

<body>
	<div class="wrapper">
        <?php require "layouts/navbar.php" ?>
        <div class="login_form">
            <div class="login_card">
                <div class="login_card_top">
                    <img src="assets/img/logo.png" alt="">
                </div>
                <div class="card_from">
                    <h3>Register</h3>
                    <form action="index.php?page=register-submit" method="POST">
                        <div class="name">
                            <label for="name">
                                Full Name
                            </label>
                            <input type="text" name="name" placeholder="Name" required>
                        </div>
                        <div class="email">
                            <label for="email">
                                Email
                            </label>
                            <input type="email" name="email" placeholder="Email" required>
                        </div><div class="password">
                            <label for="password">
                                Password
                            </label>
                            <input type="password" name="password" placeholder="Password" required>
                        </div>
                        
                        <div class="role">
                            <label for="role">User Type</label>
                            <select name="role">
                            <option value="job_seeker">Job Seeker</option>
                            <option value="employer">Employer</option>
                        </select>
                        </div>

                        

                        <button type="submit" class="btn btn-primary">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
	
	<!--==================================================================-->
	<?php require "layouts/scripts.php" ?>
</body>

</html>

