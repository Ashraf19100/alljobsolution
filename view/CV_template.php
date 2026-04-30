<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>CV Template</title>

<style>
    body {
        font-family: Arial, sans-serif;
        margin: 30px;
        color: #333;
    }

    h2 {
        margin-bottom: 5px;
    }

    .header {
        border-bottom: 2px solid #198754;
        margin-bottom: 20px;
        padding-bottom: 10px;
    }
    .header p{
        padding: 1px;
        margin:0px;
    }
    .profile-img {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        object-fit: cover;
        border: 3px solid #198754;
    }

    .section {
        margin-bottom: 25px;
    }

    .section h3 {
        border-left: 5px solid #198754;
        padding-left: 10px;
        margin-bottom: 10px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    table, th, td {
        border: 1px solid #ccc;
    }

    th {
        background-color: #f2f2f2;
        text-align: left;
        padding: 8px;
        width: 30%;
    }

    td {
        padding: 8px;
    }

    .signature {
        margin-top: 40px;
        text-align: right;
    }

    .signature img {
        width: 120px;
    }

</style>
</head>

<body>
<div class="" style="width:25%;">
        <img 
            src="<?= $_SERVER['DOCUMENT_ROOT'] ?>/alljobsolution/uploads/img/<?=$_SESSION['profile_image'] ?>"
            alt="Profile Image" 
            class="profile-img "
        >
</div>
<div class="header">
    <h2>Carriculam Viate of</h2>
    <p style="text-transform: uppercase"><strong> <?=$_SESSION['name']  ?></strong></p>
    <p class=""><strong>Email:</strong><?=$_SESSION['email']  ?></p>
    <p class=""><strong>Phone:</strong><?= $_SESSION['phone'] ?></p>
</div>
        <div class="" style="width:100%;">
        <h5 class=" ">Career Objective</h5>
        <p>To build a rewarding career in a dynamic and growth-oriented organization where I can effectively utilize my skills, gain new knowledge, and contribute to the success of the company while continuously improving myself both professionally and personally.</p>
        
        
    </div>
    


<!-- Personal Info -->
<div class="section">
    <h3>Personal Information</h3>
    <table>
        <tr><th>Full Name</th><td><?= $_SESSION['name'] ?></td></tr>
        <tr><th>Father Name</th><td><?= $personal->father_name ?></td></tr>
        <tr><th>Mother Name</th><td><?= $personal->mother_name ?></td></tr>
        <tr><th>Date of Birth</th><td><?= $personal->dob ?></td></tr>
        <tr><th>Nationality</th><td><?= $personal->nationality ?></td></tr>
        <tr><th>Religion</th><td><?= $personal->religion ?></td></tr>
        <tr><th>Gender</th><td><?= $personal->gender ?></td></tr>
        <tr><th>Marital Status</th><td><?= $personal->marital_status ?></td></tr>
        <tr><th>NID</th><td><?= $personal->nid ?></td></tr>
        <tr><th>Birth Reg.</th><td><?= $personal->birth_registration ?></td></tr>
        <tr><th>Passport</th><td><?= $personal->passport_no ?></td></tr>
        <tr><th>Address</th><td><?= $personal->address ?></td></tr>
    </table>
</div>

<!-- Education -->
<div class="section">
    <h3>Educational Information</h3>
    <table>
        <tr>
            <th>Exam</th>
            <th>Board</th>
            <th>Roll</th>
            <th>Subject</th>
            <th>Result</th>
            <th>Year</th>
        </tr>
        <tr>
            <td>SSC</td>
            <td>Dhaka</td>
            <td>12345</td>
            <td>Science</td>
            <td>5.00</td>
            <td>2016</td>
        </tr>
        <tr>
            <td>HSC</td>
            <td>Dhaka</td>
            <td>67890</td>
            <td>Science</td>
            <td>5.00</td>
            <td>2018</td>
        </tr>
    </table>
</div>

<!-- Experience -->
<div class="section">
    <h3>Experience</h3>
    <table>
        <tr><th>Company</th><td>ABC Company</td></tr>
        <tr><th>Job Title</th><td>Web Developer</td></tr>
        <tr><th>Type</th><td>IT</td></tr>
        <tr><th>Start</th><td>Jan 2022</td></tr>
        <tr><th>End</th><td>Present</td></tr>
        <tr><th>Location</th><td>Dhaka</td></tr>
        <tr><th>Description</th><td>Worked on web applications using PHP and JavaScript.</td></tr>
    </table>
</div>

<!-- Signature -->
<div class="signature">
    <img src="<?= $_SERVER['DOCUMENT_ROOT'] ?>/alljobsolution/uploads/signature/<?=$_SESSION['signature'] ?>">
    <p>Signature</p>
</div>

</body>
</html>












