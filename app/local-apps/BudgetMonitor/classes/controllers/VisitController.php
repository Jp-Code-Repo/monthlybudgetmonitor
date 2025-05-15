<?php

    namespace App\Controllers;

    use App\Services\VisitService;
    use App\Traits\ResponseTrait;

    class VisitController{

        use ResponseTrait;

        public $visitService;

        public function __construct(VisitService $visitService){

            $this->visitService = $visitService;
        }

        public function getVisitsAll(){
           
           try
           { 
            
            $fetchedVisits = $this->visitService->getAll();

                $this->response([
                    'success' => true,
                    'result' => $fetchedVisits
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