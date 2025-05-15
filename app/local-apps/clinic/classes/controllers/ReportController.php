<?php

    namespace App\Controllers;

    use App\Services\ReportService;
    use App\Traits\ResponseTrait;

    class ReportController{

        use ResponseTrait;

        public $reportService;

        public function __construct(ReportService $reportService){

            $this->reportService = $reportService;
        }

        public function getRegMonRep($req){
           
           try
           { 
            
            $data = $this->reportService->getRMR($req);

                $this->response([
                    'success' => true,
                    'result' => $data
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