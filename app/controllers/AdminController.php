<?php

    namespace App\Controllers;

    use App\Services\AdminService;
    use App\Traits\ResponseTrait;

    class AdminController{

        use ResponseTrait;

        public $adminService;

        public function __construct(AdminService $adminService){

            $this->adminService = $adminService;
        }

        public function getAll($request){
           
           try
           { 
            
            $fetchedResult = $this->adminService->get($request);

                $this->response([
                    'success' => true,
                    'result' => $fetchedResult
                ], 200);
            }

            catch (\Exception $e) {
                
                $this->response([
                    'success' => false,
                    'Error' => $e->getMessage()
                ], 500);

            }
        }

        public function getAllBySY($sy){
           
            try { 

                $fetchedStudentVoters = $this->adminService->getStudentsElection($sy);
                
                $this->response([
                    'success' => true,
                    'results' => $fetchedStudentVoters
                ], 200);

            } catch (\Exception $e) {

                 $this->response([
                     'success' => false,
                     'Error' => $e->getMessage()
                 ], 500);
 
             }
         }

        public function update($request){
           
            try
            { 
             
             $fetchedResult = $this->adminService->updateStudentList($request);
 
                 $this->response([
                     'success' => true,
                     'result' => $fetchedResult
                 ], 200);
             }
 
             catch (\Exception $e) {
                 
                 $this->response([
                     'success' => false,
                     'Error' => $e->getMessage()
                 ], 500);
 
             }
         }
 


    }