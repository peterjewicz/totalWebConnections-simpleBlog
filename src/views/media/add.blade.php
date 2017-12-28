<!DOCTYPE html>
<html>
<head>
	<title>Add Media</title>
    <!-- TODO Change this to use sass so we can compile a
    single CSS file to include for back-end styles -->
    <link rel="stylesheet" href="{{ asset('totalWebConnections/simpleBlog/bower/bootstrap/dist/css/bootstrap.min.css') }}">
</head>
<body>
    <div class="mainWrapper container">
		<form method="POST" action="new" enctype="multipart/form-data">

			<input type="file" name="media">

			<input type="text" name="alt" placeholder="Image Alt Tag" />
			<input type="text" name="title" placeholder="Image Title" />
			{!! csrf_field() !!}
        	<button type="submit" class="btn btn-success">Add</button>
		</form>
    </div>
</body>
</html>
