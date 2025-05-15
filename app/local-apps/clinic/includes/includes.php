<?php

    // On top Connection before all else
    require_once dirname(dirname(__FILE__)) . "/classes/services/ConnectionService.php";
    
    // Controllers Folder
    require_once (dirname(dirname(__FILE__))) . "/classes/controllers/ResponseTrait.php";
    require_once dirname(dirname(__FILE__)) . "/classes/controllers/PatientController.php";
    require_once dirname(dirname(__FILE__)) . "/classes/controllers/MedicineController.php";
    require_once dirname(dirname(__FILE__)) . "/classes/controllers/VisitController.php";
    require_once dirname(dirname(__FILE__)) . "/classes/controllers/GatePassController.php";
    require_once dirname(dirname(__FILE__)) . "/classes/controllers/UserController.php";
    require_once dirname(dirname(__FILE__)) . "/classes/controllers/ReportController.php";
    require_once dirname(dirname(__FILE__)) . "/classes/controllers/ComplaintController.php";
    
    // Services Folder
    require_once dirname(dirname(__FILE__)) . "/classes/services/PatientService.php";
    require_once dirname(dirname(__FILE__)) . "/classes/services/MedicineService.php";
    require_once dirname(dirname(__FILE__)) . "/classes/services/VisitService.php";
    require_once dirname(dirname(__FILE__)) . "/classes/services/GatePassService.php";
    require_once dirname(dirname(__FILE__)) . "/classes/services/UserService.php";
    require_once dirname(dirname(__FILE__)) . "/classes/services/ReportService.php";
    require_once dirname(dirname(__FILE__)) . "/classes/services/ComplaintService.php";
