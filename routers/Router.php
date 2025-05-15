<?php
   
    use App\Controllers\ComplaintController;

    use App\Services\PatientService;

    use App\Services\ConnectionService;

    include "../includes/includes.php";
    // Check  for request with action
    if(!isset($_POST['action'])){
        die('Action is required');
    } 

    // Create Objects of classes
    $complaintService = new ComplaintService(new ConnectionService);

    $complaintController = new ComplaintController($complaintService);
    

    switch ($_POST['action']) {

        case 'getPatient':
            $patientController->getPatient($_POST);
            break;
            
        default:
            //
            break;
            
    }