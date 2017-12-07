<!DOCTYPE html>
<html>
<head>
	<title>Blog Title</title>
    <!-- TODO Change this to use sass so we can compile a
    single CSS file to include for back-end styles -->
    <link rel="stylesheet" href="{{ asset('totalWebConnections/simpleBlog/bower/bootstrap/dist/css/bootstrap.min.css') }}">
</head>
<body>
    <div class="mainWrapper container">
        <div class="blogHeader">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Brand</a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class=""><a href="{{URL::to('/blog')}}">Blog Home</a></li>
                    </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
                </nav>
        </div>
        @foreach($posts as $post)
            <div class="blogWrapper row" style="margin-top: 35px;">
                <div class="col-sm-4 col-sm-offset-2">
                    @if($post->imageUrl)
                        <img src="{{$post->imageUrl}}" width="100%"/>
                    @endIf
                </div>
                <div class="col-sm-6">
                    <h1>{{$post->title}}</h1>
                    <div class="content">
                        {{ $post->getExcept() }}
                    </div>
					<a href="blog/{{ $post->getPostUrl() }}"><button class="btn btn-primary">Learn More</button></a>
                </div>
            </div>
            @endforeach
    </div>
</body>
</html>
