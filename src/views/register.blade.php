<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
    <!-- TODO Change this to use sass so we can compile a 
    single CSS file to include for back-end styles -->
    <link rel="stylesheet" href="{{ asset('totalWebConnections/simpleBlog/bower/bootstrap/dist/css/bootstrap.min.css') }}">
</head>
<body>
    <div class="mainWrapper">
            <h1>Register</h1>
            <div class="panel-body">
				<div class="row">
					<div class="col-lg-12">
						<form id="login-form" action="register" method="post" role="form" style="display: block;">
							<div class="form-group">
								<input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="">
							</div>
                            <div class="form-group">
								<input type="text" name="email" id="email" tabindex="1" class="form-control" placeholder="Email - Used for password recovery" value="">
							</div>
							<div class="form-group">
								<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-sm-6 col-sm-offset-3">
										<input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
									</div>
								</div>
							</div>
							<input type="hidden" name="_token" value="{{ csrf_token() }}">		
						</form>			
					</div>
				</div>
            
            </div>
    </div>
</body>
</html>