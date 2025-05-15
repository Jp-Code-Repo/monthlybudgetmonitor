<?php

    namespace App\Services;

    use App\Services\ConnectionService;

    class PatientService {

        protected   $connection;
        protected   $tableName;

        public function __construct(ConnectionService $connection){

            $this->connection = $connection;
            $this->tableName = "patients";

        }

        // Fetching Request User
        public function get($request){
            
            try {
                
                $sql = "SELECT * FROM patients WHERE school_id = ?";
                $patientData = $this->connection->fetch($sql, [ $request['patientID'] ]);     
                
                if(!$patientData){
                    return [
                        'success' => false,
                        'error' => "Patient not found."
                    ];
                }

                return [
                    'success' => true,
                    'patientData' => $patientData
                ];
            } catch (\Exception $e) {
                return [
                    'success' => false,
                    'error' => $e->getMessage(),
                ];
            }

        }

        public function getAll(){
            
            try {
                
                $sql = "SELECT pat_lastname, pat_firstname, pat_email, pat_contact, pat_address, dept_level, position_section, created_at FROM patients";
                $patientsList = $this->connection->fetchAll($sql);     

                return [
                    'success' => true,
                    'patientList' => $patientsList
                ];
            } catch (\Exception $e) {
                return [
                    'success' => false,
                    'error' => $e->getMessage(),
                ];
            }

        }


        public function createLog($patientVisitData){

            try {
                $sql = "INSERT INTO visitations 
                (   
                    patient_barcode, 
                    pid,
                    patient_firstname, 
                    patient_lastname, 
                    patient_classification, 
                    patient_gender, 
                    patient_grade_dept, 
                    patient_sec_pos, 
                    chief_complaint, 
                    treatment_remarks, 
                    medicine, 
                    issue_gp,
                    created_by
                ) 
                    VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)";

                $data = $this->connection->insert($sql, [
                    $patientVisitData['patient-barcode'],
                    $patientVisitData['patient-id'], 
                    $patientVisitData['patient-firstname'], 
                    $patientVisitData['patient-lastname'], 
                    $patientVisitData['patient-classification'], 
                    $patientVisitData['patient-gender'], 
                    $patientVisitData['patient-grade-dept'], 
                    $patientVisitData['patient-sec-pos'], 
                    $patientVisitData['chief-complaint'], 
                    $patientVisitData['treatment-remarks'], 
                    $patientVisitData['medicine'], 
                    $patientVisitData['issue_gp'],
                    $patientVisitData['user']
                ]);

                return [
                    'success' => true,
                    'patiendData' => $data
                ];

            } catch (\Exception $e) {

                return [
                    'success' => false,
                    'patiendData' => $e->getMessage(),
                ];

            }
        }

        

    }

    