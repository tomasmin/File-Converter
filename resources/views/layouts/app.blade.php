<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Audio/Video Converter</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/app.css" />
</head>
<body onDragStart="return false;" ondragenter="return false;" ondragover="return false;" ondrop="return false;">
    <div id="app">
      @include('inc.navbar')
      @yield('content')
    </div>
    <script src="js/app.js"></script>
</body>
</html>
