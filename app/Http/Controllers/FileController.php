<?php

namespace App\Http\Controllers;

use App\File;
use Illuminate\Http\Request;
use App\Http\Utility;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
class FileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api');
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'fileName' => ['required', 'string', 'max:255'],
            'file' => ['required', 'string'],
        ]);
         
        if ($validator->fails()) {

            return   Utility::ToApi("error",false, ["validator"=>$validator->messages()->first()],"validation",400);
           
        }
        
        $fileName = $request->fileName;
        $file = base64_decode($request->file);
        $path = public_path() . '\\uploads\\files\\store\\';
        $filename=  Carbon::now()->isoFormat('MM_DD_YYYY_HH_mm_SS').$fileName;
       /* if(!$file->isValid()) {
            //return response()->json(['invalid_file_upload'], 400);
            return   Utility::ToApi("error",false,$user,"bad",400);
        }
        */
        $fp = fopen($path.$filename,'wb+');
        fwrite($fp,$file);
        fclose($fp);
        $ext = pathinfo($path.$filename, PATHINFO_EXTENSION);
        $filename=(url('/uploads/files/store/'.$filename));
        $dbfile =new File();
        $dbfile->path=$filename;
        $dbfile->isMain=$request["isMain"];
        $dbfile->extension=$ext;
        $dbfile->user_id=Auth()->user()->id;
        $dbfile->save();
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
