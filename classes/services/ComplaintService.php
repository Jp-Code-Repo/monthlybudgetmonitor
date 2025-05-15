<?php

    namespace App\Services;

    use App\Services\ConnectionService;

    class ComplaintService {

        protected   $connection;
        protected   $tableName;

        public function __construct(ConnectionService $connection){

            $this->connection = $connection;
            $this->tableName = "chiefcomplaints";

        }
        
        // Fetching Request User
        public function getAll(){
            
            try {
                
                $sql = "SELECT * FROM $this->tableName";
                $visitsData = $this->connection->fetchAll($sql);     
                
                return [
                    'success' => true,
                    'complaintList' => $visitsData
                ];
            } catch (\Exception $e) {
                return [
                    'success' => false,
                    'error' => $e->getMessage(),
                ];
            }

        }

    }

    