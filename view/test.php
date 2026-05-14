<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Job Portal Home</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>

    <style>
        body{
            background-color:#f8f9fa;
        }

        .hero-section{
            background: linear-gradient(to right, #0d6efd, #0b5ed7);
            color:white;
            padding:80px 0;
        }

        .search-box{
            background:white;
            padding:25px;
            border-radius:10px;
            box-shadow:0 4px 10px rgba(0,0,0,0.1);
            margin-top:-40px;
        }

        .job-card{
            transition:0.3s;
            border:none;
            border-radius:12px;
        }

        .job-card:hover{
            transform:translateY(-5px);
            box-shadow:0 5px 20px rgba(0,0,0,0.1);
        }

        .company-logo{
            width:60px;
            height:60px;
            object-fit:contain;
        }

        .category-box{
            background:white;
            border-radius:10px;
            padding:25px;
            text-align:center;
            transition:0.3s;
            box-shadow:0 2px 10px rgba(0,0,0,0.05);
        }

        .category-box:hover{
            background:#0d6efd;
            color:white;
            transform:translateY(-5px);
        }

        footer{
            background:#212529;
            color:white;
            padding:20px 0;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark py-3">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">
                <i class="fa-solid fa-briefcase"></i> JobPortal
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">Jobs</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">Companies</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>

                    <li class="nav-item">
                        <a class="btn btn-primary ms-2" href="#">Post Job</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section text-center">
        <div class="container">
            <h1 class="display-4 fw-bold">Find Your Dream Job</h1>
            <p class="lead mt-3">
                Search thousands of jobs from top companies
            </p>
        </div>
    </section>

    <!-- Search Box -->
    <div class="container">
        <div class="search-box">
            <div class="row g-3">
                <div class="col-md-5">
                    <input type="text" class="form-control" placeholder="Job title or keyword">
                </div>

                <div class="col-md-4">
                    <select class="form-select">
                        <option>Select Category</option>
                        <option>IT & Software</option>
                        <option>Marketing</option>
                        <option>Banking</option>
                        <option>Government</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <button class="btn btn-primary w-100">
                        <i class="fa-solid fa-magnifying-glass"></i> Search Jobs
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Categories -->
    <section class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Popular Categories</h2>
            </div>

            <div class="row g-4">

                <div class="col-md-3">
                    <div class="category-box">
                        <i class="fa-solid fa-laptop-code fa-2x mb-3"></i>
                        <h5>IT & Software</h5>
                        <p>120 Jobs</p>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="category-box">
                        <i class="fa-solid fa-chart-line fa-2x mb-3"></i>
                        <h5>Marketing</h5>
                        <p>85 Jobs</p>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="category-box">
                        <i class="fa-solid fa-building-columns fa-2x mb-3"></i>
                        <h5>Banking</h5>
                        <p>40 Jobs</p>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="category-box">
                        <i class="fa-solid fa-user-tie fa-2x mb-3"></i>
                        <h5>Government</h5>
                        <p>25 Jobs</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Latest Jobs -->
    <section class="pb-5">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="fw-bold">Latest Jobs</h2>

                <a href="#" class="btn btn-outline-primary">
                    View All
                </a>
            </div>

            <div class="row g-4">

                <!-- Job Card -->
                <div class="col-md-6 col-lg-4">
                    <div class="card job-card h-100">
                        <div class="card-body">

                            <div class="d-flex align-items-center mb-3">
                                <img src="https://cdn-icons-png.flaticon.com/512/5968/5968705.png" class="company-logo me-3">

                                <div>
                                    <h5 class="mb-0">Frontend Developer</h5>
                                    <small class="text-muted">TechSoft Ltd.</small>
                                </div>
                            </div>

                            <p>
                                Looking for a skilled frontend developer with Bootstrap and JavaScript experience.
                            </p>

                            <div class="mb-3">
                                <span class="badge bg-primary">Full Time</span>
                                <span class="badge bg-success">Remote</span>
                            </div>

                            <div class="d-flex justify-content-between">
                                <span>
                                    <i class="fa-solid fa-location-dot"></i> Dhaka
                                </span>

                                <span class="fw-bold text-primary">
                                    ৳35,000
                                </span>
                            </div>

                        </div>

                        <div class="card-footer bg-white border-0">
                            <button class="btn btn-primary w-100">
                                Apply Now
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Job Card -->
                <div class="col-md-6 col-lg-4">
                    <div class="card job-card h-100">
                        <div class="card-body">

                            <div class="d-flex align-items-center mb-3">
                                <img src="https://cdn-icons-png.flaticon.com/512/732/732221.png" class="company-logo me-3">

                                <div>
                                    <h5 class="mb-0">Data Entry Operator</h5>
                                    <small class="text-muted">Office Solutions</small>
                                </div>
                            </div>

                            <p>
                                Candidate must have typing speed and Microsoft Office knowledge.
                            </p>

                            <div class="mb-3">
                                <span class="badge bg-warning text-dark">Part Time</span>
                                <span class="badge bg-info">Office</span>
                            </div>

                            <div class="d-flex justify-content-between">
                                <span>
                                    <i class="fa-solid fa-location-dot"></i> Khulna
                                </span>

                                <span class="fw-bold text-primary">
                                    ৳20,000
                                </span>
                            </div>

                        </div>

                        <div class="card-footer bg-white border-0">
                            <button class="btn btn-primary w-100">
                                Apply Now
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Job Card -->
                <div class="col-md-6 col-lg-4">
                    <div class="card job-card h-100">
                        <div class="card-body">

                            <div class="d-flex align-items-center mb-3">
                                <img src="https://cdn-icons-png.flaticon.com/512/5969/5969020.png" class="company-logo me-3">

                                <div>
                                    <h5 class="mb-0">Graphic Designer</h5>
                                    <small class="text-muted">Creative Studio</small>
                                </div>
                            </div>

                            <p>
                                Adobe Photoshop and Illustrator experienced designer required.
                            </p>

                            <div class="mb-3">
                                <span class="badge bg-danger">Contract</span>
                                <span class="badge bg-success">Remote</span>
                            </div>

                            <div class="d-flex justify-content-between">
                                <span>
                                    <i class="fa-solid fa-location-dot"></i> Chattogram
                                </span>

                                <span class="fw-bold text-primary">
                                    ৳30,000
                                </span>
                            </div>

                        </div>

                        <div class="card-footer bg-white border-0">
                            <button class="btn btn-primary w-100">
                                Apply Now
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="bg-primary text-white py-5">
        <div class="container text-center">
            <h2 class="fw-bold">Are You Hiring?</h2>
            <p class="mb-4">
                Post your jobs and find the best candidates easily.
            </p>

            <button class="btn btn-light btn-lg">
                Post a Job
            </button>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container text-center">
            <p class="mb-0">
                © 2026 JobPortal. All Rights Reserved.
            </p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>