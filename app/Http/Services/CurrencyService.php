<?php

namespace App\Http\Services;
use App\Currency;
use Illuminate\Support\Facades\Validator;
use App\Exceptions\CustomException;
use Illuminate\Support\Facades\Auth;
class CurrencyService {


public function add($data,$services){

$validator =Validator::make($data,[
'name'=>'required','string',   
]);
if($validator->fails())
throw new CustomException($validator->messages()->first());

$currency =new Currency($data);
$currency->save();
$currency=Currency::find($currency->id);
return $currency;
}

public function get($id){
    $currency=Currency::find($id);
    if($currency ==null)
    throw new CustomException("Currency not found");
    return $currency;
    }

    public function getAll(){
        $currency=Currency::all();
        if(count($currency) ==0)
        throw new CustomException("no currencies found");
        return $currency;
    }
}
