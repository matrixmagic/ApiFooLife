<?php

namespace App\Exceptions;

use Exception;
use App\Http\Utility;
class CustomException  extends Exception{

    protected $ex;
    public function __construct($message)
    {

        
        $this->ex= $message;
    }

    public function render($request)
    {
     return response( Utility::ToApi("Exception",false,$this->ex,"Exception",500));
    }
    
}