<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use FFMpeg;
use App\Log;
use Response;
use Session;

class VideoController extends Controller
{
    public function submit(Request $request)
    {
      $this->validate($request, [
        'file' => 'required|mimetypes:video/mp4|max:2048',
      ]);

      $name = $_FILES ['file'] ['name'];
      $temp = $_FILES ['file'] ['tmp_name'];
      $extension = $_REQUEST ['extension'];
      $info = pathinfo ( $name );
      $convName = "$name.$extension";
      $finalPath = storage_path().'\Uploaded\\'.$name;
      $uploadPath = storage_path().'\Uploaded\\';
      $convertedPath = storage_path().'\Converted\\';

      move_uploaded_file ( $temp, $uploadPath.$name);

      $ffmpeg = FFMpeg\FFMpeg::create([
            'ffmpeg.binaries'  => storage_path().'/ffmpeg.exe',
            'ffprobe.binaries' => storage_path().'./ffprobe.exe',
            'timeout'          => 3600,
            'ffmpeg.threads'   => 1,
        ]);

      $video = $ffmpeg->open($finalPath);

      $video->gif(FFMpeg\Coordinate\TimeCode::fromSeconds(2), new FFMpeg\Coordinate\Dimension(640, 480), 3)
        ->save($convertedPath.$convName);

      Session::flash('download.in.the.next.request', $convertedPath.$convName);
      //return redirect('/video')->with('success', 'Conversion completed. ');
      return Response::download($convertedPath.$convName, $convName);
    }
}
