<?php

namespace App\Http\Controllers\web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\File;
use App\Queue;
use Redirect;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManager as ImageManager;
use Intervention\Image\Image as Image;
class FileController extends Controller
{
    
    public  $config;
    public function __construct()
    {
       
    $this->middleware('auth:web');
    //auth()->setDefaultDriver('api');
        $root_path = public_path();

        $this->config['public_path'] = $root_path . '\\uploads\\files\\store\\';
        $this->config['public_Url']= "/uploads/files/store/";
        $this->config['upload_allowed'] = array('mp4','m4v','flv','avi','mov','avi','mkv','mpg','webm','3gp','ogv','mpg','wmv');//Allowed to upload
        $this->config['upload_images'] = array('jpg', 'jpeg', 'png');
        $this->config['upload_audio'] = array('mp3', 'm4a');
        $this->config['ffmpeg_path'] = 'C:\\ffmpeg\\ffmpeg';//FFmpeg path on your server
        $this->config['ffprobe_path'] = 'C:\\ffmpeg\\ffprobe';//FFprobe path on your server
        $this->config['log_filename'] = 'log.txt';
        $this->config['max_log_size'] = 700 * 1024;//Log size limit
        $this->config['queue_size'] = 5;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resturant=Auth()->user()->Restaurant()->first();

       
        if($resturant ==null)
        throw new CustomException("Resturant not found");
        $products = Product::where('restaurant_id',$resturant->id)->orderBy('displayOrder')->get();
        $products->load('Category');
        $products->load('File');
        $page_title = 'Product';
        $page_description = 'Here is your products list data';
        $logo = "images/logo.png";
        $logoText = "images/logo-text.png";
		
        $action = "products";
        return view('product.index', compact('page_title', 'page_description','action','logo','logoText','products'));
    }

    static function sizeFormat($bytes, $unit = "", $decimals = 2)
    {
        $units = array(
            'B' => 0,
            'KB' => 1,
            'MB' => 2,
            'GB' => 3,
            'TB' => 4,
            'PB' => 5,
            'EB' => 6,
            'ZB' => 7,
            'YB' => 8
        );
        $value = 0;
        if ($bytes > 0) {
            if (!array_key_exists($unit, $units)) {
                $pow = floor(log($bytes) / log(1024));
                $unit = array_search($pow, $units);
            }
            $value = ($bytes / pow(1024, floor($units[$unit])));
        }
        if (!is_numeric($decimals) || $decimals < 0) {
            $decimals = 2;
        }
        return sprintf('%.' . $decimals . 'f ' . $unit, $value);
    }
    static function secondsToTime($sec)
    {

        if (!is_float($sec)) {
            $sec = floatval($sec);
        }

        $hours = floor($sec / 3600);
        $minutes = floor(($sec - ($hours * 3600)) / 60);
        $seconds = $sec - ($hours * 3600) - ($minutes * 60);

        if ($hours < 10) {
            $hours = "0" . $hours;
        }
        if ($minutes < 10) {
            $minutes = "0" . $minutes;
        }
        if ($seconds < 10) {
            $seconds = "0" . $seconds;
        }

        $seconds = number_format($seconds, 2, '.', '');

        return $hours . ':' . $minutes . ':' . $seconds;

    }
    static function timeToSeconds($time)
    {
        $output = 0;
        $time_arr = explode(':', $time);
        $t = array(3600, 60, 1);
        foreach ($time_arr as $k => $tt) {
            $output += (floatval($tt) * $t[$k]);
        }
        return $output;
    }
    public function processImage($inputPath, $index, $renderOptions, $trim = true)
    {
        $user = $this->getUser();
        $tmpDirPath = $this->getPublicPath('tmp_dir', $user['id']);
        $filePath = $tmpDirPath . '/img_' . $index . '.jpg';
        if (file_exists($filePath)) {
            unlink($filePath);
        }
        $options = array(
            'width' => intval($renderOptions['size_arr'][0]),
            'height' => intval($renderOptions['size_arr'][1])
        );
        $outputRatio = $options['width'] / $options['height'];
        $size = getimagesize($inputPath);

        $imageManager = new ImageManager(array('driver' => 'gd'));
        $img = $imageManager->make($inputPath);

        if ($trim) {
            $img->fit($options['width'], $options['height']);
        } else {
            if ($size[0] / $size[1] > $outputRatio) {
                $img->widen($options['width'])
                    ->resizeCanvas(null, $options['height'], 'center', false, '#000000')
                    ->encode('jpg', 100);
            } else {
                $img->heighten($options['height'])
                    ->resizeCanvas($options['width'], null, 'center', false, '#000000')
                    ->encode('jpg', 100);
            }
        }

        $img->save($filePath);

        return $filePath;
    }
    public function getFilterTrim($inputName, $time, $type = 'trim', $outputName)
    {
        $timeStart = number_format($time[0] / 1000, 3, '.', '');
        $timeEnd = number_format($time[1] / 1000, 3, '.', '');
        $timeDur = number_format(($time[1] - $time[0]) / 1000, 3, '.', '');
        if ($type == 'input_trim') {
            return " -ss {$timeStart } -t {$timeDur}";
        } else {
            return ' ' . "[{$inputName}]{$type}={$timeStart}:{$timeEnd}[{$outputName}]";
        }
    }
    public function getFilterFps($inputName, $outputName, $fps = 25)
    {
        return ' ' . "[{$inputName}]fps=fps={$fps}[{$outputName}]";
    }


    public function closeTask($taskId)
    {
        // $queueStore = $this->dbGetStore('queue');
        // $task = $queueStore->get($taskId);
        $user = Auth::user();
        $task=  Queue::where('id',$taskId)->first();
        if (empty($task)) {
            return false;
        }

        $tmpDirPath = $this->getPublicPath('tmp_dir', $task['user_id']);
        $cmdFilePath = $tmpDirPath . DIRECTORY_SEPARATOR . $task['output_id'] . '.txt';
        $progressLogPath = $tmpDirPath . DIRECTORY_SEPARATOR . $task['output_id'] . '_progress_.txt';
        $outputFormat = !empty($task['options']) && !empty($task['options']['format'])
            ? $task['options']['format']
            : 'mp4';
        $outputPath = $task['output_path'];

        //Add to log
        if (file_exists($progressLogPath)) {
            $logContent = file_get_contents($progressLogPath);
            $this->logging($logContent, $task['user_id']);
        }

        if (file_exists($outputPath)) {
            // $user = $this->getUser(true, $task['user_id']);
            if ($user === false) {
                return false;
            }
           // $freeSpace = $user['files_size_max'] - $user['files_size_total'];

            //Check file size
            $fileSize = filesize($outputPath);
            // if ($fileSize > $freeSpace) {
            //     @unlink($outputPath);
            //     $this->logging('ERROR. The file size exceeds the allowed limit.', $task['user_id']);
            //     return false;
            // }

            $outputType = !empty($task['type']) ? $task['type'] : 'output';
            $uploadurl =url($this->config['public_Url'])."/".$user->id . "/" . $task->fileName;
        
            $videoProperties = $this->getVideoProperties($outputPath);
            $data = array(
                // 'id' => $task['output_id'],
                'path' => $task['output_path'],
                'url' => $uploadurl,
                'title' => $task['title'],
                'extension' => $outputFormat,
                'file_size' => filesize($outputPath),
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
                //'allowed' => true,
                'width' => 0,
                'height' => 0,
                'duration_ms' => 0,
                'user_id'=>$user->id
            );


            

            
           
           
            $data = array_merge($data, $videoProperties);

            // $mediaOutputStore = $this->dbGetStore('video_output', $user['id']);
            // $mediaOutputStore->set($data['id'], $data);
            File::insert($data);

            // $mediaOutputStore = $this->dbGetStore('video_' . $outputType, $task['user_id']);
            // $mediaOutputStore->set($task['output_id'], $data);
        }

        //Delete log files
        if (file_exists($cmdFilePath)) {
            @unlink($cmdFilePath);
        }
        if (file_exists($progressLogPath)) {
            @unlink($progressLogPath);
        }

        // $queueStore->delete($task['id']);
        $task->delete;

        return true;
    }
    
    public function render(Request $request)
    {

        $title =$request->title;
        $opts =$request->opts;
        $data =$request->data;
        if (!is_array($data)) {
            $data = json_decode($data, true);
        }
        if (empty($title)) {
            return array(
                'success' => false,
                'msg' => 'The title of the movie is empty.'
            );
        }
        if (empty($data)) {
            return array(
                'success' => false,
                'msg' => 'Data are not available.'
            );
        }

        $user = Auth::user();
        if ($user === false) {
            return array(
                'success' => false,
                'msg' => 'Forbidden.'
            );
        }

        $output = array();

        $options = $this->getRenderOptions($opts);
        //$fileStore = $this->dbGetStore('video_input', $user['id']);

        $tmpDirPath = $this->getPublicPath('tmp_dir', $user['id']);
        $inputDirPath = $this->getPublicPath('input_dir', $user['id']);
        $outputDirPath = $this->getPublicPath('output_dir', $user['id']);

        if (!is_dir(dirname($tmpDirPath))) {
            mkdir(dirname($tmpDirPath));
        }
        if (!is_dir($tmpDirPath)) {
            mkdir($tmpDirPath);
        }
        if (!is_dir(dirname($outputDirPath))) {
            mkdir(dirname($outputDirPath));
        }
        if (!is_dir($outputDirPath)) {
            mkdir($outputDirPath);
        }

        //Input data
        $inputData = array();
        $videoInputLength = 0;
        $imagesCount = 0;
        foreach ($data as $index => $input) {
            $media =  File::find( $input['id']);
            if (empty($media)) {
                continue;
            }
            $filePath = $this->getMediaFilePath('input', $user['id'], $media);
            if (file_exists($filePath)) {
                $type = !empty($input['type']) ? $input['type'] : 'video';
                $media['type'] = $type;
                $media['time'] = isset($input['time']) ? $input['time'] : null;
                $media['duration'] = 0;
                if ($type === 'image') {
                    $imagesCount++;
                    $media['file_path'] = $this->processImage($filePath, $index + 1, $options);
                } else {
                    $media['file_path'] = $filePath;
                    $videoInputLength += $media['time'][1] - $media['time'][0];
                }
                if (!empty($input['duration'])) {
                    $media['duration'] = $input['duration'];
                }
                if (!empty($input['text'])) {
                    $media['text'] = $input['text'];
                }
                if (!empty($input['audio'])) {
                    $media['audio_path'] = '';
                    // $fileStore = $this->dbGetStore('video_input', $user['id']);
                    // $item = $fileStore->get($input['audio']);
                       $item = File::where('id',$input['audio'])->first();
                    if ($input) {
                        //$filePath = $inputDirPath . DIRECTORY_SEPARATOR . $item['id'] . '.' . $item['ext'];
                        $filePath =$item->path;
                        if (file_exists($filePath)) {
                            $media['audio_path'] = $filePath;
                        }
                    }
                }
                $inputData[] = $media;
            }
        }

        $outputFileName = time() . '_' . uniqid();
        if (!is_dir($outputDirPath)) {
            mkdir($outputDirPath);
        }
        $outputPath = $outputDirPath . DIRECTORY_SEPARATOR . $outputFileName . '.' . $options['format'];

        $inputIndex = 0;
        $cmdFilters = '';
        $cmdInput = '';
        $inputs = array();
        $inputTypes = array();
        $inputsAudio = array();
        $videoOutName = '';
        $audioOutName = '';
        $totalDuration = 0;
        $audioBackgroundIndex = -1;

        $cmd = $this->config['ffmpeg_path'] . '{{input}}{{output}}';

        //Black input
        $cmdInput .=  ' -f lavfi -i color=c=black';
        $inputIndex++;

        // Intro & outro
        $needIntroOutro = false;
        // if ( $this->config['video_clips']['enabled']) {

        //     $needIntroOutro = true;
        //     $cmdInput .= ' -i "' . $this->config['video_clips']['intro'] . '"';
        //     $cmdInput .= ' -i "' . $this->config['video_clips']['outro'] . '"';
        //     $inputIndex += 2;
        // }

        if (!empty($options['audio'])) {
            $cmdInput .=  " -i \"{$options['audio']}\"";
            $audioBackgroundIndex = $inputIndex;
            $inputIndex++;
        }

        // Calculate images duration
        $imageDuration = 0;
        /*if (!empty($options['longtext']) && $imagesCount && $videoInputLength) {
            $c = ceil(mb_strlen($options['longtext']) / 800);
            $totalDur = $c * 20000;
            $imageDuration = ceil(($totalDur - $videoInputLength) / $imagesCount);
            $imageDuration = max(3000, $imageDuration);
        }*/

        //Video input
        foreach ($inputData as $index => $input) {
            $ind = $inputIndex;
            $videoOutName = $ind . ':v';

            $dur = 0;
            if ($input['type'] == 'image') {
                $cmdInput .= ' -loop 1 -r ' . $options['fps'];
                $dur = $imageDuration ? $imageDuration / 1000 : $input['duration'];
                $cmdInput .= ' -t ' . number_format($dur, 3, '.', '');
            }

            if (!empty($input['time']) && is_array($input['time'])) {
                $cmdInput .= $this->getFilterTrim($videoOutName, $input['time'], 'input_trim', $ind . '_trimmed');
                $dur = ($input['time'][1] - $input['time'][0]) / 1000;
            }

            $totalDuration += $dur;

            $cmdInput .=  " -i \"{$input['file_path']}\"";

            $cmdFilters .= $this->getFilterFps($videoOutName, $ind . '_fps') . ';';
            $videoOutName = $ind . '_fps';

            if ($input['type'] !== 'image') {
                $tmp = $this->getFilterScale($videoOutName, $options['size_arr'][0], $options['size_arr'][1],
                    array($input['width'], $input['height']), $ind . '_scaled');
                if ($tmp) {
                    $cmdFilters .= $tmp . ';';
                    $videoOutName = $ind . '_scaled';
                }
            }

            if (!empty($input['text'])) {
                $cmdFilters .= $this->getFilterLongText($videoOutName, $input['text'], $ind . '_txt', array_merge($options, ['text_action' => 'static_bottom'])) . ';';
                $videoOutName = $ind . '_txt';
            }

            array_push($inputs, $videoOutName);
            array_push($inputTypes, $input['type']);
            $inputIndex++;
        }

        //Concat video
        if (count($inputs) > 1) {
            $videoOutName = 'video_out';
            $cmdFilters .= $this->getFilterConcat($inputs, $videoOutName, 'video', $inputTypes, $options['aspect']) . ';';
        }

        if (!empty($this->config['watermark_text'])) {
            $cmdFilters .= $this->getFilterText($videoOutName, $this->config['watermark_text'], 'video_out_watermarked') . ';';
            $videoOutName = 'video_out_watermarked';
        }

        // Add sliding text on whole video
        if (!empty($options['longtext'])) {
            $cmdFilters .= $this->getFilterLongText($videoOutName, $options['longtext'], 'video_longtext', $options) . ';';
            $videoOutName = 'video_longtext';
        }

        //Audio input
        foreach ($inputData as $index => $input) {
            $ind = $index + 1;
            if ($audioBackgroundIndex > -1) {
                $ind++;
            }
            $audioOutName = $ind . ':a';
            $time = 0;
            if (!empty($input['time'])) {
                $time = array(0, ($input['time'][1] - $input['time'][0]));
            } else if (!empty($input['duration'])) {
                $dur = $input['type'] == 'image' && $imageDuration ? $imageDuration : intval($input['duration']);
                $time = array(0, $dur * 1000);
            }

            if (!empty($input['audio_path'])) {

                $cmdInput .=  " -i \"{$input['audio_path']}\"";
                $inputIndex++;
                $audioOutName = ($inputIndex - 1) . ':a';

                $cmdFilters .= $this->getFilterTrim($audioOutName, $time, 'atrim', $ind . '_trimmed') . ';';
                $audioOutName = $ind . '_trimmed';

            } else if (!$this->audioStreamExists($input['file_path'])) {

                $cmdInput .= ' -f lavfi -i anullsrc=r=44100';
                $inputIndex++;
                $audioOutName = ($inputIndex - 1) . ':a';

                $cmdFilters .= $this->getFilterTrim($audioOutName, $time, 'atrim', $ind . '_trimmed') . ';';
                $audioOutName = $ind . '_trimmed';
            }

            array_push($inputsAudio, $audioOutName);
        }

        // Intro & outro video
        if ($needIntroOutro) {
            $inputs = ['1:v', $videoOutName, '2:v'];
            $videoOutName = 'video_out_with_ad';
            $cmdFilters .= $this->getFilterConcat($inputs, $videoOutName, 'video') . ';';
        }

        // Concat audio
        if (count($inputsAudio) > 1) {
            $audioOutName = 'audio_out';
            $cmdFilters .= $this->getFilterConcat($inputsAudio, $audioOutName, 'audio') . ';';
        }

        // Audio music background
        if ($audioBackgroundIndex > -1) {
            $cmdFilters .= " [{$audioOutName}][{$audioBackgroundIndex}:a]amix=inputs=2:duration=first:dropout_transition=3[audio_with_music];";
            $audioOutName = 'audio_with_music';

            //Fade audio
            $cmdFilters .= " [{$audioOutName}]" . 'afade=t=out:st=' . max(0,  $totalDuration - 6) . ':d=6[audio_with_fade];';
            $audioOutName = 'audio_with_fade';
        }

        // // Intro & outro audio
        // if ($needIntroOutro) {
        //     $inputsAudio = ['1:a', $audioOutName, '2:a'];
        //     $audioOutName = 'audio_with_ad';
        //     $cmdFilters .= $this->getFilterConcat($inputsAudio, $audioOutName, 'audio') . ';';
        //     $totalDuration += $this->config['video_clips']['duration'][0];
        //     $totalDuration += $this->config['video_clips']['duration'][1];
        // }

        if ($cmdFilters) {
            $cmdFilters = $this->addFiltersCommand($cmdFilters);
        }

        if (strpos($videoOutName, ':') === false) {
            $videoOutName = "[{$videoOutName}]";
        }
        $cmd .=  ' -map "' . $videoOutName . '"';
        if ($audioOutName) {
            if (strpos($audioOutName, ':') === false) {
                $audioOutName = "[{$audioOutName}]";
            }
            $cmd .= ' -map "' . $audioOutName . '"';
        }

        $cmd = str_replace(['{{input}}', '{{output}}'], [$cmdInput, $cmdFilters], $cmd);

        $cmd .= ' -s ' . $options['size'];
        $cmd .= ' -aspect ' . number_format(
            $options['size_arr'][0] / $options['size_arr'][1],
            6,
            '.',
            ''
            );
        $cmd .= ' -r ' . $options['fps'] . ' -force_key_frames "expr:gte(t,n_forced*2)"';

        $codecString = $this->getCodecString($options);
        $cmd .= ' '. $codecString;

        $cmd .= ' -t ' . number_format($totalDuration, 3, '.', '') . ' -async 1';
        $cmd .= ' -y "' . $outputPath . '"';

        $this->logging($cmd, $user['id']);

        //Add to queue
       
        $queue = array(
            'user_id' => $user['id'],
            'output_id' => $outputFileName,
            'output_path' => $outputPath,
            'title' => $title,
            'type' => 'output',
            'options' =>json_encode( $options ),
            'status' => 'pending',
            'duration' => $totalDuration,
            //'time_stump' => time(),
            'fileName'=> $outputFileName . '.' . $options['format']
                         
        );
       
        //$queueStore->set($outputFileName, $queue);
        //dd($queue);
        Queue::insert($queue);

       // $queueStore->set($outputFileName, $queue);

        $cmdFilePath = $tmpDirPath . DIRECTORY_SEPARATOR . $outputFileName . '.txt';
        file_put_contents($cmdFilePath, $cmd);

        $progressLogPath = $tmpDirPath . DIRECTORY_SEPARATOR . $outputFileName . '_progress_.txt';
        if (file_exists($progressLogPath)) {
            @unlink($progressLogPath);
        }
        file_put_contents($progressLogPath, 'DURATION TOTAL: ' . $this->secondsToTime($totalDuration) . PHP_EOL);

        

        $output['data'] =$this->getUserQueueStatus();
        $output['success'] = true;

        return $output;
    }



    public function addFiltersCommand($cmdFilters)
    {
        $output = '';
        if ($cmdFilters) {
            if (substr($cmdFilters, -1) == ';') {
                $cmdFilters = substr($cmdFilters, 0, -1);
            }
            $output =  ' -filter_complex "' . $cmdFilters .  '" ';
        }
        return $output;
    }
    public function getFilterScale($inputName, $width, $height, $inputSizeArr = array(), $outputName, $forceAspect = true)
    {
        if ($inputSizeArr[0] == $width && $inputSizeArr[1] == $height) {
            return '';
        }

        $cmd = '';
        $uniqid = str_replace(':', '', $inputName);

        $tmpWidth = $width;
        $tmpHeight = $height;
        $outAspect = $width / $height;
        $inpAspect = $inputSizeArr[0] / $inputSizeArr[1];

        if ($forceAspect) {
            $tmpHeight = $outAspect > $inpAspect ? $height : floor($width / $inpAspect);
            $tmpWidth = $outAspect > $inpAspect ? floor($height * $inpAspect) : $width;
        }

        $cmd .= ' '. "[{$inputName}]scale={$tmpWidth}:{$tmpHeight}";
        if ($forceAspect) {
            $cmd .= " :force_original_aspect_ratio=increase";
        }
        $cmd .= "[{$uniqid}_tmpsize];";

        $xoffset = $tmpWidth < $width ? ($width - $tmpWidth) / 2 : 0;
        $yoffset = $tmpHeight < $height ? ($height - $tmpHeight) / 2 : 0;
        $cmd .= ' '. "[{$uniqid}_tmpsize]pad={$width}:{$height}:x={$xoffset}:y={$yoffset}:color=black[{$outputName}]";

        return $cmd;
    }

     /**
     * Convert video
     * @param $itemId
     * @param $type
     * @param $opts
     * @return array
     */
    public function convert(Request  $request)
    {
        $itemId=$request->itemId;
        $type=$request->type;
        $opts=$request->opts;
        $user = Auth::user();
        if ($user==null || empty($user['id'])) {
            return array(
                'success' => false,
                'msg' => 'Forbidden.'
            );
        }

        $output = array();
        // $fileStore = $this->dbGetStore('video_' . $type, $user['id']);
        // File::where('user_id',$user->id)->get();

        // $inputMedia = $fileStore->get($itemId);
        $inputMedia = File::where('user_id',$user->id)->where('id',$itemId)->first();
        if ($inputMedia === false) {
            return array(
                'success' => false,
                'msg' => 'File not found.'
            );
        }

        $outputFileName = time() . '_' . uniqid();
        $tmpDirPath = $this->getPublicPath('tmp_dir', $user['id']);
        $outputDirPath = $this->getPublicPath($type . '_dir', $user['id']);

        if (!is_dir($tmpDirPath)) {
            mkdir($tmpDirPath);
        }
        if (!is_dir($outputDirPath)) {
            mkdir($outputDirPath);
        }

        $options = $this->getRenderOptions($opts);
        $filePath = $this->getMediaFilePath('input', $user['id'], $inputMedia);
        if (!file_exists($filePath)) {
            return array(
                'success' => false,
                'msg' => 'File not found.'
            );
        }

        $cmdFilters = '';
        $videoOutName = '';
        $outputPath = $outputDirPath . DIRECTORY_SEPARATOR . $outputFileName . '.' . $options['format'];

        $cmd = $this->config['ffmpeg_path'];
        $cmd .=  ' -i "' . $filePath . '"';
        $cmd .= ' -pix_fmt yuv420p';

        $tmp = $this->getFilterScale('0:v', $options['size_arr'][0], $options['size_arr'][1],
            array($inputMedia['width'], $inputMedia['height']), 'v_scaled');
        if ($tmp) {
            $cmdFilters .= $tmp . ' ;';
            $videoOutName = ' v_scaled';
        }

        if ($cmdFilters) {
            $cmd .= $this->addFiltersCommand($cmdFilters);
            $cmd .= ' -map "[' . $videoOutName . ']"';
            if (isset($inputMedia['streams']) && $inputMedia['streams'] > 1) {
                $cmd .= ' -map "0:a"';
            }
        }

        $cmd .=  ' -s ' . $options['size'];
        $cmd .= ' -aspect ' . number_format($options['size_arr'][0] / $options['size_arr'][1], 6, '.',
                '');
        $cmd .=  ' -r ' . $options['fps'];

        $codecString = $this->getCodecString($options);
        $cmd .= ' '. $codecString;
        $cmd .=  ' -y "' . $outputPath . '"';

        $this->logging($cmd);

        //Add to queue
        // $queueStore = $this->dbGetStore('queue');
        $queue = array(
            'user_id' => $user['id'],
            'output_id' => $outputFileName,
            'output_path' => $outputPath,
            'title' => $inputMedia['title'],
            'duration' => $inputMedia['duration_ms'] / 1000,
            'type' => $type,
            'options' =>json_encode( $options ) ,
            'status' => 'pending',
            'fileName'=> $outputFileName . '.' . $options['format']
            // 'time_stump' => time()
        );
        //$queueStore->set($outputFileName, $queue);
        //dd($queue);
        Queue::insert($queue);

        $cmdFilePath = $tmpDirPath . DIRECTORY_SEPARATOR . $outputFileName . '.txt';
        file_put_contents($cmdFilePath, $cmd);

       
       // list($pendingCount, $processingCount, $percent, $userStatus) = $queueController->getUserQueueStatus();
        $output['data']=$this->getUserQueueStatus();
        $output['success'] = true;

        return $output;
    }


    public function getMediaList()
    {
        $user = Auth::user();
        if ($user == null) {
            return array(
                'success' => false,
                'msg' => 'Forbidden.'
            );
        }

        // $fileStore = $this->dbGetStore('video_' . $type, $user['id']);
        // $data = $fileStore->getAll();
         $data= File::where('user_id',$user->id)->get();
        //$data = array_reverse($data);

        foreach ($data as &$item) {
          //  $item['datetime'] = date('m.d.Y H:i:s', $item['created_at']);
            $item['datetime'] = $item['created_at'];
            $item['ext'] = $item['extension'];

            $item['file_size'] = self::sizeFormat($item['file_size']);
            $item['duration_time'] = !empty($item['duration_ms'])
                ? self::secondsToTime($item['duration_ms'] / 1000)
                : 0;
            $item['url'] = $item['path'];
            // $item['url'] .= $user['id'] . DIRECTORY_SEPARATOR . $item['id'] . '.' . $item['ext'];
            if (empty($item['width'])) {
                $item['width'] = 0;
            }
            if (empty($item['height'])) {
                $item['height'] = 0;
            }
        }

        return array(
            'success' => true,
            'data' => !empty($data) ? $data : []
        );
    }
    public function deleteItem(Request $request)
    {

        $itemId= $request->itemId;
        $type=$request->type;

        $user = Auth::user();
        if ($user == null) {
            return array(
                'success' => false,
                'msg' => 'Forbidden.'
            );
        }

        $output = [];
        //$fileStore = $this->dbGetStore('video_' . $type, $user['id']);
    $item=File::find($itemId);

        

        if ($item !=null ) {

            if($item->user_id != $user->id)
            return array(
                'success' => false,
                'msg' => 'Forbidden.'
            );

            // $filePath = $this->getPublicPath($type . '_dir', $user['id']);
            // $filePath .= DIRECTORY_SEPARATOR . $item['id'] . '.' . $item['ext'];

            $filePath=$item->path;
            if (file_exists($filePath)) {
                unlink($filePath);
            }
           // $fileStore->delete($item['id']);
           $item->delete();
            $output['success'] = true;

        }

        return $output;
    }

    public function getRenderOptions($opts)
    {
        $output = array();
        $sizes = array(
            '4:3' => array(
                '360p' => '480x360',
                '480p' => '640x480',
                '540p' => '720x540',
                '720p' => '960x720',
                '1080p' => '1440x1080'
            ),
            '16:9' => array(
                '360p' => '640x360',
                '480p' => '768x432',
                '540p' => '1024x576',
                '720p' => '1280x720',
                '1080p' => '1920x1080'
            )
        );
        $quality_arr = array(
            'low' => '600k',
            'medium' => '2000k',
            'high' => '5000k'
        );

        $output['aspect'] = isset($sizes[$opts['aspect']])
            ? $opts['aspect']
            : '16:9';

        $output['size'] = isset($sizes[$output['aspect']][$opts['size']])
            ? $sizes[$output['aspect']][$opts['size']]
            : $sizes[$output['aspect']]['360p'];
        $output['size_arr'] = explode('x', $output['size']);

        $output['quality'] = isset($quality_arr[$opts['quality']])
            ? $quality_arr[$opts['quality']]
            : $quality_arr['medium'];

        $output['format'] = in_array($opts['format'], $this->config['upload_allowed'])
            ? $opts['format']
            : 'mp4';

        $output['text'] = !empty($opts['text'])
            ? trim($opts['text'])
            : '';

        $output['longtext'] = !empty($opts['longtext'])
            ? trim($opts['longtext'])
            : '';

        $output['text_action'] = !empty($opts['text_action'])
            ? $opts['text_action']
            : 'static_top';

        $output['text_color'] = !empty($opts['text_color'])
            ? $opts['text_color']
            : 'white';

        $output['text_background_color'] = !empty($opts['text_background_color'])
            ? $opts['text_background_color']
            : 'black';

        $output['fps'] = '25';

        $output['audio'] = '';
        if (!empty($opts['audio'])) {
            $user = Auth::user();
           // $fileStore = File::where('user_id',$user->id)->where('id',$itemId)->first();
            //$this->dbGetStore('video_input', $user['id']);
          
           // $item = $fileStore->get($opts['audio']);
           $item = File::where('user_id',$user->id)->where('id',$itemId)->first();
            if ($item) {
                // $uploadPath = $this->getPublicPath('input_dir', $user['id']);
                // $itemPath = $uploadPath . DIRECTORY_SEPARATOR . $item['id'] . '.' . $item['ext'];
                $output['audio'] = $item->path;
            }
        }
        // else if (!empty($opts['audio_library'])) {
        //     $categoryName = !empty($opts['audio_category']) ? urldecode($opts['audio_category']) : '';
        //     $audioLibraryDirPath = $this->config['public_path'] . 'userfiles/audio_library/' . $categoryName;
        //     $itemPath = $audioLibraryDirPath . '/' . urldecode($opts['audio_library']);
        //     if (file_exists($itemPath)) {
        //         $output['audio'] = $itemPath;
        //     }
        // }

        return $output;
    }
    public function execInBackground($cmd)
    {
        $pid = '';
        if (substr(php_uname(), 0, 7) == "Windows") {
            
            pclose(popen("start /B " . $cmd, "r"));
        } else {
            $pid = shell_exec("nohup $cmd > /dev/null & echo $!");
        }
        return trim($pid);
    }

    public function getNextTask($userId = 0)
    {
        // $queueStore = $this->dbGetStore('queue');
        // $keys = $queueStore->getKeys();
        // $output = false;

        // foreach ($keys as $taskId) {
        //     $item = $queueStore->get($taskId);
        //     if ($item['status'] == 'pending' && (!$userId || $userId == $item['user_id'])) {
        //         $output = $item;
        //         $output['id'] = $taskId;
        //         break;
        //     }
        // }

        $user = Auth::user();
        $userId=$user->id;
        $tasks = Queue::where('user_id',$userId)->get();
        $output =[];
        foreach ($tasks as $item) {
           
            if ($item->status == 'pending' ) {
                        $output = $item;
                        //$output['id'] = $taskId;
                        break;
                    }



        }
            
        return $output;
    }


    public function process()
    {
        $task = $this->getNextTask();
        if ($task === false) {
            return false;
        }

        // $queueStore = $this->dbGetStore('queue');
        
        $task['status'] = 'processing';
        //dd($task);

        $tmpDirPath = $this->getPublicPath('tmp_dir', $task->user_id);
        $cmdFilePath = $tmpDirPath . DIRECTORY_SEPARATOR . $task->output_id . '.txt';
        if (!file_exists($cmdFilePath)) {
            // $queueStore->delete($task['id']);
            $itemTodelete=Queue::find($task->id)->first();
            $itemTodelete->delete();

            return false;
        }

        $progressLogPath = $tmpDirPath . DIRECTORY_SEPARATOR . $task->output_id . '_progress_.txt';

        $cmd = file_get_contents($cmdFilePath);
        $cmd .= '  -stats 2>> "' . $progressLogPath . '"';

        $pid = $this->execInBackground($cmd);
        if($pid !=""){
        $task->pid = $pid;

        $task->save();
        }
        // $queueStore->set($task['id'], $task);

        return $task;
    }


    public function updateItemData(Request  $request)
    { 
        $itemId= $request->itemId;
        $type=$request->type;
        $value=$request->value;
          $user = Auth::user();
        if ($user == null) {
            return array(
                'success' => false,
                'msg' => 'Forbidden.'
            );
        }

        // $fileStore = $this->dbGetStore('video_' . $type, $user['id']);
        // $item = $fileStore->get($itemId);
        $item=File::find($itemId);

        if (empty($item)) {
            return array(
                'success' => false,
                'msg' => 'Media not found.'
            );
        }

        // $item = array_merge($item, $data);
        // $fileStore->set($itemId, $item);
           $item->title=$value;
           $item->save(); 
        return array(
            'success' => true,
            'data' => $item
        );
    }
    public function getUserQueueStatus()
    {

        $user =Auth::user();
        $userId;
      
            if ($user ==null || empty($user['id'])) {
                return array(0, 0, 0, 'not_logged_in');
           
        }else{
            $userId=$user->id;

        }

        //$queueStore = $this->dbGetStore('queue');
        $queues = Queue::where('user_id',$userId)->get();

       // $keys = $queueStore->getKeys();
        $pendingCount = 0;
        $processingCount = 0;
        $percent = 0;
        $currentTaskStatus = '';
        $currentTaskId = '';

         foreach ($queues as $item ) {
            if ($item['user_id'] == $userId && !$currentTaskStatus) {
                $currentTaskId = $item->taskId;
                $currentTaskStatus = $item['status'];
            }
            if ($item['status'] == 'pending') {
                $pendingCount++;
            }
            if ($item['status'] == 'processing') {
                $processingCount++;
            }
         }

        // foreach ($keys as $taskId) {
        //     $item = $queueStore->get($taskId);
        //     if ($item['user_id'] == $userId && !$currentTaskStatus) {
        //         $currentTaskId = $taskId;
        //         $currentTaskStatus = $item['status'];
        //     }
        //     if ($item['status'] == 'pending') {
        //         $pendingCount++;
        //     }
        //     if ($item['status'] == 'processing') {
        //         $processingCount++;
        //     }
        // }

        if ($pendingCount > 0 && (!$this->config['queue_size'] || $processingCount < $this->config['queue_size'])) {
            $newTask = $this->process();
            if ($newTask !== false && !$currentTaskId && $newTask['user_id'] == $userId) {
                $currentTaskId = $newTask['id'];
                $currentTaskStatus = 'processing';
            }
        }

        if ($currentTaskId && $currentTaskStatus == 'processing') {

            $percent = $this->getPercent($currentTaskId);

        }

        // array($pendingCount, $processingCount, $percent, $currentTaskStatus);
        
        $output = array(
            'success' => true,
            'status' => $currentTaskStatus,
            'pendingCount' => $pendingCount,
            'processingCount' => $processingCount,
            'percent' => $percent
        );
        return $output;
    }
     /**
     * Get FFMpeg duration
     * @param string $content
     * @return array|int|mixed
     */
    public function getFfmpegDuration($content = '')
    {
        $duration = 0;
        $output = 0;

        if ($content) {

            preg_match('/DURATION TOTAL: (.*)/', $content, $matches);
            if(!empty($matches) && !empty($matches[1])){
                return self::timeToSeconds($matches[1]);
            }

            preg_match_all("/Input #([^\,]), .* '(.+)'/", $content, $matches);
            $inputs = array();
            $isAudioExists = false;
            if (!empty($matches) && !empty($matches[2])) {
                foreach ($matches[2] as $inp) {
                    $ext = $this->getExtension($inp);
                    if (in_array($ext, array('mp3', 'wav'))) {
                        $isAudioExists = true;
                    }
                    array_push($inputs, $inp);
                }
            }

            preg_match_all("/Duration: (.*?), start:/", $content, $matches);
            $rawDuration = $matches[1];

            if (is_array($rawDuration) && count($rawDuration) > 1) {
                foreach ($rawDuration as $index => $dur) {
                    $ext = $this->getExtension($inputs[$index]);
                    if (!$ext) {
                        continue;
                    }
                    if ($isAudioExists) {
                        if (in_array($ext, array('mp3', 'wav'))) {
                            $duration += self::timeToSeconds($dur);
                        }
                    } else {
                        $duration += self::timeToSeconds($dur);
                    }
                }
                $output = $duration;
            } else {
                $output = self::timeToSeconds($rawDuration[0]);
            }
        }

        return $output;
    }
    public function getCodecString($options)
    {
        $codecString = isset($this->config['ffmpeg_string_arr'][$options['format']])
            ? $this->config['ffmpeg_string_arr'][$options['format']]
            : '';

        return str_replace(array(
            '{quality}',
            '{format}',
            '{size}',
            '{aspect}'
        ), array(
            $options['quality'],
            $options['format'],
            $options['size'],
            $options['aspect']
        ), $codecString);
    }

    public function getFfmpegPercent($logPath, $totalDuration = 0)
    {

        $output = 0;
        $content = file_exists($logPath)
            ? file_get_contents($logPath)
            : '';

        if (!$totalDuration) {
            $totalDuration = $this->getFfmpegDuration($content);
        }
        if (!$totalDuration) {
            return $output;
        }

        //current time
        preg_match_all("/time=(.*?) bitrate/", $content, $matches);

        $rawTime = array_pop($matches);
        if (is_array($rawTime)) {
            $rawTime = array_pop($rawTime);
        }
        if (!empty($rawTime)) {
            $time = self::timeToSeconds($rawTime);
        } else {
            $time = $totalDuration;
        }

        $output = round(($time / $totalDuration) * 100);
        if ($output >= 99) {
            $output = 100;
        }

        return $output;
    }


    public function getPercent($taskId)
    {
        // $queueStore = $this->dbGetStore('queue');
        // $task = $queueStore->get($taskId);
        $task=  Queue::where('id',$taskId)->first();
        if (empty($task)) {
            return 0;
        }

        $tmpDirPath = $this->getPublicPath('tmp_dir', $task['user_id']);
        $progressLogPath = $tmpDirPath . DIRECTORY_SEPARATOR . $task['output_id'] . '_progress_.txt';
     
        if (!file_exists($progressLogPath)) {
            return 0;
        }

        if ($task['pid'] && !$this->is_running($task['pid'])) {
            $percent = 100;
        } else {
            $percent = $this->getFfmpegPercent($progressLogPath, $task['duration']);
        }

        if ($percent >= 99) {
            sleep(2);
            $this->closeTask($taskId);
            $percent = 100;
        }

        return $percent;
    }

   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_title = 'Create Product';
        $page_description = 'create new product';
		
		$action = "product_create";

        return view('product.create', compact('page_title', 'page_description','action'));
    }

    public function logging($str, $userId = 0)
    {
        if ($userId) {
            $logFilePath = $this->getPublicPath('tmp_dir',
                    $userId) . DIRECTORY_SEPARATOR . $this->config['log_filename'];
        } else {
            $logFilePath = $this->getPublicPath('tmp_dir') . DIRECTORY_SEPARATOR . $this->config['log_filename'];
        }
        if (is_array($str)) {
            $str = print_r($str, true);
        }

        if (!is_dir(dirname($logFilePath))) {
            mkdir(dirname($logFilePath));
        }

        if (file_exists($logFilePath) && filesize($logFilePath) >= $this->config['max_log_size']) {
            @unlink($logFilePath);
        }

        $fp = fopen($logFilePath, 'a');

        $str = PHP_EOL . PHP_EOL . date('d/m/Y H:i:s') . PHP_EOL . $str;

        fwrite($fp, $str);
        fclose($fp);

        return true;
    }
    public function getMediaFilePath($type, $userId, $mediaData)
    {
        $inputDirPath = $this->getPublicPath($type . '_dir', $userId) . DIRECTORY_SEPARATOR;

       // return $inputDirPath . $mediaData['id'] . '.' . $mediaData['extintion'];
       return $mediaData->path;
    }

    public function audioStreamExists($videoFilePath)
    {
        $ext = self::getExtension($videoFilePath);
        if (in_array($ext, array($this->config['upload_images']))) {
            return false;
        }
        $cmd = $this->config['ffprobe_path'];
        $cmd .=  " -i \"{$videoFilePath}\" 2>&1 ";
        $content = shell_exec($cmd);
        if (!preg_match('/Audio:/', $content)) {
            return false;
        }
        return true;
    }

    public function cutFast(Request $request)
    {

        $itemId= $request->itemId;
        $timeFrom=$request->timeFrom;

        $timeTo=$request->timeTo;

        $user =Auth::user();
        if ($user==null || empty($user->id)) {
            return array(
                'success' => false,
                'msg' => 'Forbidden.'
            );
        }

        $output = array();
        // $fileStore = $this->dbGetStore('video_input', $user['id']);

        // $inputMedia = $fileStore->get($itemId);
        
        $inputMedia =File::where('user_id',$user->id)->where('id',$itemId)->first();
        
        if ($inputMedia == null) {
            return array(
                'success' => false,
                'msg' => 'File not found.'
            );
        }

        $outputFileName = time() . '_' . uniqid();
        $outputDirPath = $this->getPublicPath('output_dir', $user['id']);

        if (!is_dir($outputDirPath)) {
            mkdir($outputDirPath);
        }

        $filePath = $this->getMediaFilePath('input', $user['id'], $inputMedia);
        if (!file_exists($filePath)) {
            return array(
                'success' => false,
                'msg' => 'File not found.'
            );
        }

        $ext = self::getExtension($filePath);
        $outputPath = $outputDirPath . DIRECTORY_SEPARATOR . $outputFileName . '.' . $ext;
        $uploadedPath=  $this->config['public_path'].$user->id . "\\" . $outputFileName.".".$ext;

        $cmd = $this->config['ffmpeg_path'];
        $cmd .=  ' -i "' . $filePath . '"';
        $cmd .= ' -c:v copy';
        if ($this->audioStreamExists($filePath)) {
            $cmd .= ' -c:a copy';
        }
        if ($timeFrom > 0) {
            $cmd .= ' -ss  ' . number_format($timeFrom / 1000, 2, '.', '');
        }
        $cmd .= '  -t ' . number_format(($timeTo - $timeFrom) / 1000, 2, '.', '');
        $cmd .= ' -y "' . $uploadedPath . '"';

        $this->logging($cmd);
        exec($cmd);
        //dd($cmd);

        if (file_exists($uploadedPath)) {

            $videoProperties = $this->getVideoProperties($outputPath);
            $uploadurl =url($this->config['public_Url'])."/".$user->id . "/" . $outputFileName.".".$ext;
           
            $data = array(
                'path' => $uploadedPath ,
                'url' => $uploadurl,
                'title' => $inputMedia['title'],
                'extension' => $ext,
                'file_size' => filesize($outputPath),
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'width' => 0,
                'height' => 0,
                'duration_ms' => 0,
                'user_id'=>$user->id
              //  'allowed' => true
            );
            $data = array_merge($data, $videoProperties);

            // $mediaOutputStore = $this->dbGetStore('video_output', $user['id']);
            // $mediaOutputStore->set($data['id'], $data);
            File::insert($data);

            $output['success'] = true;
        } else {
            $output['success'] = false;
        }

        return $output;
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function store(Request $request)
    {

        dd($request);
        $resturant=Auth()->user()->Restaurant()->first();

        $categories=$resturant->Categories()->get();
        if(count( $categories)==0){
        $displayOrder=1;
        }
        else{
        $brothersCats=$categories->where("parentCategory_id", $request['parentCategory_id']);
        if($brothersCats==null)
        $displayOrder=1;
        else
        $displayOrder =$brothersCats->max('displayOrder')+1;
        }
        $request['displayOrder']=$displayOrder;
        $category =$resturant->Categories()->create($request->all());
        $category->save();
          return Redirect::to('categories');
    }

    public function getPublicPath($pathKey, $userId = 0)
    {
        $output = $this->config['public_path'];
        $output .= isset($this->config[$pathKey]) ? $this->config[$pathKey] : '';
        if ($userId) {
            $output .= $userId;
        } else {
            $output = substr($output, 0, -1);
        }
        if (!is_dir($output)) {
            mkdir($output);
        }
        return $output;
    }

    public static function getExtension($filePath)
    {
        $temp_arr1 = $filePath ? explode(DIRECTORY_SEPARATOR, $filePath) : array();
        $temp_arr = count($temp_arr1) ? explode('.', end($temp_arr1)) : array();
        $ext = count($temp_arr) > 1 ? end($temp_arr) : '';
        if (strpos($ext, '?') !== false) {
            $ext = substr($ext, 0, strpos($ext, '?'));
        }
        return strtolower($ext);
    }

    public function getVideoProperties($filePath)
    {
        $ext = self::getExtension($filePath);
        $user =Auth::user();

        $output = array();
        if (in_array($ext, $this->config['upload_images'])) {

            $output['type'] = 'image';
            $imageSize = getimagesize($filePath);
            $output['width'] = intval($imageSize[0]);
            $output['height'] = intval($imageSize[1]);

        } else {

            $output['type'] = 'video';
            if (in_array($ext, $this->config['upload_audio'])) {
                $output['type'] = 'audio';
            }
            $content = shell_exec($this->config['ffprobe_path'] . ' -i "' . $filePath . '" 2>&1');

           // $this->logging($content, $user->id);
        
            $regex_size = "/Video: (?:.*), ([0-9]{1,4})x([0-9]{1,4})/";
            if (preg_match($regex_size, $content, $matches)) {
                $output['width'] = $matches[1] ? intval($matches[1]) : null;
                $output['height'] = $matches[2] ? intval($matches[2]) : null;
            }

            $regex_duration = "/Duration: ([0-9]{1,2}):([0-9]{1,2}):([0-9]{1,2}).([0-9]{1,2})/";
            if (preg_match($regex_duration, $content, $matches)) {
                $hours = $matches[1] ? intval($matches[1]) : 0;
                $mins = $matches[2] ? intval($matches[2]) : 0;
                $secs = $matches[3] ? intval($matches[3]) : 0;
                $ms = $matches[4] ? intval($matches[4]) : 0;
                $output['duration_ms'] = ($hours * 60 * 60) * 1000;
                $output['duration_ms'] += ($mins * 60) * 1000;
                $output['duration_ms'] += $secs * 1000;
                $output['duration_ms'] += $ms;
            }

            $output['streams'] = 2;
            if (preg_match_all("/Stream #([^\s]+)/", $content, $matches)) {
                $output['streams'] = count($matches[0]);
            }
        }

        return $output;
    }

    public function getItemData(Request $request)
    {
     //return $request->itemId." / ".$request->type;
        $user = Auth::user();
        if ($user == null) {
            return array(
                'success' => false,
                'msg' => 'Forbidden.'
            );
        }

        // $fileStore = $this->dbGetStore('video_' . $type, $user['id']);
        // $item = $fileStore->get($itemId);
      $item= File::find($request->itemId);
    
        if (empty($item)) {
            return array(
                'success' => false,
                'msg' => 'Media not found.'
            );
        }
        $item['url'] = $item['url'];

        $item['datetime'] = $item['created_at'];
        $item['file_size'] = self::sizeFormat($item['file_size']);
        $item['duration_time'] = !empty($item['duration_ms'])
            ? self::secondsToTime($item['duration_ms'] / 1000)
            : 0;
        // $item['url'] = $this->config['base_url'] . $this->config[$type . '_dir'];
        // $item['url'] .= $user['id'] . DIRECTORY_SEPARATOR . $item['id'] . '.' . $item['ext'];
        $item['url'] = $item['url'];
        return array(
            'success' => true,
            'data' => $item
        );
    }
    public function addFile(Request $request)
    {
        @ini_set('memory_limit', '-1');
        $output = [];

        $inputUrl = !empty($request->input_url) ? trim($request->input_url) : '';
       // $inputFile = !empty($request->allFiles('input_file')) ? $request->allFiles('input_file') : [];
        $inputFile = !empty($_FILES['input_file']) ? $_FILES['input_file'] : [];
        //dd($inputFile);
        $inputTitle = !empty($request->input_title) ? trim($request->input_title): '';
        $user = Auth::user();
        if ($user ==null) {
            return array(
                'success' => false,
                'msg' => 'Forbidden.'
            );
        }
        
        $userDirPath = $this->getPublicPath('input_dir', $user->id);
       
        //$freeSpace = $user['files_size_max'] - $user['files_size_total'];

        if (!is_dir(dirname($userDirPath))) {
            mkdir(dirname($userDirPath));
        }
        if (!is_dir($userDirPath)) {
            mkdir($userDirPath);
        }
        
        //Upload file
        if (!empty($inputFile)) {
           
            $error = '';
            for ($i = 0; $i < count($inputFile['name']); $i++) {
                if ($inputFile['error'][$i] != UPLOAD_ERR_OK) {
                    return ['msg'=>"continue"];
                    continue;
                }
                $fileName = time() . '_' . uniqid();
                $tmp_name = $inputFile['tmp_name'][$i];
                $name = $inputFile['name'][$i];
                $ext = $this->getExtension($name);

                $fileSize = filesize($tmp_name);
                $allowed_all = array_merge(
                    $this->config['upload_allowed'],
                    $this->config['upload_images'],
                    $this->config['upload_audio']
                );
                //return ['msg'=>$ext];
                if (!in_array($ext, $allowed_all)) {
                    $error = 'file_type_is_not_allowed';
                    continue;
                }
                //Check file size
               // if ($fileSize > $freeSpace) {
                   // $error = 'file_size_exceeds_allowed_limit';
                 //   continue;
             //   }

                $fileNameFull = $fileName . '.' . $ext;
                $uploadPath = $userDirPath . DIRECTORY_SEPARATOR . $fileNameFull;
                $uploadurl =url( $this->config['public_Url'])."/".$user->id . "/" . $fileNameFull;
                $uploadedPath=  $this->config['public_path'].$user->id . "\\" . $fileNameFull;
                move_uploaded_file($tmp_name, $uploadPath);

                $properties = $this->getVideoProperties($uploadPath);

                $data = array(
                    'path'=>$uploadedPath,
                    'url' => $uploadurl,
                    'title' => !empty($inputTitle) ? $inputTitle : strip_tags(str_replace('.' . $ext, '', $name)),
                    'file_size' => filesize($uploadPath),
                    'extension' => $ext,
                    'user_id'=>Auth()->user()->id,
                    'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                    'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
                );

                $data = array_merge($data, $properties);
                //Save to DB
                // $fileStore = $this->dbGetStore('video_input', $user['id']);
                // $fileStore->set($fileName, $data);
                File::insert($data);
            }

            if ($error) {
                $output = [
                    'success' => false,
                    'msg' => $error
                ];
            } else {
                $output = array('success' => true);
            }

        } //Import from URL
        else if (!empty($inputUrl)) {

            $fileName = time() . '_' . uniqid();
            $videoFileUrl = $inputUrl;
            $ext = 'mp4';
            $allowed_all = array_merge(
                $this->config['upload_allowed'],
                $this->config['upload_images'],
                $this->config['upload_audio']
            );

            if ($this->getYoutubeId($inputUrl)) {

                $result = $this->getUrlFromYouTube($inputUrl);

                if ($result === false) {
                    return array(
                        'success' => false,
                        'msg' => $this->lang['file_type_is_not_allowed']
                    );
                } else {
                    if (is_array($result) && !$result['success']) {
                        return $result;
                    }
                }
                $videoFileUrl = $result['data']['url'];

            } else {

                $ext = self::getExtension($videoFileUrl);

            }

            if (!in_array($ext, $allowed_all)) {
                return array(
                    'success' => false,
                    'msg' => $this->lang['file_type_is_not_allowed']
                );
            }

            $fileNameFull = $fileName . '.' . $ext;
            $uploadPath = $userDirPath . DIRECTORY_SEPARATOR . $fileNameFull;

            $uploaded = file_put_contents($uploadPath, file_get_contents($videoFileUrl));

            if ($uploaded && file_exists($uploadPath)) {

                //Check file size
                $fileSize = filesize($uploadPath);
                if ($fileSize > $freeSpace) {
                    @unlink($uploadPath);
                    return array(
                        'success' => false,
                        'msg' => $this->lang['file_size_exceeds_allowed_limit']
                    );
                }

                $properties = $this->getVideoProperties($uploadPath);

                $data = array(
                    'id' => $fileName,
                    'title' => !empty($inputTitle) ? $inputTitle : date('m/d/Y'),
                    'ext' => $ext,
                    'file_size' => filesize($uploadPath),
                    'time_stump' => time(),
                   'user_id'=>Auth()->user()->id,
                    'allowed' => true
                );

                $data = array_merge($data, $properties);

                //Save to DB
                // $fileStore = $this->dbGetStore('video_input', $user['id']);
                // $fileStore->set($fileName, $data);
                File::insert($data);

                $output = array('success' => true);

            } else {
                $output = [
                    'success' => false,
                    'msg' => $this->lang['error_while_downloading_video']
                ];
            }
        }
    
        return $output;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
