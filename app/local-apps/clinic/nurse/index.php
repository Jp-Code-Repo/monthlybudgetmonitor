<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Clinic Visit Monitor</title>

        <link href="../css/styles.css" rel="stylesheet"/>
        <!-- <link href="../../../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->
        <link href="../../../../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg bg-primary text-uppercase fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="<?php echo (isset($_GET['patientBarcode']) ? '../' : './');?>"
>CMS</a>
                <button class="navbar-toggler text-uppercase font-weight-bold bg-secondary text-white rounded" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item mx-0 mx-lg-1"><a class="load-content nav-link py-3 px-0 px-lg-3 rounded" href="#" data-url="pages/patients.page.php">Patients</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="load-content nav-link py-3 px-0 px-lg-3 rounded" href="#" data-url="pages/visits.page.php">Visits Logs</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="load-content nav-link py-3 px-0 px-lg-3 rounded" href="#" data-url="pages/users.page.php">Users</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="load-content nav-link py-3 px-0 px-lg-3 rounded" href="#" onclick="logout()">Logout</a></li>
                    </ul>

                </div>
            </div>
        </nav>



     <div id="main-content">



        <!-- Masthead-->
        <header class="masthead bg-primary text-white text-center">
            <div class="container d-flex align-items-center flex-column">
                <!-- Masthead Avatar Image-->
                <img class="masthead-avatar mb-5" src="../img/nurse.png" alt="..." />
                <!-- Masthead Heading-->
                <h1 class="masthead-heading text-uppercase mb-0">Clinic Monitoring System</h1>
                <!-- Icon Divider-->
                <div class="divider-custom divider-light">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- Masthead Subheading-->
                <p class="masthead-subheading font-weight-light mb-0">Keeping track of patient visitations</p>
            </div>
        </header>
        <!-- Portfolio Section-->
        <section class="page-section portfolio" id="portfolio">
            <div class="container">
                <!-- Portfolio Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Patient Care</h2>
                <!-- Icon Divider-->
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- Portfolio Grid Items-->
                <div class="row justify-content-center">
                    <!-- visits-->
                    <div class="col-md-6 col-lg-4 mb-5">
                        <div class="portfolio-item mx-auto" data-bs-toggle="modal" data-bs-target="#visits-modal">
                            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                
                                <div class="portfolio-item-caption-content text-center text-white"><i class="fas fa-plus fa-3x"></i>Visit Log</div>
                            </div>
                            <img class="img-fluid" src="../img/visits.jpg" alt="..." />
                        </div>
                    </div>
                    <!-- gatepass-->
                    <div class="col-md-6 col-lg-4 mb-5">
                        <div class="portfolio-item mx-auto load-content"  data-url="pages/gatepass.php">
                            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                <div class="portfolio-item-caption-content text-center text-white"><i class="fas fa-plus fa-3x"></i>Gate Pass</div>
                            </div>
                            <img class="img-fluid" src="../img/gatepass.jpg" alt="..." />
                        </div>
                    </div>
                    <!-- reports -->
                    <div class="col-md-6 col-lg-4 mb-5">
                        <div class="portfolio-item mx-auto" data-bs-toggle="modal" data-bs-target="#reports-modal">
                            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                <div class="portfolio-item-caption-content text-center text-white"><i class="fas fa-plus fa-3x"></i>Reports</div>
                            </div>
                            <img class="img-fluid" src="../img/reports.jpg" alt="..." />
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Visits Modal-->
        <div class="portfolio-modal modal fade" data-bs-backdrop="static" id="visits-modal" tabindex="-1" aria-labelledby="visit-modal" >
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header pb-0 border-0"><button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button></div>
                    <div class="modal-body text-center pt-0 pb-5">
                       
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <!-- Visits Modal - Title-->
                                    <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">Visits</h2>
                                    <!-- Icon Divider-->
                                    <div class="divider-custom">
                                        <div class="divider-custom-line"></div>
                                        <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                        <div class="divider-custom-line"></div>
                                    </div>
                                    <!-- Visits Modal - Image-->
                                    <!-- <img class="img-fluid rounded mb-5" style="height:200px;width:200px;"../assets/img/visits.jpg" alt="..." /> -->
                                    <!-- Visits Modal - Text-->
                                    <p class="">Please the select the ID field and scan the patients' ID.</p>
                                    
                                         <div class="row pb-2">
                                            <div class="col">
                                                <input type="text" class="form-control" placeholder="Scan ID Barcode" name="patient-barcode" autocomplete="off" autofocus id="patient-barcode" required>
                                            </div>
                                        </div>

                                    <!-- Visits Form -->
                                    <form class="" action="#" method="post" id="frm-patient-visit">
                                        

                                        <!-- Patient Information -->
                                        <span style="color:#b9bfc5;" >Patient Information</span>
                                       <hr class="mt-1">
    
                                        <input type="hidden"  name="patient-id">
                                        <input type="hidden"  name="patient-barcode" >
                                        <input type="hidden"  name="patient-gender">
                                        <div class="row">
                                            <div class="col">
                                                <input type="text" class="form-control" placeholder="First Name" name="patient-firstname" readonly required>
                                            </div>
                                            <div class="col">
                                                <input type="text" class="form-control" placeholder="Last Name" name="patient-lastname" readonly required>
                                            </div>
                                        </div>
                                        <div class="row pt-3 pb-3">
                                            <div class="col">
                                                <input type="text" class="form-control" placeholder="Classification" name="patient-classification" readonly required>
                                            </div>
                                            <div class="col">
                                                <input type="text" class="form-control" placeholder="Level / Dept" name="patient-grade-dept" readonly required>
                                            </div>
                                            <div class="col">
                                                <input type="text" class="form-control" placeholder="Section / Position" name="patient-sec-pos" readonly required>
                                            </div>
                                        </div>

                                        <!-- Fill out by nurse -->
                                        <span style="color:#b9bfc5;" >Patient Care</span>
                                        <hr class="mt-1">

                                        <div class="row">
                                            <!-- <div class="col">
                                                <input type="text" class="form-control" placeholder="Chief Complaint" name="chief-complaint" required>
                                            </div> -->
                                            <div class="col">
                                                <select class="form-select" name="chief-complaint" id="select_complaints" required>
                                                    <option disabled selected>Complaints</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row pt-3">
                                            <div class="col">
                                                <input type="text" class="form-control" placeholder="Treatment / Remarks" name="treatment-remarks" required>
                                            </div>
                                        </div>
                                         <div class="row pt-3">
                                            <div class="col">
                                                <select class="form-select" name="medicine" id="select_meds" required>
                                                    <option disabled selected>Choose Medicine</option>
                                                </select>
                                            </div>
                                            <div class="col">
                                                <select class="form-select" name="issue_gp" required>
                                                    <option disabled selected>Issue Gate Pass</option>
                                                    <option value="1">Yes</option>
                                                    <option value="0">No</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row pt-3 d-grid">
                                            <div class="d-grid gap-2">
                                                <button class="btn btn-primary" type="submit" id="btn_save_visit_log">Log Visit</button>
                                            </div>
                                        </div>
                                    </form>
                                  
                                </div>
                            </div>
                        
                    </div>
                </div>
            </div>
        </div>


        <!-- Reports Modal-->
        <div class="portfolio-modal modal fade" data-bs-backdrop="static" id="reports-modal" tabindex="-1" aria-labelledby="reports-modal" >
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header border-0"><button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button></div>
                    <div class="modal-body text-center pb-5">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <!-- Portfolio Modal - Title-->
                                    <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">Reports</h2>
                                    <!-- Icon Divider-->
                                    <div class="divider-custom">
                                        <div class="divider-custom-line"></div>
                                        <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                        <div class="divider-custom-line"></div>
                                    </div>
                                   <!-- <button type="button" onclick="visitReport()">Visits</button> -->

                                   <div class="list-group">
                                        <a href="#" class="list-group-item list-group-item-action" aria-current="true" onclick="report01()">
                                        <div class="d-flex w-100 justify-content-center">
                                            <h5 class="mb-1">Monthly Report</h5>
                                        </div>
                                        <p class="mb-1">Total Pateints Served, Medical Cases, Trauma Cases, Total Gate Pass Issued</p>
                                        </a>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

  
    </div>   
    
        <!-- Bootstrap core JS-->
        <script src="../../../../assets/vendor/jquery/jquery.js"></script>
        <script src="../../../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="../../../../assets/vendor/sweetalert2/sweetalert2.all.min.js"></script>

        <!-- Core theme JS-->
        <script src="../scripts/js/nurse.index.js"></script>
        <script src="../scripts/js/reports.js"></script>
    </body>
</html>
