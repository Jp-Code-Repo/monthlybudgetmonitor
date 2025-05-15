<?php

    // On top Connection before all else
    require_once dirname(dirname(__FILE__)) . "/classes/services/ConnectionService.php";
    
    // Controllers Folder
    require_once dirname(dirname(__FILE__)) . "/classes/controllers/ComplaintController.php";
    
    // Services Folder
    require_once dirname(dirname(__FILE__)) . "/classes/services/ComplaintService.php";
