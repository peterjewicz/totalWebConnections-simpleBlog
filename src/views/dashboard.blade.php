<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
    <!-- TODO Change this to use sass so we can compile a
    single CSS file to include for back-end styles -->
    <link rel="stylesheet" href="{{ asset('totalWebConnections/simpleBlog/bower/bootstrap/dist/css/bootstrap.min.css') }}">
</head>
<body>
    <div class="mainWrapper container">
        <a href="new"><button type="button" class="btn btn-success">New</button></a>
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Title</th>
                <th>Posted</th>
								<th>Status</th>
                <th>Edit</th>
            </tr>
            </thead>
            <tbody>
            @foreach($posts as $post)
                <tr>
                    <td>{{$post->title}}</td>
                    <td>{{$post->created_at}}</td>
										<td>{{ $post->published == 1 ? 'Published' : 'Draft' }}</td>
                    <td><a href="edit/{{$post->id}}">Edit <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
