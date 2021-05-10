<?php

namespace App\Http\Services;
use App\File;
use Illuminate\Support\Facades\Validator;
use App\Exceptions\CustomException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;
use FFMpeg\Coordinate\Dimension;
use FFMpeg\Format\Video\X264;
use Carbon\Carbon;
use FFMpeg;
use FFMpeg\Filters\Video\VideoFilters;

use App\Jobs\ConvertMp4ToHls;

class FileService {

  


    public function add($file,$isMain){





        try {
        
           
            $path = public_path() . '/uploads/files/store/';
        
            $filename=  Carbon::now()->isoFormat('MM_DD_YYYY_HH_mm_SS').$file->getClientOriginalName();
           
           
        
            $file->move($path, $filename);
            $filenameAndPath=(url('/uploads/files/store/'.$filename));
            $dbfile= new File;
            $dbfile->user_id=Auth()->user()->id;
            
            $dbfile->isMain=$isMain;

            // if(pathinfo($path.$filename, PATHINFO_EXTENSION) == 'mp4')
            // {
            //     $lowBitrate = (new X264('libmp3lame', 'libx264'))->setKiloBitrate(250);
            //     $midBitrate = (new X264('libmp3lame', 'libx264'))->setKiloBitrate(500);
            //     $highBitrate = (new X264('libmp3lame', 'libx264'))->setKiloBitrate(1000);

            //     $streamPath = 'uploads/files/store/'.substr($filename,  0, strpos($filename,'.mp4')).".m3u8";

            //   //  $lowBitrateFormat = (new X264('libmp3lame', 'libx264'))->setKiloBitrate(500);

               
        
            //     // open the uploaded video from the right disk...
            //     FFMpeg::fromDisk('public')
            //         ->open('uploads/files/store/'.$filename)
        
            //         // add the 'resize' filter...
                   
        
            //         // call the 'export' method...
            //        // ->export()
        
            //         // tell the MediaExporter to which disk and in which format we want to export...
                    
            //         ->exportForHLS()
            //         ->setSegmentLength(2)
            //         ->setSegmentLength(10) // optional
            //         ->addFormat($lowBitrate)
            
            //         ->addFormat($midBitrate)
            //         ->addFormat($highBitrate)
            //         ->toDisk('public')
            //         // call the 'save' method with a filename...
            //         ->save($streamPath);
        
            // //     $ffmpeg = FFMpeg\FFMpeg::create([
            // //         'ffmpeg.binaries' => '/usr/bin/ffmpeg',
            // //         'ffprobe.binaries' => '/usr/bin/ffprobe',
            // //         'timeout' => 3600, 'ffmpeg.threads' => 12
            // //     ]);
            // //    //dd($streamPath);
            // //    $ffmpeg->fromDisk('public')
            // //    ->open('uploads/files/store/'.$filename)
            // //    ->addFilter(function (VideoFilters $filters) {
            // //        $filters->resize(new \FFMpeg\Coordinate\Dimension(640, 480));
            // //    })
            // //    ->export()
            // //    ->toDisk('public')
            // //    ->inFormat(new \FFMpeg\Format\Video\X264)
            // //    ->save('small_steve.mkv');
   

            //     // FFMpeg::fromDisk('public')
            //     // ->open('uploads/files/store/'.$filename)
            //     // ->exportForHLS()
            //     // ->setSegmentLength(2)
            //     // ->setSegmentLength(10) // optional
            //     // ->addFormat($lowBitrate)
        
            //     // ->addFormat($midBitrate)
            //     // ->addFormat($highBitrate)
            //     // ->toDisk('public')
            //     // ->save($streamPath);
         
            //     // return $streamPath;

            //             $dbfile->Path =url($streamPath) ; 
                        
            //             $dbfile->extension = pathinfo($streamPath, PATHINFO_EXTENSION);
            // }
            // else
            // {
                $dbfile->Path =  $filenameAndPath;
                $dbfile->extension = pathinfo($path.$filename, PATHINFO_EXTENSION);
            
        
          
           
               
            $dbfile->save();

            if(pathinfo($path.$filename, PATHINFO_EXTENSION) == 'mp4')
            {
                ConvertMp4ToHls::dispatch($dbfile->id,$filename);
            }
            
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
