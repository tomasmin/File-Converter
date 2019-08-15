@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

<div class="container text-center">
  <h1 class="mt-5 text-white font-weight-light">Video Converter</h1>
  <p class="lead text-white-50">Accepted file formats: mp4. Maximum file size: 2 MB</p>
</div>

@include('inc.messages')

{!! Form::open(['url' => 'video/submit', 'files' => true, 'id' => 'dropFileForm', 'method' => 'post']) !!}
  <div class="container text-center" id="dropBox">
    {{Form::file('file', ['id' => 'fileInput', 'onchange' => 'addFiles(event)'])}}
    <label for="fileInput" id="fileLabel" ondragover="overrideDefault(event);fileHover();" ondragenter="overrideDefault(event);fileHover();" ondragleave="overrideDefault(event);fileHoverEnd();" ondrop="overrideDefault(event);fileHoverEnd();dropFiles(event);">
        <i class="fa fa-download fa-5x" style="color: limeGreen; padding: 8px"></i>
        <br>
        <span class="lead text-black-50" id="fileLabelText">
          Choose a file or drag it here
        </span>
        <br>
        <span id="uploadStatus"></span>
    </label>
  </div>

  <div class="form-group text-center">
    <span class="lead text-black-50">Convert to:</span> {{Form::select('extension', array('gif' => 'gif'), null, ['style' => 'border-radius: 4px'])}}
  </div>

  <div class="text-center">
    {{Form::submit('Convert', ['class' => 'btn btn-primary'])}}
  </div>
{!! Form::close() !!}

@endsection

{!! Html::script('js/dropbox.js') !!}
