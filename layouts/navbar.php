<style>
  .navbar-nav li{
     
      margin: 0px 5px;
      border: 2px solid #fff;
      border-radius: 20px;
  }
  .navbar-nav li a{
     color: #fff;
     font-weight: 400;
      
  }
</style>

<nav class="navbar navbar-expand-lg shadow-sm sticky-top" style="background: linear-gradient(135deg, #1e3c72, #2a5298, #ff7e00); " >
  <div class="container" >
    
    <a class="navbar-brand" href="#">
      <img src="assets/img/whitelogo.png" height="50">
    </a>

    <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navBar">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-end" id="navBar">
      <ul class="navbar-nav">

        <li class="nav-item">
          <a class="nav-link" href="index.php">Home</a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="">Search Job</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="index.php?search=gov">government</a></li>
            <li><a class="dropdown-item" href="index.php?search=non_gov">non government</a></li>
          </ul>
        </li>

        <li class="nav-item dropdown" >
			<a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href=""><?php if(isset($_SESSION['email'])){
							print($_SESSION['name']);
						}else{
							echo "user name";
						} ?></a>
          <ul class="dropdown-menu ">
			<?php if(isset($_SESSION['email'])){ ?>
            <li><a class="dropdown-item" href="index.php?page=dashboard">Dashboard</a></li>
            <li><a class="dropdown-item" href="index.php?page=logout">logout</a></li>
			<?php }else{ ?>
			<li><a class="dropdown-item"  href="index.php?page=login">login</a></li>
            <li><a class="dropdown-item" href="index.php?page=register">register</a></li>
			<?php	} ?>
          </ul>
        </li>

      </ul>
    </div>

  </div>
</nav>
