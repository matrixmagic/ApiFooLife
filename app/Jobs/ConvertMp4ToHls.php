<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\File;
use FFMpeg\Coordinate\Dimension;
use FFMpeg\Format\Video\X264;
use FFMpeg\Filters\Video\VideoFilters;

use FFMpeg;


class ConvertMp4ToHls implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */

   private  $file_id;
   private $fileName;
    public function __construct($file_id, $fileName)
    {
        $this->file_id=$file_id;
        $this->fileName=$fileName;
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
     $mp4File=File::find($this->file_id);

     $lowBitrate = (new X264('libmp3lame', 'libx264'))->setKiloBitrate(250);
     $midBitrate = (new X264('libmp3lame', 'libx264'))->setKiloBitrate(500);
     $highBitrate = (new X264('libmp3lame', 'libx264'))->setKiloBitrate(1000);
     $filename=$this->fileName; 


     $streamPath = 'uploads/files/store/'.substr($filename,  0, strpos($filename,'.mp4')).".m3u8";

   //  $lowBitrateFormat = (new X264('libmp3lame', 'libx264'))->setKiloBitrate(500);

    
   

     // open the uploaded video from the right disk...
     /*FFMpeg::fromDisk('public')
         ->open('uploads/files/store/'.$filename)

         // add the 'resize' filter...
        

         // call the 'export' method...
        // ->export()

         // tell the MediaExporter to which disk and in which format we want to export...
         
         ->exportForHLS()
         ->setSegmentLength(0.5)
         //->setSegmentLength(10) // optional
     //    ->addFormat($lowBitrate)
 
        // ->addFormat($midBitrate)
         ->addFormat($highBitrate)
         ->toDisk('public')
         // call the 'save' method with a filename...
         ->save($streamPath);

 //     $ffmpeg = FFMpeg\FFMpeg::create([
 //         'ffmpeg.binaries' => '/usr/bin/ffmpeg',
 //         'ffprobe.binaries' => '/usr/bin/ffprobe',
 //         'timeout' => 3600, 'ffmpeg.threads' => 12
 //     ]);
 //    //dd($streamPath);
 //    $ffmpeg->fromDisk('public')
 //    ->open('uploads/files/store/'.$filename)
 //    ->addFilter(function (VideoFilters $filters) {
 //        $filters->resize(new \FFMpeg\Coordinate\Dimension(640, 480));
 //    })
 //    ->export()
 //    ->toDisk('public')
 //    ->inFormat(new \FFMpeg\Format\Video\X264)
 //    ->save('small_steve.mkv');


     // FFMpeg::fromDisk('public')
     // ->open('uploads/files/store/'.$filename)
     // ->exportForHLS()
     // ->setSegmentLength(2)
     // ->setSegmentLength(10) // optional
     // ->addFormat($lowBitrate)

     // ->addFormat($midBitrate)
     // ->addFormat($highBitrate)
     // ->toDisk('public')
     // ->save($streamPath);

     // return $streamPath;
     */

            // $mp4File->Path ="https://www.insperry.com/".$streamPath ; 
             
        //     $mp4File->extension = pathinfo($streamPath, PATHINFO_EXTENSION);
           //  $mp4File->extension = "m3u8";
             $mp4File->save();

             FFMpeg::fromDisk('public')
             ->open('uploads/files/store/'.$filename)
             ->getFrameFromSeconds(0)
             ->export()
             ->toDisk('public')
             ->save('uploads/files/store/'.substr($filename,  0, strpos($filename,'.mp4')).".jpg");
               

    }
}
