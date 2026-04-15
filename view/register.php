<!doctype html>
<html class="no-js" lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1.0" />
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>job solution</title>
	<meta name="description" content="">
	<link rel="shortcut icon" href="../assets//img/logos/Electro_logo-only-logo_New1.png" type="image/x-icon" />
	<!--=== Reset Css ===-->
	<link rel="stylesheet" href="../assets//css/normalize.css">
	<!--=== Animate ===-->
	<link rel="stylesheet" href="../assets//css/plugin/animate.css">
	<!--=== Hover Animation ===-->
	<link rel="stylesheet" href="../assets//css/plugin/hover-min.css">
	<!-- Icofont -->
	<link rel="stylesheet" href="../assets//icofont/icofont.min.css">
	<!--=== Bootstrap ===-->
	<!--<link rel="stylesheet" href="../assets//css/bootstrap.min.css">-->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<!--=== Fontawesome icon ===-->
	<link rel="stylesheet" href="../assets//css/font-awesome.min.css">
	<!-- ================= *** Icofont CSS *** ================== -->
	<link href="../assets//css/icofont.css" rel="stylesheet" type="text/css">
	<!-- ================= *** Meanmenu CSS *** ===================== -->
	<link href="../assets//css/meanmenu.css" rel="stylesheet" type="text/css">
	<!-- ================= *** AOS CSS *** ===================== -->
	<link href="../assets//css/plugin/aos.css" rel="stylesheet">
	<!--=== Owl carousel ===-->
	<link rel="stylesheet" href="../assets//css/plugin/owl.carousel.min.css">
	<!--=== Magnific PopUp ===-->
	<link rel="stylesheet" href="../assets//css/plugin/magnific-popup.css">
	<!-- ================= *** Common CSS *** ========================== -->
	<link href="../assets//css/common.css" rel="stylesheet" type="text/css">
	<!--=== Main Css ===-->
	<link rel="stylesheet" href="../assets//css/style.css" type="text/css">
	<!-- Google Lato Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700;900&display=swap" rel="stylesheet">
	<!--=== Responsive Css ===-->
	<link rel="stylesheet" href="../assets//css/responsive.css">
	<script src="../assets//js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
	<div class="wrapper">
        <div class="navbar d-flex align-item-center justify-content-between">
            <div class="logo-job">
                <img src="../assets/img/logo.png" alt="">
            </div>
            <div class="nav-item d-flex align-item-center justify-content-center">
                <ul class="d-flex align-item-center justify-content-between">
                    <li class="px-2"><a href="">Home</a></li>                                      
                    <li class="px-2"><a href="">personal information</a></li>                        
                    <li class="px-2"><a href="">My Resume</a></li>                              
                    <li class="px-2"><a href="jobs/index.php">search job</a></li>
                    <li class="px-2 nav-list" >
                        <a href="">user name ^</a>
                        <ul class="sub-nav">
                            <li class="px-2"><a href="/login.php">login</a></li>                       
                            <li class="px-2"><a href="/register.php">register</a></li> 
                        </ul>
                    </li>               
                    
                </ul>
            </div> 
        </div>
        <div class="login_form">
            <div class="login_card">
                <div class="login_card_top">
                    <img src="../assets/img/logo.png" alt="">
                </div>
                <div class="card_from">
                    <h3>Register</h3>
                    <form action="../actions/registerController.php" method="POST">
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
	<script>
		var preload= document.getElementById('preloader');
		function preloader(){
			preload.style.display='none';
		}
	</script>
	<script type="text/javascript" src="../assets//js/jquery-3.2.0.min.js"></script>
	<script>
		window.jQuery || document.write('<script src="../assets//js/vendor/jquery-1.12.0.min.js"><\/script>')
	</script>
	<!--=== All Plugin ===-->
	<script type="text/javascript" src="../assets//js/popper.min.js"></script>
	<script type="text/javascript" src="../assets//js/bootstrap.min.js"></script>

	<!-- Counter Up ======================= -->
	<script src="../assets//js/plugin/counterup/counterup.min.js"></script>
	<script src="../assets//js/plugin/waypoints/jquery.waypoints.min.js"></script>

	<!--Isotope-->
	<script src="../assets//js/plugin/iso_top/isotopev3.0.6.pkgd.min.js"></script>

	<!-- ================= Meanmenu min Js =========== -->
	<script src="../assets//js/jquery.meanmenu.js"></script>
	<script type="text/javascript" src="../assets//js/plugin/wow.min.js"></script>
	<script type="text/javascript" src="../assets//js/plugin/owl.carousel.min.js"></script>
	<script type="text/javascript" src="../assets//js/plugin/jquery.magnific-popup.min.js"></script>
	<!-- ================= AOS Js =========== -->
	<script src="../assets//js/plugin/aos.js"></script>
	<!-- Sticky JS -->
	<script src="../assets//js/plugin/jquery.sticky.js"></script>
	<!--=== All Active ===-->
	<script type="text/javascript" src="../assets//js/main.js"></script>

	<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
	<script>
		(function (b, o, i, l, e, r) {
			b.GoogleAnalyticsObject = l;
			b[l] || (b[l] =
				function () {
					(b[l].q = b[l].q || []).push(arguments)
				});
			b[l].l = +new Date;
			e = o.createElement(i);
			r = o.getElementsByTagName(i)[0];
			e.src = 'https://www.google-analytics.com/analytics.js';
			r.parentNode.insertBefore(e, r)
		}(window, document, 'script', 'ga'));
		ga('create', 'UA-XXXXX-X', 'auto');
		ga('send', 'pageview');
	</script>
</body>

</html>

