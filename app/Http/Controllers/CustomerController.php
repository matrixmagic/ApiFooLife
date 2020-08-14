<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use App\Http\Services\CustomerService;
use Illuminate\Support\Facades\Auth;
use App\Http\Utility;
use Exception;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Arr;


class CustomerController extends Controller
{

    protected $customerService;

    /**
     * Create a new controller instance.
     *
     * @param  CustomerService  $users
     * @return void
     */
    public function __construct(CustomerService $customerService)
    {
        $this->customerService = $customerService;
        $this->middleware('ApiAuth:api',['except' => []]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function like(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'product_id' =>['required'],
           
        ]);
         
         
        if ($validator->fails()) {

            return   Utility::ToApi("missing fields",false, ["validator"=>$validator->messages()->first()],"BadRequest",400);
           
        }
          
       
            $like =$this->customerService->like($request->product_id);
        
        return   Utility::ToApi("like is put or remove",true,$like,"OK",201);
    }
    public function favourite(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'restaurant_id' =>['required'],
           
        ]);
         
         
        if ($validator->fails()) {

            return   Utility::ToApi("missing fields",false, ["validator"=>$validator->messages()->first()],"BadRequest",400);
           
        }
          
       
            $like =$this->customerService->favourite($request->restaurant_id);
        
        return   Utility::ToApi("favourite is put or remove",true,$like,"OK",201);
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'firstName'=>['required'],
            'lastName'=>['required'],
           
        ]);
         
         
        if ($validator->fails()) {

            return   Utility::ToApi("missing fields",false, ["validator"=>$validator->messages()->first()],"BadRequest",400);
           
        }
          
        $data =$request->only(['firstName','lastName']);
        $data['user_id'] = Auth::user()->id; 
            $customer =$this->customerService->add($data);
        
        return   Utility::ToApi("add restaurant",true,$customer,"OK",201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
