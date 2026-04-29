
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Classy CV</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
    body {
        background: #e9ecef;
        font-family: 'Segoe UI', sans-serif;
    }

    .cv-container {
        max-width: 800px;
        margin: 30px auto;
        background: #fff;
        box-shadow: 0 0 15px rgba(0,0,0,0.1);
        display: flex;
    }

    /* LEFT SIDE */
    .left {
        width: 35%;
        background: #1f3c88;
        color: #fff;
        padding: 25px;
        text-align: center;
    }

    .left img {
        width: 130px;
        height: 130px;
        border-radius: 50%;
        border: 4px solid #fff;
        object-fit: cover;
        margin-bottom: 15px;
    }

    .left h4 {
        border-bottom: 1px solid rgba(255,255,255,0.4);
        padding-bottom: 5px;
        margin-top: 20px;
    }

    .left p, .left li {
        font-size: 14px;
        margin: 5px 0;
    }

    /* RIGHT SIDE */
    .right {
        width: 65%;
        padding: 30px;
    }

    .name {
        color: #1f3c88;
        font-weight: bold;
    }

    .section-title {
        color: #1f3c88;
        border-bottom: 2px solid #1f3c88;
        margin-top: 20px;
        margin-bottom: 10px;
        font-weight: 600;
    }

    .job-title {
        font-weight: bold;
    }

    .small-text {
        color: #777;
        font-size: 13px;
    }
</style>
</head>

<body>

<div class="cv-container">

    <!-- LEFT SIDE -->
    <div class="left">
        <img src='<?= $_SERVER['DOCUMENT_ROOT']."/alljobsolution/uploads/img/"  . $_SESSION['profile_image'] ?>' alt="Profile Photo">

        <h3><?=$_SESSION['name']?></h3>
        <p><?=$_SERVER['DOCUMENT_ROOT']?></p>
        <h4>Contact</h4>
        <p>Email: <?=$_SESSION['email']?></p>
        <p>Phone: <?=$_SESSION['phone']?></p>
        <p><?=$personal->address?></p>

        <h4>Skills</h4>
        <ul class="list-unstyled">
            <li>HTML, CSS, Bootstrap</li>
            <li>PHP & MySQL</li>
            <li>JavaScript</li>
            <li>Problem Solving</li>
        </ul>

        <h4>Languages</h4>
        <p>English</p>
        <p>Bangla</p>
    </div>

    <!-- RIGHT SIDE -->
    <div class="right">

        <h2 class="name">John Doe</h2>
        <p class="small-text">Professional Web Developer</p>

        <div>
            <div class="section-title">Career Objective</div>
            <p>
                Passionate and detail-oriented developer seeking to build scalable web applications
                and contribute to innovative projects.
            </p>
        </div>

        <div>
            <div class="section-title">Experience</div>

            <p class="job-title">Web Developer - ABC Company</p>
            <p class="small-text">2024 - Present</p>
            <p>Developed dynamic websites and improved system performance.</p>

            <p class="job-title">Intern - Tech Firm</p>
            <p class="small-text">2023</p>
            <p>Worked on frontend UI and debugging tasks.</p>
        </div>

        <div>
            <div class="section-title">Education</div>

            <p class="job-title">BSc in Computer Science</p>
            <p class="small-text">Dhaka University (2020 - 2024)</p>

            <p class="job-title">HSC</p>
            <p class="small-text">XYZ College (2018 - 2020)</p>
        </div>

        <div>
            <div class="section-title">Projects</div>
            <p><strong>Job Portal System:</strong> Built using PHP OOP with full CRUD features.</p>
        </div>

    </div>

</div>

</body>
</html>