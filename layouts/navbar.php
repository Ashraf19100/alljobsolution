<?php 
	session_start();

?>

<div class=" navbar d-flex align-item-center justify-content-between">
			<div class="logo-job">
				<img src="assets/img/logo.png" alt="">
			</div>
			<div class="nav-item d-flex align-item-center justify-content-center">
				<ul class="d-flex align-item-center justify-content-between">
					<li class="px-2"><a href="index.php?page=home">Home</a></li>                                      
					<li class="px-2"><a href="">search job</a></li>
					<li class="px-2 nav-list" >
						<a href=""><?php if($_SESSION['email']){
							print($_SESSION['name']);
						}else{
							echo "user name";
						} ?></a>
						<ul class="sub-nav">
							<?php if($_SESSION['email']){ ?>
							<li class="px-2"><a href="index.php?page=dashboard">Dashboard</a></li>                       
							<li class="px-2"><a href="index.php?page=logout">logout</a></li>                       

						<?php }else{ ?>
									
						<li class="px-2"><a href="index.php?page=login">login</a></li>                       
							<li class="px-2"><a href="index.php?page=register">register</a></li> 
						
						<?php	} ?>
							
						</ul>
					</li>               
					
				</ul>
			</div> 
		</div>