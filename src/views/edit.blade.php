<!DOCTYPE html>
<html>
<head>
	<title>Edit Post</title>
    <!-- TODO Change this to use sass so we can compile a
    single CSS file to include for back-end styles -->
    <link rel="stylesheet" href="{{ asset('totalWebConnections/simpleBlog/bower/bootstrap/dist/css/bootstrap.min.css') }}">
    <script src="{{ asset('totalWebConnections/simpleBlog/bower/ckeditor/ckeditor.js') }}"></script>
</head>
<body>
    <div class="mainWrapper container">
		@if($response)
			<div class="alert alert-success" role="alert">{{$response}}</div>
		@endif
		<div class="panel panel-primary">
			<div class="panel-heading">Edit Post</div>
			<div class="panel-body">
				<form method="post" action="{{url('blog/edit')}}">
		            <input type="text" name="title" placeholder="Title" value="{{ $post->title }}" />
		            <textarea id="article-ckeditor" name="post">{!! html_entity_decode($post->post) !!}</textarea>
		            <input type="text" name="mainImage" value="{{$post->imageUrl}}" placeholder="Main Image" />
					<input type="hidden" name="postId" value="{{$post->id}}" />
					<input type="text" name="tags" value="{{$post->tagList}}" />

		            <input type="hidden" name="_token" value="{{ csrf_token() }}">

					<div class="formSection">
						<h3>SEO</h3>
						<label for="customUrl">Page Title</label>
			            <input type="text" name="customUrl" placeholder="customUrl" value="{{$post->customUrl}}"/>
						</br>
						<label for="metaDescription">Meta Description</label></br>
						<textarea name="metaDescription">{{$post->metaDescription}}</textarea>
					</div>
					<div class="formSection">
						<h4>Save As Draft?</h4>
						<input type="checkbox" name="draft" />
					</div>
					<button type="submit">Update</button>
		        </form>
			</div>
		</div>
    </div>
    <script>
        CKEDITOR.replace( 'article-ckeditor' );
    </script>
</body>
</html>
