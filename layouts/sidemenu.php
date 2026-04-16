

<div class="col-md-2">
    <div class="logo">
        <img src="assets/img/logo.png" alt="">
    </div>    
    <div class="user_info d-flex bg-light p-1">
        <div class="profile-img w-25">
            <img src="assets/img/profile.jpg" style="" class="img-fluid rounded-circle" alt="">
        </div>
        <div class="user-id">
            <p class="text-info fw-bold"><?php print($_SESSION['name']);  ?></p>
            <p class="text-gray fw-light"><?php print($_SESSION['email']);  ?></p>
        </div>
    </div>
    <div class="side-navbar bg-light">
        <ul>
            <li><a href="index.php?page=home">Home</a></li>
            <li class="nasted-nav"><a href="">User Information</a>
                <ul class="side-subnav">
                    <li><a href="">Perrsonal Inforrmation</a></li>
                    <li><a href="">Education</a></li>
                </ul>
            </li>
            <li><a href="">my resume</a></li>
            <li><a href="">Admit Card</a></li>
            <li><a href="">Notice</a></li>
            <li class="nasted-nav"><a href="">find job</a>
                <ul class="side-subnav">
                    <li><a href="">Government Job</a></li>
                    <li><a href="">Private Job</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>