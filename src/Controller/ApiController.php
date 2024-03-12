<?php
namespace Controller;

use App\DB;

class ApiController {
    function getUser($user_id){
        json_response(
            DB::who($user_id)
        );
    }
}