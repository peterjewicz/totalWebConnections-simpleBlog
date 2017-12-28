<!DOCTYPE html>
<html>
<head>
	<title>Current Media</title>
    <!-- TODO Change this to use sass so we can compile a
    single CSS file to include for back-end styles -->
    <link rel="stylesheet" href="{{ asset('totalWebConnections/simpleBlog/bower/bootstrap/dist/css/bootstrap.min.css') }}">
</head>
<body>
    <div class="mainWrapper container">
		@foreach($mediaItems as $media)
			<img src="{{$media->imageUrl}}" width="50%" alt="{{$media->media_alt}}" />
			<!-- REMOVE THIS LATER -->
			<p>{{$media->imageUrl}}</p>
		@endforeach
    </div>
</body>
</html>
