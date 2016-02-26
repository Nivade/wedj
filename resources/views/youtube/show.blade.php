
@foreach ($videos as $vid)
<li>
	<img src="{{ $vid['thumbnail'] }}">
	<b>{{ $vid['title'] }}</b>
	<p>{{ $vid['description'] }}</p>
</li>
@endforeach