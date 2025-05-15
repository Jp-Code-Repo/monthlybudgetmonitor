<?php

    namespace App\Services;

    class ConnectionService {

        public  $conn,
                $host,
                $dbname,
                $password;

        public function __construct(
            $host = "localhost",
            $dbname = "unifyx",
            $username = "root",
            $password = ""
        )
        {
            // Database credentials
            $this->host = $host;
            $this->dbname = $dbname;
            $this->username = $username;
            $this->password = $password;

            try {

                $this->conn = new \PDO("mysql:host=$this->host;dbname=$this->dbname",$this->username, $this->password);
                $this->conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
                $this->conn->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);

            } catch (\PDOException $e) {

                die("Connection failed: " . $e->getMessage());

            }
        }

        // Get the raw PDO connection (if needed)
        public function getConnection() {
            return $this->conn;
        }

        // inserting 
        public function insert($sql, $params){

            try {
                $stmt = $this->conn->prepare($sql);
                $stmt->execute([$params]);

                $params['uid'] = $this->conn->lastInsertId();

                return $params;

            } catch (\PDOException $e) {
                echo "Error: " . $e->getMessage();
            }

        }

        public function insertStudent($sql, array $params){

            try {
                $stmt = $this->conn->prepare($sql);
                $stmt->execute([$params]);

                $params['spn'] = $this->conn->lastInsertId();

                return $params;

            } catch (\PDOException $e) {
                echo "Error: " . $e->getMessage();
            }

        }
        
        // Fetch a single record
        public function fetch($sql, array $credentials) {

            try {
                $stmt = $this->conn->prepare($sql);
                $stmt->execute($credentials);
                return $stmt->fetch(\PDO::FETCH_ASSOC); // Return a single row
            } catch (\PDOException $e) {
                echo "Error: " . $e->getMessage();
                return null;
            }

        }

        // Fetch a single record
        public function fetchUser($sql, $credentials) {

            try {
                $stmt = $this->conn->prepare($sql);
                $stmt->execute([$credentials['username']]);
                return $stmt->fetch(\PDO::FETCH_ASSOC); // Return a single row
            } catch (\PDOException $e) {
                echo "Error: " . $e->getMessage();
                return null;
            }

        }

        // Fetch all records
        public function fetchAll($sql, $params = []) {
            try {
                $stmt = $this->conn->prepare($sql);
                $stmt->execute($params);
                return $stmt->fetchAll(\PDO::FETCH_ASSOC); // Using default fetch mode (FETCH_ASSOC)
            } catch (\PDOException $e) {
                echo "Error: " . $e->getMessage();
                return [];
            }
        }
        
        public function update($sql, $params = []){
            // var_dump($params);
            unset($params["action"]);

           try {
            $stmt = $this->conn->prepare($sql);
            
            // Bind parameters manually if needed
            foreach ($params as $key => &$value) {
                $stmt->bindParam($key, $value);
            }

            $stmt->execute();
            return $stmt->rowCount();

            }catch (\PDOException $e) {
                echo "ConnectionServiceError: " . $e->getMessage();
                return false;
            }
        }



    }