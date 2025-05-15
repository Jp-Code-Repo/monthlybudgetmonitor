<?php

    namespace App\Controllers;

    use App\Services\AdminService;
    use App\Traits\ResponseTrait;

    class AuthController{

        use ResponseTrait;
        

        public $adminService;

        public function __construct(AdminService $adminService){

            $this->adminService = $adminService;
            // $this->sessionUtils = $sessionUtils;
        }

       
        public function loginUser(array $credentials){

            $result = $this->adminService->authUser($credentials);

            if($result['success'] === true){

                $this->response([
                'success' => true,
                'userData' => $result
                ], 200);

            }else{

                $this->response([
                'success' => false,
                'userData' => $result
                ], 200);
            }

            

        }
        
    }