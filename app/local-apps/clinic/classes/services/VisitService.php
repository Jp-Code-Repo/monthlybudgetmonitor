<?php

    namespace App\Services;

    use App\Services\ConnectionService;

    class VisitService {

        protected   $connection;
        protected   $tableName;

        public function __construct(ConnectionService $connection){

            $this->connection = $connection;
            $this->tableName = "visitations";

        }
        
        // Fetching Request User
        public function getAll(){
            
            try {
                
                $sql = "SELECT * FROM $this->tableName";
                $visitsData = $this->connection->fetchAll($sql);     
                
                return [
                    'success' => true,
                    'visitList' => $visitsData
                ];
            } catch (\Exception $e) {
                return [
                    'success' => false,
                    'error' => $e->getMessage(),
                ];
            }

        }

    }

    