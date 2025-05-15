<?php

    namespace App\Services;

    use App\Services\ConnectionService;

    class UserService {

        protected   $connection;
        protected   $tableName;

        public function __construct(ConnectionService $connection){

            $this->connection = $connection;
            $this->tableName = "users";

        }

        // Fetching Request User
        public function getAllUser(){
            
            try {
                
                $sql = "SELECT firstname, lastname, gender, email, role, created_at FROM $this->tableName";
                $userList = $this->connection->fetchAll($sql);     
                
                return [
                    'success' => true,
                    'userList' => $userList
                ];
            } catch (\Exception $e) {
                return [
                    'success' => false,
                    'error' => $e->getMessage(),
                ];
            }

        }

        

    }

    