<?php

    namespace App\Services;

    use App\Services\ConnectionService;
    use App\Utilities\UtilityService;

    class AdminService {

        protected   $connection;
        protected   $utility;
        protected   $tableName;

        public function __construct(ConnectionService $connection, UtilityService $utility){

            $this->connection = $connection;
            $this->utility = $utility;
            $this->tableName = "users";

        }


        // Authenticate User
        public function authUser($credentials){
            
            try {

                // Check for user if existing
                $sql = "SELECT * FROM users WHERE username = ?";
                $user = $this->connection->fetchUser($sql, $credentials);     
             
                if(!$user){
                    return [
                    'success' => false,
                    'error' => 'User not found!'
                    ];
                }

                // Verify hashed_password
                if(!password_verify($credentials['password'], $user['hashed_pass'])){
                    return [
                    'success' => false,
                    'error' => 'Invalid password'
                    ];
                }

                return [
                    'success' => true,
                    'user' => $user
                    ];

            } catch (\Exception $e) {
                return [
                    'success' => false,
                    'errorUserService' => $e->getMessage(),
                ];
            }
        }

        // Fetching Request User
        public function get($request){
            

            try {
                
                $sql = "SELECT * FROM $request";
                $result = $this->connection->fetchAll($sql);     
                
                return [
                    'success' => true,
                    'result_list' => $result
                ];
            } catch (\Exception $e) {
                return [
                    'success' => false,
                    'error' => $e->getMessage(),
                ];
            }

        }

        // Fetching Request Students
        public function getStudentsElection($sy){
            
            try {
                
                $sql = "SELECT spn, lastname, firstname, middlename, level, section,CONCAT(
                    LOWER(LEFT(firstname, 1)), 
                    LOWER(lastname), 
                    FLOOR(RAND() * 900 + 100)  -- Generates a random number between 100 and 999
                ) as username, CONCAT(
                    UPPER(LEFT(firstname, 3)), 
                    UPPER(LEFT(lastname, 3)), 
                    FLOOR(RAND() * 9000 + 1000)  -- Generates a random number between 1000 and 9999
                ) as password 
                FROM student_records.masterlist 
                WHERE schoolyear = ? 
                AND level != 'Grade 1' 
                AND level != 'Grade 2' 
                AND level != 'Grade 3' 
                AND level != 'Grade 12'
                AND level != 'Pre-Kinder'
                AND level != 'Nursery'
                AND level != 'Kinder'
                ORDER BY FIELD(level, 'Grade 4', 'Grade 5', 'Grade 6', 'Grade 7', 'Grade 8', 'Grade 9', 'Grade 10', 'Grade 11'), level ASC ";
                
                $studentList = $this->connection->fetchAll($sql, [ $sy ]);   
                
             
                 //var_dump($appended_result);
                return [
                    'success' => true,
                    'voters' => $studentList
                ];

            } catch (\Exception $e) {
                return [
                    'success' => false,
                    'error' => $e->getMessage(),
                ];
            }

        }


        public function updateStudentList($request){
            try {
            
                $sql = "SELECT sm.spn, sm.lastname, sm.firstname, sm.middlename, sm.gender, sm.level, sm.date_enrolled, sm.major, sm.section, sm.schoolyear
                        FROM student_records.masterlist sm
                        LEFT JOIN $request r ON sm.spn = r.spn
                        WHERE r.spn IS NULL;";

                $result = $this->connection->fetchAll($sql);
        
                return [
                    'success' => true,
                    'result_list' => $result
                ];
            } catch (\Exception $e) {
                return [
                    'success' => false,
                    'error' => $e->getMessage(),
                ];
            }
        }
        

    }

    