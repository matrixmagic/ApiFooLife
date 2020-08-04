<?php

namespace App\Http\Controllers;

use App\File;
use Illuminate\Http\Request;
use App\Http\Utility;
use Illuminate\Support\Facades\Validator;
use App\Http\Services\FileService;
use Carbon\Carbon;
class FileController extends Controller
{

    protected $fileService;
    public function __construct(FileService $fileService)
    {
        $this->middleware('ApiAuth:api');
        $this->fileService = $fileService;
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
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        $file = $request->file('file');
       
        if(!$file->isValid()) {
            return   Utility::ToApi("Error uploaded file",false,null,"BadRequest",400);
        }
       
        $dbfile=$this->fileService->add($file,$request->isMain);
        
        return   Utility::ToApi("file uploaded",true,$dbfile,"OK",200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store2(Request $request)
    {

        $data =$request->only(['isMain','fileName','file']);
        $dbfile=$this->fileService->add($data);
        
        return   Utility::ToApi("file uploaded",true,$dbfile,"OK",200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function show(File $file)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function edit(File $file)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, File $file)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function destroy(File $file)
    {
        //
    }
}
