<?php

    namespace App\Services;

    use App\Services\ConnectionService;

    class MedicineService {

        protected   $connection;
        protected   $tableName;

        public function __construct(ConnectionService $connection){

            $this->connection = $connection;
            $this->tableName = "medicine";

        }

        // Fetching Request User
        public function getAllMeds(){
            
            try {
                
                $sql = "SELECT med_id, name FROM $this->tableName";
                $medicineList = $this->connection->fetchAll($sql);     
                
                return [
                    'success' => true,
                    'medList' => $medicineList
                ];
            } catch (\Exception $e) {
                return [
                    'success' => false,
                    'error' => $e->getMessage(),
                ];
            }

        }

        

    }

    