<?php

    namespace App\Controllers;

    use App\Services\GatePassService;
    use App\Traits\ResponseTrait;

    class GatePassController{

        use ResponseTrait;

        public $gatepassService;

        public function __construct(GatePassService $gatepassService){

            $this->gatepassService = $gatepassService;
        }

        public function insertGatePassData($GPData){
           
           try
           { 
            
            $insertedData = $this->gatepassService->createGPData($GPData);

                $this->response([
                    'success' => true,
                    'result' => $insertedData
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