<?php

    namespace App\Services;

    use App\Services\ConnectionService;

    class GatePassService {

        protected   $connection;
        protected   $tableName;

        public function __construct(ConnectionService $connection){

            $this->connection = $connection;
            $this->tableName = "gatepasses";

        }

        // Fetching Request User
        public function createGPData($GPData){
            try {
                $sql = "INSERT INTO $this->tableName 

                (   
                    pat_id,
                    school_id,
                    pat_lastname,
                    pat_firstname,
                    patient_type,
                    dept_level,
                    position_section,
                    guardian_name,
                    guardian_relation,
                    remarks,
                    created_by,
                    created_by_role
                    
                ) 

                VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";

                $data = $this->connection->insert($sql, [
                    $GPData['patient-id'],
                    $GPData['patient-barcode'],
                    $GPData['patient-lastname'], 
                    $GPData['patient-firstname'], 
                    $GPData['patient-classification'],  
                    $GPData['patient-grade-dept'], 
                    $GPData['patient-sec-pos'], 
                    $GPData['guardian-name'], 
                    $GPData['relationship'], 
                    $GPData['remarks'], 
                    $GPData['prepared_by'],
                    $GPData['prepared_by_role']
                ]);

                return [
                    'success' => true,
                    'gpData' => $data
                ];

            } catch (\Exception $e) {

                return [
                    'success' => false,
                    'patiendData' => $e->getMessage(),
                ];

            }

        }

        

    }

    