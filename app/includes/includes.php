<?php

    // On top Connection before all else
    require_once dirname(dirname(__FILE__)) . "/services/ConnectionService.php";
    
    // Controllers Folder
    require_once dirname(dirname(__FILE__)) . "/controllers/ResponseTrait.php";
    require_once dirname(dirname(__FILE__)) . "/controllers/AuthController.php";
    require_once dirname(dirname(__FILE__)) . "/controllers/AdminController.php";

    // Services Folder
    require_once dirname(dirname(__FILE__)) . "/services/AdminService.php";

    // Utilities x Helpers
    require_once dirname(dirname(__FILE__)) . "/utilities/UtilityService.php";
