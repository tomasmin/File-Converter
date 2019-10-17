@if(count($errors) > 0)
  @foreach($errors->all() as $error)
    <div class="alert alert-danger" style="text-align: center">
      {{$error}}
    </div>
  @endforeach
@endif

@if(session('success'))
  <div class="alert alert-success" style="text-align: center">
    {{session('success')}}
    @if(Session::has('download.in.the.next.request'))
         <a href="{{ Session::get('download.in.the.next.request') }}" download>DOWNLOAD</a>
    @endif
  </div>
@endif
