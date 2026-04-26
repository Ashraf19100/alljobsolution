<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Job Solution</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <style>
    body {
      background: #f8f9fa;
    }

    .card:hover {
      transform: translateY(-5px);
      transition: 0.3s;
    }

    .navbar {
      background: #fff;
    }

    .search-box {
      margin-top: 30px;
    }
  </style>
</head>

<body>

<!-- 🔵 Navbar -->
<nav class="navbar navbar-expand-lg shadow-sm sticky-top">
  <div class="container">
    
    <a class="navbar-brand" href="#">
      <img src="../assets/img/logo.png" height="40">
    </a>

    <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navBar">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-end" id="navBar">
      <ul class="navbar-nav">

        <li class="nav-item">
          <a class="nav-link" href="#">Home</a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Search Job</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Government</a></li>
            <li><a class="dropdown-item" href="#">Non-Government</a></li>
          </ul>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="#">Login</a>
        </li>

      </ul>
    </div>

  </div>
</nav>

<!-- 🔍 Search -->
<div class="container search-box">
  <form  class="d-flex justify-content-center">
    <div class="input-group w-75 shadow-sm">
      <input type="text" class="form-control" placeholder="Search jobs (e.g. gov, Dhaka)">
      <button class="btn btn-info text-white">Search</button>
    </div>
  </form>
</div>

<!-- 💼 Job Results -->
<div class="container mt-5">

  <h4 class="text-center mb-4">
    Result for "<span class="text-info">gov</span>"
  </h4>

  <div class="row g-4">

    <!-- Job Card -->
    <div class="col-md-4">
      <div class="card border-0 shadow-sm h-100">
        <div class="card-body">

          <div class="d-flex align-items-center mb-3">
            <img src="../assets/img/bang-gov-logo.png" width="60" class="me-3">
            <div>
              <h6 class="mb-0">Software Engineer</h6>
              <small class="text-muted">Bangladesh Government IT</small>
            </div>
          </div>

          <p class="mb-1"><i class="fa fa-map-marker-alt text-info"></i> Dhaka</p>
          <p class="mb-1"><i class="fa fa-briefcase text-info"></i> Full Time</p>
          <p class="text-danger mb-2">Deadline: 30 May 2026</p>

          <a href="#" class="btn btn-info w-100 text-white">View Details</a>

        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card border-0 shadow-sm h-100">
        <div class="card-body">

          <div class="d-flex align-items-center mb-3">
            <img src="../assets/img/bang-gov-logo.png" width="60" class="me-3">
            <div>
              <h6 class="mb-0">Software Engineer</h6>
              <small class="text-muted">Bangladesh Government IT</small>
            </div>
          </div>

          <p class="mb-1"><i class="fa fa-map-marker-alt text-info"></i> Dhaka</p>
          <p class="mb-1"><i class="fa fa-briefcase text-info"></i> Full Time</p>
          <p class="text-danger mb-2">Deadline: 30 May 2026</p>

          <a href="#" class="btn btn-info w-100 text-white">View Details</a>

        </div>
      </div>
    </div><div class="col-md-4">
      <div class="card border-0 shadow-sm h-100">
        <div class="card-body">

          <div class="d-flex align-items-center mb-3">
            <img src="../assets/img/bang-gov-logo.png" width="60" class="me-3">
            <div>
              <h6 class="mb-0">Software Engineer</h6>
              <small class="text-muted">Bangladesh Government IT</small>
            </div>
          </div>

          <p class="mb-1"><i class="fa fa-map-marker-alt text-info"></i> Dhaka</p>
          <p class="mb-1"><i class="fa fa-briefcase text-info"></i> Full Time</p>
          <p class="text-danger mb-2">Deadline: 30 May 2026</p>

          <a href="#" class="btn btn-info w-100 text-white">View Details</a>

        </div>
      </div>
    </div><div class="col-md-4">
      <div class="card border-0 shadow-sm h-100">
        <div class="card-body">

          <div class="d-flex align-items-center mb-3">
            <img src="../assets/img/bang-gov-logo.png" width="60" class="me-3">
            <div>
              <h6 class="mb-0">Software Engineer</h6>
              <small class="text-muted">Bangladesh Government IT</small>
            </div>
          </div>

          <p class="mb-1"><i class="fa fa-map-marker-alt text-info"></i> Dhaka</p>
          <p class="mb-1"><i class="fa fa-briefcase text-info"></i> Full Time</p>
          <p class="text-danger mb-2">Deadline: 30 May 2026</p>

          <a href="#" class="btn btn-info w-100 text-white">View Details</a>

        </div>
      </div>
    </div><div class="col-md-4">
      <div class="card border-0 shadow-sm h-100">
        <div class="card-body">

          <div class="d-flex align-items-center mb-3">
            <img src="../assets/img/bang-gov-logo.png" width="60" class="me-3">
            <div>
              <h6 class="mb-0">Software Engineer</h6>
              <small class="text-muted">Bangladesh Government IT</small>
            </div>
          </div>

          <p class="mb-1"><i class="fa fa-map-marker-alt text-info"></i> Dhaka</p>
          <p class="mb-1"><i class="fa fa-briefcase text-info"></i> Full Time</p>
          <p class="text-danger mb-2">Deadline: 30 May 2026</p>

          <a href="#" class="btn btn-info w-100 text-white">View Details</a>

        </div>
      </div>
    </div><div class="col-md-4">
      <div class="card border-0 shadow-sm h-100">
        <div class="card-body">

          <div class="d-flex align-items-center mb-3">
            <img src="../assets/img/bang-gov-logo.png" width="60" class="me-3">
            <div>
              <h6 class="mb-0">Software Engineer</h6>
              <small class="text-muted">Bangladesh Government IT</small>
            </div>
          </div>

          <p class="mb-1"><i class="fa fa-map-marker-alt text-info"></i> Dhaka</p>
          <p class="mb-1"><i class="fa fa-briefcase text-info"></i> Full Time</p>
          <p class="text-danger mb-2">Deadline: 30 May 2026</p>

          <a href="#" class="btn btn-info w-100 text-white">View Details</a>

        </div>
      </div>
    </div><div class="col-md-4">
      <div class="card border-0 shadow-sm h-100">
        <div class="card-body">

          <div class="d-flex align-items-center mb-3">
            <img src="../assets/img/bang-gov-logo.png" width="60" class="me-3">
            <div>
              <h6 class="mb-0">Software Engineer</h6>
              <small class="text-muted">Bangladesh Government IT</small>
            </div>
          </div>

          <p class="mb-1"><i class="fa fa-map-marker-alt text-info"></i> Dhaka</p>
          <p class="mb-1"><i class="fa fa-briefcase text-info"></i> Full Time</p>
          <p class="text-danger mb-2">Deadline: 30 May 2026</p>

          <a href="#" class="btn btn-info w-100 text-white">View Details</a>

        </div>
      </div>
    </div><div class="col-md-4">
      <div class="card border-0 shadow-sm h-100">
        <div class="card-body">

          <div class="d-flex align-items-center mb-3">
            <img src="../assets/img/bang-gov-logo.png" width="60" class="me-3">
            <div>
              <h6 class="mb-0">Software Engineer</h6>
              <small class="text-muted">Bangladesh Government IT</small>
            </div>
          </div>

          <p class="mb-1"><i class="fa fa-map-marker-alt text-info"></i> Dhaka</p>
          <p class="mb-1"><i class="fa fa-briefcase text-info"></i> Full Time</p>
          <p class="text-danger mb-2">Deadline: 30 May 2026</p>

          <a href="#" class="btn btn-info w-100 text-white">View Details</a>

        </div>
      </div>
    </div><div class="col-md-4">
      <div class="card border-0 shadow-sm h-100">
        <div class="card-body">

          <div class="d-flex align-items-center mb-3">
            <img src="../assets/img/bang-gov-logo.png" width="60" class="me-3">
            <div>
              <h6 class="mb-0">Software Engineer</h6>
              <small class="text-muted">Bangladesh Government IT</small>
            </div>
          </div>

          <p class="mb-1"><i class="fa fa-map-marker-alt text-info"></i> Dhaka</p>
          <p class="mb-1"><i class="fa fa-briefcase text-info"></i> Full Time</p>
          <p class="text-danger mb-2">Deadline: 30 May 2026</p>

          <a href="#" class="btn btn-info w-100 text-white">View Details</a>

        </div>
      </div>
    </div><div class="col-md-4">
      <div class="card border-0 shadow-sm h-100">
        <div class="card-body">

          <div class="d-flex align-items-center mb-3">
            <img src="../assets/img/bang-gov-logo.png" width="60" class="me-3">
            <div>
              <h6 class="mb-0">Software Engineer</h6>
              <small class="text-muted">Bangladesh Government IT</small>
            </div>
          </div>

          <p class="mb-1"><i class="fa fa-map-marker-alt text-info"></i> Dhaka</p>
          <p class="mb-1"><i class="fa fa-briefcase text-info"></i> Full Time</p>
          <p class="text-danger mb-2">Deadline: 30 May 2026</p>

          <a href="#" class="btn btn-info w-100 text-white">View Details</a>

        </div>
      </div>
    </div><div class="col-md-4">
      <div class="card border-0 shadow-sm h-100">
        <div class="card-body">

          <div class="d-flex align-items-center mb-3">
            <img src="../assets/img/bang-gov-logo.png" width="60" class="me-3">
            <div>
              <h6 class="mb-0">Software Engineer</h6>
              <small class="text-muted">Bangladesh Government IT</small>
            </div>
          </div>

          <p class="mb-1"><i class="fa fa-map-marker-alt text-info"></i> Dhaka</p>
          <p class="mb-1"><i class="fa fa-briefcase text-info"></i> Full Time</p>
          <p class="text-danger mb-2">Deadline: 30 May 2026</p>

          <a href="#" class="btn btn-info w-100 text-white">View Details</a>

        </div>
      </div>
    </div><div class="col-md-4">
      <div class="card border-0 shadow-sm h-100">
        <div class="card-body">

          <div class="d-flex align-items-center mb-3">
            <img src="../assets/img/bang-gov-logo.png" width="60" class="me-3">
            <div>
              <h6 class="mb-0">Software Engineer</h6>
              <small class="text-muted">Bangladesh Government IT</small>
            </div>
          </div>

          <p class="mb-1"><i class="fa fa-map-marker-alt text-info"></i> Dhaka</p>
          <p class="mb-1"><i class="fa fa-briefcase text-info"></i> Full Time</p>
          <p class="text-danger mb-2">Deadline: 30 May 2026</p>

          <a href="#" class="btn btn-info w-100 text-white">View Details</a>

        </div>
      </div>
    </div><div class="col-md-4">
      <div class="card border-0 shadow-sm h-100">
        <div class="card-body">

          <div class="d-flex align-items-center mb-3">
            <img src="../assets/img/bang-gov-logo.png" width="60" class="me-3">
            <div>
              <h6 class="mb-0">Software Engineer</h6>
              <small class="text-muted">Bangladesh Government IT</small>
            </div>
          </div>

          <p class="mb-1"><i class="fa fa-map-marker-alt text-info"></i> Dhaka</p>
          <p class="mb-1"><i class="fa fa-briefcase text-info"></i> Full Time</p>
          <p class="text-danger mb-2">Deadline: 30 May 2026</p>

          <a href="#" class="btn btn-info w-100 text-white">View Details</a>

        </div>
      </div>
    </div><div class="col-md-4">
      <div class="card border-0 shadow-sm h-100">
        <div class="card-body">

          <div class="d-flex align-items-center mb-3">
            <img src="../assets/img/bang-gov-logo.png" width="60" class="me-3">
            <div>
              <h6 class="mb-0">Software Engineer</h6>
              <small class="text-muted">Bangladesh Government IT</small>
            </div>
          </div>

          <p class="mb-1"><i class="fa fa-map-marker-alt text-info"></i> Dhaka</p>
          <p class="mb-1"><i class="fa fa-briefcase text-info"></i> Full Time</p>
          <p class="text-danger mb-2">Deadline: 30 May 2026</p>

          <a href="#" class="btn btn-info w-100 text-white">View Details</a>

        </div>
      </div>
    </div><div class="col-md-4">
      <div class="card border-0 shadow-sm h-100">
        <div class="card-body">

          <div class="d-flex align-items-center mb-3">
            <img src="../assets/img/bang-gov-logo.png" width="60" class="me-3">
            <div>
              <h6 class="mb-0">Software Engineer</h6>
              <small class="text-muted">Bangladesh Government IT</small>
            </div>
          </div>

          <p class="mb-1"><i class="fa fa-map-marker-alt text-info"></i> Dhaka</p>
          <p class="mb-1"><i class="fa fa-briefcase text-info"></i> Full Time</p>
          <p class="text-danger mb-2">Deadline: 30 May 2026</p>

          <a href="#" class="btn btn-info w-100 text-white">View Details</a>

        </div>
      </div>
    </div><div class="col-md-4">
      <div class="card border-0 shadow-sm h-100">
        <div class="card-body">

          <div class="d-flex align-items-center mb-3">
            <img src="../assets/img/bang-gov-logo.png" width="60" class="me-3">
            <div>
              <h6 class="mb-0">Software Engineer</h6>
              <small class="text-muted">Bangladesh Government IT</small>
            </div>
          </div>

          <p class="mb-1"><i class="fa fa-map-marker-alt text-info"></i> Dhaka</p>
          <p class="mb-1"><i class="fa fa-briefcase text-info"></i> Full Time</p>
          <p class="text-danger mb-2">Deadline: 30 May 2026</p>

          <a href="#" class="btn btn-info w-100 text-white">View Details</a>

        </div>
      </div>
    </div><div class="col-md-4">
      <div class="card border-0 shadow-sm h-100">
        <div class="card-body">

          <div class="d-flex align-items-center mb-3">
            <img src="../assets/img/bang-gov-logo.png" width="60" class="me-3">
            <div>
              <h6 class="mb-0">Software Engineer</h6>
              <small class="text-muted">Bangladesh Government IT</small>
            </div>
          </div>

          <p class="mb-1"><i class="fa fa-map-marker-alt text-info"></i> Dhaka</p>
          <p class="mb-1"><i class="fa fa-briefcase text-info"></i> Full Time</p>
          <p class="text-danger mb-2">Deadline: 30 May 2026</p>

          <a href="#" class="btn btn-info w-100 text-white">View Details</a>

        </div>
      </div>
    </div>

    <!-- Job Card -->
    <div class="col-md-4">
      <div class="card border-0 shadow-sm h-100">
        <div class="card-body">

          <div class="d-flex align-items-center mb-3">
            <img src="../assets/img/bang-gov-logo.png" width="60" class="me-3">
            <div>
              <h6 class="mb-0">Web Developer</h6>
              <small class="text-muted">Private Tech Ltd</small>
            </div>
          </div>

          <p class="mb-1"><i class="fa fa-map-marker-alt text-info"></i> Chittagong</p>
          <p class="mb-1"><i class="fa fa-briefcase text-info"></i> Remote</p>
          <p class="text-danger mb-2">Deadline: 10 June 2026</p>

          <a href="#" class="btn btn-info w-100 text-white">View Details</a>

        </div>
      </div>
    </div>

    <!-- Job Card -->
    <div class="col-md-4">
      <div class="card border-0 shadow-sm h-100">
        <div class="card-body">

          <div class="d-flex align-items-center mb-3">
            <img src="../assets/img/bang-gov-logo.png" width="60" class="me-3">
            <div>
              <h6 class="mb-0">Data Analyst</h6>
              <small class="text-muted">Analytics Corp</small>
            </div>
          </div>

          <p class="mb-1"><i class="fa fa-map-marker-alt text-info"></i> Sylhet</p>
          <p class="mb-1"><i class="fa fa-briefcase text-info"></i> Part Time</p>
          <p class="text-danger mb-2">Deadline: 25 May 2026</p>

          <a href="#" class="btn btn-info w-100 text-white">View Details</a>

        </div>
      </div>
    </div>

  </div>

</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>



<div class="information-section bg-light py-4">
    <div class="container">

        <div class="card shadow-lg border-0">
            <div class="card-body p-4">

                <h4 class="text-center text-success fw-bold mb-4">
                    Applying for the Position <?= $job_details->title?>
                </h4>

                <form action="index.php?page=education-submit" method="POST">

                    <!-- 🔵 PERSONAL INFO -->
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-header bg-white fw-bold text-info">
                            Personal Information
                        </div>

                        <div class="card-body">
                            <div class="row g-3">

                                <div class="col-md-12">
                                    <label class="form-label">Full Name</label>
                                    <input type="text" name="name" class="form-control"
                                        value="<?= $_SESSION['name'] ?? '' ?>" required>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Father Name</label>
                                    <input type="text" name="father_name" class="form-control"
                                        <?php if(isset($app_personal_info->father_name)){?> value="<?= $app_personal_info->father_name?>" <?php } ?> required>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Mother Name</label>
                                    <input type="text" name="mother_name" class="form-control"
                                        <?php if(isset($app_personal_info->mother_name)){?> value="<?= $app_personal_info->mother_name?>" <?php } ?> required>
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label">Date of Birth</label>
                                    <input type="date" name="dob" class="form-control"
                                        <?php if(isset($app_personal_info->dob)){?> value="<?= $app_personal_info->dob?>" <?php } ?> required>
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label">Nationality</label>
                                    <input type="text" name="nationality" class="form-control"
                                        <?php if(isset($app_personal_info->nationality)){?> value="<?= $app_personal_info->nationality?>" <?php } ?>>
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label">Religion</label>
                                    <input type="text" name="religion" class="form-control"
                                        <?php if(isset($app_personal_info->religion)){?> value="<?= $app_personal_info->religion?>" <?php } ?>>
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label d-block">Gender</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" value="Male">
                                        <label class="form-check-label">Male</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" value="Female">
                                        <label class="form-check-label">Female</label>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label">Marital Status</label>
                                    <select name="marital_status" class="form-select">
                                        <option value="">Select</option>
                                        <option value="single" <?php if(isset($app_personal_info->marital_status)){if($app_personal_info->marital_status=='single'){?> selected <?php } } ?>>Single</option>
                                        <option value="married" <?php if(isset($app_personal_info->marital_status)){if($app_personal_info->marital_status=='married'){?> selected <?php } } ?>>Married</option>
                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label">NID</label>
                                    <input type="text" name="nid" class="form-control"
                                        <?php if(isset($app_personal_info->nid)){?> value="<?= $app_personal_info->nid?>" <?php } ?>>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Birth Registration</label>
                                    <input type="text" name="birth_registration" class="form-control"
                                        <?php if(isset($app_personal_info->birth_registration)){?> value="<?= $app_personal_info->birth_registration?>" <?php } ?>>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Passport</label>
                                    <input type="text" name="passport_no" class="form-control"
                                        <?php if(isset($app_personal_info->passport_no)){?> value="<?= $app_personal_info->passport_no?>" <?php } ?>>
                                </div>

                                <div class="col-12">
                                    <label class="form-label">Address</label>
                                    <textarea name="address" class="form-control" rows="3"><?php if(isset($app_personal_info->address)){?><?= $app_personal_info->address?><?php } ?></textarea>
                                </div>

        </div>
    </div>
</div>
