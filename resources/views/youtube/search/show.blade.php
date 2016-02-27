

@foreach ($videos as $vid)
  <img src="{{$vid['thumbnail']}}">
  <li> {{$vid['id']}}</li>
@endforeach
