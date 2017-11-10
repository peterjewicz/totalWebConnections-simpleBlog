<!DOCTYPE html>
<html>
<head>
	<title>New Post</title>
    <!-- TODO Change this to use sass so we can compile a
    single CSS file to include for back-end styles -->
    <link rel="stylesheet" href="{{ asset('totalWebConnections/simpleBlog/bower/bootstrap/dist/css/bootstrap.min.css') }}">
    <script src="{{ asset('totalWebConnections/simpleBlog/bower/ckeditor/ckeditor.js') }}"></script>
</head>
<body>
    <div class="mainWrapper container">
		<div class="panel panel-primary">
			<div class="panel-heading">New Post</div>
			<div class="panel-body">
		        <form method="post" action="new">
		            <input type="text" name="title" placeholder="Title" />
		            <textarea id="article-ckeditor" name="post"></textarea>
		            <input type="text" name="mainImage" placeholder="Main Image" />
		            <button type="submit">Add</button>
		            <input type="hidden" name="_token" value="{{ csrf_token() }}">
		        </form>
			</div>
		</div>
    </div>
    <script>
        CKEDITOR.replace( 'article-ckeditor' );
    </script>
</body>
</html>
