<?php

    namespace App\Controllers;

    use App\Services\UserService;
    use App\Traits\ResponseTrait;

    class UserController{

        use ResponseTrait;

        public $userService;

        public function __construct(UserService $userService){

            $this->userService = $userService;
        }

        public function getUsers(){
           
           try
           { 
            
            $fetcheUsers = $this->userService->getAllUser();

                $this->response([
                    'success' => true,
                    'result' => $fetcheUsers
                ], 200);
            }

            catch (\Exception $e) {
                
                $this->response([
                    'success' => false,
                    'Error' => $e->getMessage()
                ], 500);

            }
        }


    }