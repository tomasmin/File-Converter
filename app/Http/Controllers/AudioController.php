<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use FFMpeg;

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
      $finalPath = 'C:/xampp2/htdocs/basicwebsite/UPLOADS/'.$name;

      move_uploaded_file ( $temp, 'C:/xampp2/htdocs/basicwebsite/UPLOADS/'.$name);

      $ffmpeg = FFMpeg\FFMpeg::create([
            'ffmpeg.binaries'  => 'C:/ffmpeg-20190225-f948082-win64-static/bin/ffmpeg.exe',
            'ffprobe.binaries' => 'C:/ffmpeg-20190225-f948082-win64-static/bin/ffprobe.exe',
            'timeout'          => 3600,
            'ffmpeg.threads'   => 1,
        ]);

      $audio = $ffmpeg->open($finalPath);

      $audio
        ->save(new FFMpeg\Format\Audio\Wav(), 'C:/xampp2/htdocs/basicwebsite/CONVERTED/'.$convName);

      return redirect('/audio');
    }
}
