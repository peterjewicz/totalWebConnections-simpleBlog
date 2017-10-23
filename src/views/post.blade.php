<!DOCTYPE html>
<html>
<head>
	<title>{{$post->title}}</title>
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
        <div class="blogPost row">
            <div class="col-lg-8 col-md-10 col-lg-offset-2 col-md-offset-1">
                @if($post->imageUrl)
                    <img src="{{$post->imageUrl}}" width="100%"/>
                @endIf
                <h1>{{$post->title}}</h1>
                <div class="content">
                    {!! html_entity_decode($post->post) !!}
                </div>
            </div>
        </div>
    </div>
</body>
</html>