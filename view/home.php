
<!doctype html>
<html class="no-js" lang="en">

<?php require "layouts/head.php" ?>

<body>
	<div class="wrapper">
		<?php require "layouts/navbar.php" ?>
		<div class="container">
			<div class="search_area">
				<form action="">
					<?php require "layouts/searcharea.php" ?>
				</form>
			</div>
			<div class="home-content-wrapper">
				<?php if(!empty($_GET['search'])){
					require_once 'view/searchpost.php'; 
				}else{?>
				<div class="banner">
					<div class="banner-left w-50">
						<h1 class=" fw-bold text-capitalize pt-5">JobSolution by Teletalk</h1>
						<h3 class="fs-3 fw-bold text-capitalize pb-5">Empowering Futures Through Opportunity</h3>
						<p class="fs-6 fw-light ">JobSolution by Teletalk – Bridging Aspirations with Excellence represents a dynamic platform designed to connect job seekers with meaningful career opportunities across the country. It empowers individuals to turn their ambitions into reality by providing reliable, up-to-date job information and a seamless application experience.</p>
						<div class="joblink-box mt-5">
							<a href="index.php?search=gov" class="gov-job p-3 text-capitalize ">goverment job</a>
							<a href="index.php?search=non_gov" class="priv-job p-3 text-capitalize">private job</a>
						</div>
					</div>
					<div class="banner-right w-50">
						<img src="assets/img/banner.png" alt="">
					</div>
				</div>
				<div class="job-post">
					<?php require_once 'view/allpost.php' ?>
				</div>
				<?php } ?>
			</div>
            
		</div>
		<section class="py-5 bg-light">
			<div class="container text-center">

				<h3 class="fw-bold mb-5">How It Works</h3>

				<div class="row g-4">

				<div class="col-md-4">
					<div class="card border-0 shadow-sm p-4 h-100">
					<i class="fa fa-user-plus fa-2x text-info mb-3"></i>
					<h5>Create Account</h5>
					<p class="text-muted">Sign up and complete your profile to get started.</p>
					</div>
				</div>

				<div class="col-md-4">
					<div class="card border-0 shadow-sm p-4 h-100">
					<i class="fa fa-search fa-2x text-info mb-3"></i>
					<h5>Search Jobs</h5>
					<p class="text-muted">Browse jobs based on your skills and preferences.</p>
					</div>
				</div>

				<div class="col-md-4">
					<div class="card border-0 shadow-sm p-4 h-100">
					<i class="fa fa-paper-plane fa-2x text-info mb-3"></i>
					<h5>Apply Easily</h5>
					<p class="text-muted">Submit your application and track your progress.</p>
					</div>
				</div>

				</div>

			</div>
		</section>
		<section class="py-5 bg-light">
			<div class="container text-center">

				<h3 class="mb-4 fw-bold">Our Achievements</h3>

				<div class="row">

				<div class="col-md-3 col-6 mb-4">
					<h2 class="text-info fw-bold">1200+</h2>
					<p class="text-muted">Jobs Posted</p>
				</div>

				<div class="col-md-3 col-6 mb-4">
					<h2 class="text-info fw-bold">800+</h2>
					<p class="text-muted">Companies</p>
				</div>

				<div class="col-md-3 col-6 mb-4">
					<h2 class="text-info fw-bold">5000+</h2>
					<p class="text-muted">Applicants</p>
				</div>

				<div class="col-md-3 col-6 mb-4">
					<h2 class="text-info fw-bold">300+</h2>
					<p class="text-muted">Hired</p>
				</div>

				</div>

			</div>
		</section>
		
		<section class="py-5">
			<div class="container">

				<h3 class="text-center fw-bold mb-5">Featured Companies</h3>

				<div class="row g-4">

				<div class="col-md-3 col-6">
					<div class="card shadow-sm border-0 text-center p-3">
					<img src="assets/img/bang-gov-logo.png" class="img-fluid mx-auto" style="height:80px;">
					<p class="mt-2 mb-0">Government Org</p>
					</div>
				</div>

				<div class="col-md-3 col-6">
					<div class="card shadow-sm border-0 text-center p-3">
					<img src="assets/img/bang-gov-logo.png" class="img-fluid mx-auto" style="height:80px;">
					<p class="mt-2 mb-0">Tech Company</p>
					</div>
				</div>

				<div class="col-md-3 col-6">
					<div class="card shadow-sm border-0 text-center p-3">
					<img src="assets/img/bang-gov-logo.png" class="img-fluid mx-auto" style="height:80px;">
					<p class="mt-2 mb-0">Bank Sector</p>
					</div>
				</div>

				<div class="col-md-3 col-6">
					<div class="card shadow-sm border-0 text-center p-3">
					<img src="assets/img/bang-gov-logo.png" class="img-fluid mx-auto" style="height:80px;">
					<p class="mt-2 mb-0">Private Firm</p>
					</div>
				</div>

				</div>

			</div>
		</section>
		<?php require "layouts/footer.php" ?>

		
    </div>
	
	<!--==================================================================-->
	<?php require "layouts/scripts.php" ?>
	
</body>

</html>