<?php

    namespace App\Services;

    use App\Services\ConnectionService;

    class ReportService {

        protected   $connection;

        public function __construct(ConnectionService $connection){

            $this->connection = $connection;

        }
        
        // Fetching Request User
        public function getRMR($req){
            
            try {
                
                $sql = "SELECT v.*, m.name, c.complaint, c.class 
                        FROM visitations v
                        JOIN medicine m ON v.medicine = m.med_id
                        JOIN gatepasses gp ON v.pid = gp.pat_id
                        JOIN chiefcomplaints c ON v.chief_complaint = c.ccid
                        WHERE v.created_at BETWEEN ? AND ?;
                        ";

                $result = $this->connection->fetchAll($sql,[ $req['strDate'], $req['endDate']]);  
                
                // For Medical and Trauma
                $sqlMedTrau = "SELECT * FROM chiefcomplaints";
                $resMedTrau = $this->connection->fetchAll($sqlMedTrau);

                $data = [];


                $levelSummary = [];
                foreach ($result as $r) {
                    $levelSummary[$r['patient_grade_dept']] = 0;
                }
                foreach ($result as $r) {
                    if (isset($r['patient_grade_dept'])) {
                        $key = $r['patient_grade_dept'];
                        if (!isset($levelSummary[$key])) {
                            $levelSummary[$key] = 0; // Initialize if not set
                        }
                        $levelSummary[$key]++; 
                    }
                }


                $complaintSummary = [];
                foreach ($resMedTrau as $l) {
                    $complaintSummary[$l['complaint']] = 0;
                }

                foreach ($result as $r) {
                    if (isset($r['complaint']) && isset($complaintSummary[$r['complaint']])) {
                        $complaintSummary[$r['complaint']]++; 
                    }
                }

                $sumMedTrau = [];
                foreach ($result as $r) {
                    $sumMedTrau[$r['class']] = 0;
                }
                foreach ($result as $r) {
                    if (isset($r['class'])) {
                        $key = $r['class'];
                        if (!isset($sumMedTrau[$key])) {
                            $sumMedTrau[$key] = 0; // Initialize if not set
                        }
                        $sumMedTrau[$key]++; 
                    }
                }

                $sumGP = 0;
                foreach ($result as $r) {
                    if($r['issue_gp'] == 1){
                        $sumGP++;
                    }
                }
                

                $data['levelSum'] = $levelSummary;
                $data['complaintsSum'] = $complaintSummary;
                $data['sumMedTrau'] = $sumMedTrau;
                $data['sumGP'] = $sumGP;

                return [
                    'success' => true,
                    'reportData' => $data
                ];
            } catch (\Exception $e) {
                return [
                    'success' => false,
                    'error' => $e->getMessage(),
                ];
            }

        }

        public function totalPatientsCount($arr){
            $count = count($arr);
            return $count;
        }

        public function countLvl($arr, $key, $value){
            $count = count(array_filter($arr, fn($item) => isset($item[$key]) && $item[$key] === $value));
            return $count;
        }
        

    }

    