<?php

    namespace App\Controllers;

    use App\Services\ComplaintService;
    use App\Traits\ResponseTrait;

    class ComplaintController{

        use ResponseTrait;

        public $complaintService;

        public function __construct(ComplaintService $complaintService){

            $this->complaintService = $complaintService;
        }

        public function getComplaints(){
           
           try
           { 
            
            $fetchedComplaint = $this->complaintService->getAll();

                $this->response([
                    'success' => true,
                    'result' => $fetchedComplaint
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