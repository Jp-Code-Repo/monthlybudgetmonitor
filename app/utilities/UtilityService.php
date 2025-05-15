<?php
    namespace App\Utilities;

    class UtilityService {

        // Function to generate username and password
        public function generateStudentCredentials($student) {

            $firstname = strtolower($student['firstname']);
            $lastname = strtolower($student['lastname']);

            // Generate username: first letter of first name + last name + random number
            $username = substr($firstname, 0, 1) . $lastname . rand(100, 999);

            // // Generate password: first 3 letters of firstname + first 3 letters of lastname + random digits
            // $password = ucfirst(substr($firstname, 0, 3)) . ucfirst(substr($lastname, 0, 3)) . rand(1000, 9999);

            // Append username and password to the student array
            $student['username'] = $username;
            $student['password'] = "DefaultPass";

            return $student;

        }

    }
