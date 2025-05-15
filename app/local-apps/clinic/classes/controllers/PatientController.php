<?php

    namespace App\Controllers;

    use App\Services\PatientService;
    use App\Traits\ResponseTrait;

    class PatientController{

        use ResponseTrait;

        public $patientService;

        public function __construct(PatientService $patientService){

            $this->patientService = $patientService;
        }

        public function getPatient($request){
           
           try
           { 
            
            $fetchedPatient = $this->patientService->get($request);

                $this->response([
                    'success' => true,
                    'result' => $fetchedPatient
                ], 200);
            }

            catch (\Exception $e) {
                
                $this->response([
                    'success' => false,
                    'Error' => $e->getMessage()
                ], 500);

            }

        }

        public function getPatients(){
           
            try
            { 
             
             $fetchedPatients = $this->patientService->getAll();
 
                 $this->response([
                     'success' => true,
                     'result' => $fetchedPatients
                 ], 200);
             }
 
             catch (\Exception $e) {
                 
                 $this->response([
                     'success' => false,
                     'Error' => $e->getMessage()
                 ], 500);
 
             }
 
         }


        public function insertVisitData($patientVisitData){
             
            try {

                $insertedData = $this->patientService->createLog($patientVisitData);

                $this->response([
                    'success' => true,
                    'result' => $insertedData
                ], 200);


            } 
            
            catch (\Exception $e) {
                
                $this->response([
                    'success' => false,
                    'title' => "Oops! Error!",
                    'text' => "Process Failed",
                    'icon' => "error",
                    'confirmButtonText' => "We'll try again",
                    'message' => $e->getMessage()
                ], 500);

            }

        }



    }