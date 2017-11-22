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
					<label for="title">Title</label>
		            <input type="text" name="title" placeholder="Title" />
		            <textarea id="article-ckeditor" name="post"></textarea>
		            <input type="text" name="mainImage" placeholder="Main Image" />
					<input type="text" name="tags" placeholder="tags (comma separated)" />

		            <input type="hidden" name="_token" value="{{ csrf_token() }}">

					<div class="formSection">
						<h3>SEO</h3>
						<label for="customUrl">Custom Url</label>
			            <input type="text" name="customUrl" placeholder="Custom Url" />
						</br>
						<label for="metaDescription">Meta Description</label></br>
						<textarea name="metaDescription"></textarea>
					</div>
					<button type="submit">Add</button>
		        </form>
			</div>
		</div>
    </div>
    <script>
        CKEDITOR.replace( 'article-ckeditor' );
    </script>
</body>
</html>
