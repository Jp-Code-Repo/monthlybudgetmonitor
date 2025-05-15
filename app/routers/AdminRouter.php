<?php
   
    use App\Controllers\AdminController;
    use App\Controllers\AuthController;

    use App\Services\AdminService;

    use App\Utilities\UtilityService;

    use App\Services\ConnectionService;

    include "../includes/includes.php";
    // Check  for request with action
    if(!isset($_POST['action'])){
        die('Action is required');
    } 

    // Create Objects of classes
    $adminService = new AdminService(new ConnectionService, new UtilityService);

    $adminController = new AdminController($adminService);

    $authController = new AuthController($adminService); 
    

    switch ($_POST['action']) {

        case 'login':
            $authController->loginUser($_POST);
            break;
        
        case 'get':

            if (isset($_POST['request'])) {

                $request = $_POST['request'];
                
                switch ($request) {

                    case 'users':
                        $adminController->getAll($request);
                    break;
                    
                    case 'studentsvoters':
                        $sy = $_POST['sy'];
                        $adminController->getAllBySY($sy);
                    break;

                    case 'students':
                        $adminController->getAll($request);
                    break;
                }
            }
            
        break;
        
        case 'update':

            if (isset($_POST['request'])) {
    
                $request = $_POST['request'];
                    
                switch ($request) {
    
                    case 'students':
                        $adminController->update($request);
                    break;
                        
                }
            }

        break;
            
        default:
            //
            break;
            
    }
