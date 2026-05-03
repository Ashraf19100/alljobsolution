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
    .top-table{
        border:none;
    }
    .header {
        
        margin-bottom: 20px;
        padding-bottom: 10px;
    }
    .career-obj{
        border-bottom: 2px solid #198754;
    }
    .header p{
        padding: 1px;
        margin:0px;
    }
    .image-column{
        width:100%;    
        display:flex;
        align-items:center;
        justify-content:center;
    }
    .profile-img {
        width: 150px;
        height: 150px;
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
        font-weight: 700;

        
    }
    
    .signature img {
        width: 120px;
    }
    .edu-section{
        margin-top: 120px; 
    }

</style>
</head>

<body>
    <table border="0">
        <tr>
            <td>
                <div class="image-column" style="width:100%;">
                    <img 
                        src="<?= $_SERVER['DOCUMENT_ROOT'] ?>/alljobsolution/uploads/img/<?=$_SESSION['profile_image'] ?>"
                        alt="Profile Image" 
                        class="profile-img "
                    >
                </div>
            </td>
            <td>
                <div class="header">
                    <h2>Carriculam Viate of</h2>
                    <p style="text-transform: uppercase"><strong> <?=$_SESSION['name']  ?></strong></p>
                    <p class=""><strong>Email:</strong><?=$_SESSION['email']  ?></p>
                    <p class=""><strong>Phone:</strong><?= $_SESSION['phone'] ?></p>
                </div>
            </td>
        </tr>
    </table>


        <div class=" section " style="width:100%;">
            <h3 class=" " >Career Objective</h3>
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
<div class="edu-section">
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
        <?php foreach($education as $education){?> 
        <tr>
            <td><?= $education['exam_name'] ?></td>
            <td><?= $education['uni_board'] ?></td>
            <td><?= $education['roll_id'] ?></td>
            <td><?= $education['subject'] ?></td>
            <td><?= $education['result'] ?></td>
            <td><?= $education['passing_year'] ?></td>
        </tr>
        <?php } ?>
        
    </table>
</div>

<!-- Experience -->
<div class="section">
    <h3>Experience</h3>
    <table>
        <?php foreach($experience as $experience){?> 
        <tr><th>Company</th><td>ABC Company</td></tr>
        <tr><th>Job Title</th><td>Web Developer</td></tr>
        <tr><th>Type</th><td>IT</td></tr>
        <tr><th>Start</th><td>Jan 2022</td></tr>
        <tr><th>End</th><td>Present</td></tr>
        <tr><th>Location</th><td>Dhaka</td></tr>
        <tr><th>Description</th><td>Worked on web applications using PHP and JavaScript.</td></tr>
        <?php } ?>
    </table>
</div>

<!-- Signature -->
<div class="signature">
    <img src="<?= $_SERVER['DOCUMENT_ROOT'] ?>/alljobsolution/uploads/signature/<?=$_SESSION['signature'] ?>">
    <p>Signature</p>
</div>

</body>
</html>












