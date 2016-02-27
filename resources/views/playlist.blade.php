<html>
	<head>
		<title>Playlist</title>

		<link href="{{ asset('css/playlist.scss') }}" media="all" rel="stylesheet" type="text/css" />

	</head>
	<body>
		<div id="container">

			<a href="{{ action('PlaylistController@show') }}">link</a>
			@foreach ($tracks as $track)
				<li>{{ $track['youtube_id'] }}</li>
			@endforeach
		</div>
	</body>
</html>
