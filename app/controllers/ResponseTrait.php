<?php

    
    namespace App\Traits;

    trait ResponseTrait {
        public function response ($message, $responseCode = 200) 
        {
        
            
            header('Content-Type: application/json');
            http_response_code($responseCode);
            if(is_array($message)) {
                echo json_encode($message);
            } else {
                echo $content;
            }

        }
    }
