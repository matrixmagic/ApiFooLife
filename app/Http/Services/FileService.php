<?php

namespace App\Http\Services;
use App\File;
use Illuminate\Support\Facades\Validator;
use App\Exceptions\CustomException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;
use Carbon\Carbon;
class FileService {

  


    public function add($file,$isMain){





        try {
        
           
            $path = public_path() . '/uploads/files/store/';
        
            $filename=  Carbon::now()->isoFormat('MM_DD_YYYY_HH_mm_SS').$file->getClientOriginalName();
           
           
        
            $file->move($path, $filename);
            $filename=(url('/Insperry/public/uploads/files/store/'.$filename));
            $dbfile= new File;
            $dbfile->user_id=Auth()->user()->id;
            $dbfile->Path = $filename;
            $dbfile->isMain=$isMain;
            $dbfile->extension = pathinfo($path.$filename, PATHINFO_EXTENSION);
               
            $dbfile->save();
            
        } catch (Exception $e) {
            throw new CustomException($e);
        }
               
        return $dbfile;
        }
        
      
        
        

public function add2($data){
    $validator = Validator::make($data, [
        'fileName' => ['required', 'string', 'max:255'],
        'file' => ['required', 'string'],
    ]);
     
if($validator->fails())
throw new CustomException($validator->messages()->first());

try {
    $fileName = $data['fileName'];
    $file = base64_decode($data['file']);
    $path = public_path() . '/uploads/files/store/';
    $filename=  Carbon::now()->isoFormat('MM_DD_YYYY_HH_mm_SS').$fileName;
    $fp = fopen($path.$filename,'wb+');
    fwrite($fp,$file);
    fclose($fp);
    $ext = pathinfo($path.$filename, PATHINFO_EXTENSION);
    $filename=(url('/Insperry/public/uploads/files/store/'.$filename));
    $dbfile =new File();
    $dbfile->path=$filename;
    if( Arr::exists($data, 'isMain'))
    $dbfile->isMain=$data["isMain"];
    $dbfile->extension=$ext;
    $dbfile->user_id=Auth()->user()->id;
    $dbfile->save();
} catch (Exception $e) {
    throw new CustomException($e);
}
       
return $dbfile;
}

public function get($id){
    $file=File::find($id);
    if($file ==null)
    throw new CustomException("File not found");
    return $file;
    }

    public function getUserFiles(){
        $resturant=Auth()->user()->Files;
        if($resturant ==null)
        throw new CustomException("File not found");
        return $resturant;
    }
}
