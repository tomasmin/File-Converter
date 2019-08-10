<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use FFMpeg;
use App\Log;
use Response;

class AudioController extends Controller
{
    public function submit(Request $request)
    {
      $this->validate($request, [
        'file' => 'required|mimetypes:audio/mpeg|max:2048',
      ]);

      $name = $_FILES ['file'] ['name'];
      $temp = $_FILES ['file'] ['tmp_name'];
      $extension = $_POST ['extension'];
      $info = pathinfo ( $name );
      $convName = "$name.$extension";
      $finalPath = storage_path().'/Uploaded//'.$name;
      $uploadPath = storage_path().'/Uploaded//';
      $convertedPath = storage_path().'/Converted//';

      move_uploaded_file ( $temp, $uploadPath.$name);

      $ffmpeg = FFMpeg\FFMpeg::create([
            'ffmpeg.binaries'  => 'C:/ffmpeg/bin/ffmpeg.exe',
            'ffprobe.binaries' => 'C:/ffmpeg/bin/ffprobe.exe',
            'timeout'          => 3600,
            'ffmpeg.threads'   => 1,
        ]);

      $audio = $ffmpeg->open($finalPath);

      $audio
        ->save(new FFMpeg\Format\Audio\Wav(), $convertedPath.$convName);

      //return redirect('/audio')->with('success', 'Conversion completed');
      return Response::download($convertedPath.$convName, $convName);
    }

}
