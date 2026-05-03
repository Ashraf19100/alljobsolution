
<!doctype html>
<html class="no-js" lang="en">

<?php require "layouts/head.php" ?>

<body>
	<div class="wrapper">
		<?php require "layouts/navbar.php" ?>
		<div class="">
			<div class="container search_area">
				
					<?php require "layouts/searcharea.php" ?>
				
			</div>
			
			<div class="home-content-wrapper">
				<?php if(!empty($_GET['search'])){
					require_once 'view/searchpost.php'; 
				}else{?>
				
				<section class="" style="background: linear-gradient(105deg, #c1c5cd, #fff, #fff);">
					<div class="banner container ">
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
				</section>
				<section class="py-5" style="background: linear-gradient(135deg, #ff7e00, #2a5298, #ff7e00);">
					<div class="container">

						<!-- Header -->
						<div class="text-center text-white mb-5">
							<h2 class="fw-bold">Explore Job Categories</h2>
							<p class="mx-auto" style="max-width:600px;">
								Discover opportunities across multiple industries. Choose your field and take the next step toward your dream career with JobSolution.
							</p>
						</div>

						<!-- Categories -->
						<div class="row g-4">

							<!-- Category Card -->
							<div class="col-md-3 col-sm-6">
								<div class="card shadow border-0 text-center p-4 h-100">
									<i class="fas fa-laptop-code fa-2x text-primary mb-3"></i>
									<h6>IT & Software</h6>
								</div>
							</div>

							<div class="col-md-3 col-sm-6">
								<div class="card shadow border-0 text-center p-4 h-100">
									<i class="fas fa-briefcase fa-2x text-warning mb-3"></i>
									<h6>Banking & Finance</h6>
								</div>
							</div>

							<div class="col-md-3 col-sm-6">
								<div class="card shadow border-0 text-center p-4 h-100">
									<i class="fas fa-user-graduate fa-2x text-info mb-3"></i>
									<h6>Education & Training</h6>
								</div>
							</div>

							<div class="col-md-3 col-sm-6">
								<div class="card shadow border-0 text-center p-4 h-100">
									<i class="fas fa-heartbeat fa-2x text-danger mb-3"></i>
									<h6>Healthcare</h6>
								</div>
							</div>

							<div class="col-md-3 col-sm-6">
								<div class="card shadow border-0 text-center p-4 h-100">
									<i class="fas fa-building fa-2x text-secondary mb-3"></i>
									<h6>Government Jobs</h6>
								</div>
							</div>

							<div class="col-md-3 col-sm-6">
								<div class="card shadow border-0 text-center p-4 h-100">
									<i class="fas fa-bullhorn fa-2x text-warning mb-3"></i>
									<h6>Marketing & Sales</h6>
								</div>
							</div>

							<div class="col-md-3 col-sm-6">
								<div class="card shadow border-0 text-center p-4 h-100">
									<i class="fas fa-cogs fa-2x text-primary mb-3"></i>
									<h6>Engineering</h6>
								</div>
							</div>

							<div class="col-md-3 col-sm-6">
								<div class="card shadow border-0 text-center p-4 h-100">
									<i class="fas fa-hotel fa-2x text-info mb-3"></i>
									<h6>Hospitality</h6>
								</div>
							</div>

							<div class="col-md-3 col-sm-6">
								<div class="card shadow border-0 text-center p-4 h-100">
									<i class="fas fa-truck fa-2x text-warning mb-3"></i>
									<h6>Logistics</h6>
								</div>
							</div>

							<div class="col-md-3 col-sm-6">
								<div class="card shadow border-0 text-center p-4 h-100">
									<i class="fas fa-chart-line fa-2x text-success mb-3"></i>
									<h6>Business Development</h6>
								</div>
							</div>

							<div class="col-md-3 col-sm-6">
								<div class="card shadow border-0 text-center p-4 h-100">
									<i class="fas fa-paint-brush fa-2x text-danger mb-3"></i>
									<h6>Design & Creative</h6>
								</div>
							</div>

							<div class="col-md-3 col-sm-6">
								<div class="card shadow border-0 text-center p-4 h-100">
									<i class="fas fa-balance-scale fa-2x text-secondary mb-3"></i>
									<h6>Legal</h6>
								</div>
							</div>

							<div class="col-md-3 col-sm-6">
								<div class="card shadow border-0 text-center p-4 h-100">
									<i class="fas fa-user-tie fa-2x text-primary mb-3"></i>
									<h6>Human Resources</h6>
								</div>
							</div>

							<div class="col-md-3 col-sm-6">
								<div class="card shadow border-0 text-center p-4 h-100">
									<i class="fas fa-industry fa-2x text-dark mb-3"></i>
									<h6>Manufacturing</h6>
								</div>
							</div>

							<div class="col-md-3 col-sm-6">
								<div class="card shadow border-0 text-center p-4 h-100">
									<i class="fas fa-globe fa-2x text-info mb-3"></i>
									<h6>NGO & Development</h6>
								</div>
							</div>

						</div>
					</div>
				</section>
				<div class="job-post container">
					<?php require_once 'view/allpost.php' ?>
				</div>
				<?php } ?>
			</div>
            
		</div>
		
		<section class="py-5 " style="background: linear-gradient(105deg, #2a5298, #fff, #2a5298);">
			<div class="container text-center">

				<h3 class="fw-bold mb-5 " style="color:#1e3c72">How It Works</h3>

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
		<section class="py-5 " style="background: linear-gradient(105deg, #fff, #d4d9e0, #fff);">
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