<?php

namespace App\Http\Services;
use App\Payment;
use Illuminate\Support\Facades\Validator;
use App\Exceptions\CustomException;
use Illuminate\Support\Facades\Auth;
class PaymentService {


public function add($data,$services){

$validator =Validator::make($data,[
'name'=>'required','string',   
]);
if($validator->fails())
throw new CustomException($validator->messages()->first());

$payment =new Payment($data);
$payment->save();
$payment=Payment::find($payment->id);
return $payment;
}

public function get($id){
    $payment=Payment::find($id);
    if($payment ==null)
    throw new CustomException("Payment not found");
    return $payment;
    }

    public function getAll(){
        $payments=Payment::all();
        if(count($payments) ==0)
        throw new CustomException("no payments found");
        return $payments;
    }
    public function getAllList(){
        $payments=Payment::all();
        
        if(count($payments) ==0)
        throw new CustomException("no games found");

        $payments =  $payments->map(function ($item) {
            $itm = new \stdClass();
            $itm->value=$item->id;
            $itm->display=$item->name;
            return $itm;
        });
        
        return $payments;
    }
}
