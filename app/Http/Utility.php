<?php

namespace App\Http;
use App\Http\Resources\ApiResponse;

class Utility{

    public static function ToApi($message,$success,$data,$codeMessage,$status){
     
        $apiResponse = collect();
        $apiResponse->message =$message;
        $apiResponse->success=$success;
        $apiResponse->data=$data;
        $apiResponse->codeMessage=$codeMessage;
        $apiResponse->status=$status;
        
        return new ApiResponse($apiResponse) ;

    }
}