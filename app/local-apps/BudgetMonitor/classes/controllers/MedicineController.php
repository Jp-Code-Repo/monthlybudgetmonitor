<?php

    namespace App\Controllers;

    use App\Services\MedicineService;
    use App\Traits\ResponseTrait;

    class MedicineController{

        use ResponseTrait;

        public $medicineService;

        public function __construct(MedicineService $medicineService){

            $this->medicineService = $medicineService;
        }

        public function getMeds(){
           
           try
           { 
            
            $fetchedMedicine = $this->medicineService->getAllMeds();

                $this->response([
                    'success' => true,
                    'result' => $fetchedMedicine
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