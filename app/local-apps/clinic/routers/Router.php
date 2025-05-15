<?php
   
    use App\Controllers\PatientController;
    use App\Controllers\MedicineController;
    use App\Controllers\VisitController;
    use App\Controllers\GatePassController;
    use App\Controllers\UserController;
    use App\Controllers\ReportController;
    use App\Controllers\ComplaintController;

    use App\Services\PatientService;
    use App\Services\MedicineService;
    use App\Services\VisitService;
    use App\Services\GatePassService;
    use App\Services\UserService;
    use App\Services\ReportService;
    use App\Services\ComplaintService;

    use App\Services\ConnectionService;

    include "../includes/includes.php";
    // Check  for request with action
    if(!isset($_POST['action'])){
        die('Action is required');
    } 

    // Create Objects of classes
    $patientService = new PatientService(new ConnectionService);
    $medicineService = new MedicineService(new ConnectionService);
    $visitService = new VisitService(new ConnectionService);
    $gatepassService = new GatePassService(new ConnectionService);
    $userService = new UserService(new ConnectionService);
    $reportService = new ReportService(new ConnectionService);
    $complaintService = new ComplaintService(new ConnectionService);

    $patientController = new PatientController($patientService);
    $medicineController = new MedicineController($medicineService);
    $visitController = new VisitController($visitService);
    $gatepassController = new GatePassController($gatepassService);
    $userController = new UserController($userService);
    $reportController = new ReportController($reportService);
    $complaintController = new ComplaintController($complaintService);
    

    switch ($_POST['action']) {

        case 'getPatient':
            $patientController->getPatient($_POST);
            break;

        case 'getPatientFromGPPage':
            $patientController->getPatient($_POST);
            break;
            
        case 'getMeds':
            $medicineController->getMeds();
            break;

        case 'getComplaints':
            $complaintController->getComplaints();
            break;

        case 'logVisit':
            $patientController->insertVisitData($_POST);
            break;

        case 'getVisitationLogs':
            $visitController->getVisitsAll();
            break;

        case 'getUsers':
            $userController->getUsers();
            break;

        case 'insertGatePassDataGPPage':
            $gatepassController->insertGatePassData($_POST);
            break;

        case 'getPatients':
            $patientController->getPatients();
            break;

        case 'getRMR':
            $reportController->getRegMonRep($_POST);
            break;
            
        default:
            //
            break;
            
    }