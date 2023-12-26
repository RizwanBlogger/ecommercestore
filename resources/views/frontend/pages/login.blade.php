@extends('frontend.layout.master')
@section('content')

<section id="form"><!--form-->

		<div class="container">
		<!-- <div>
             @if(Session::has('message'))
            <p class="alert alert-info">{{ Session::get('message') }}</p>
            @endif
                </div> -->
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Login to your account</h2>
						<form action="{{url('signin')}}" method="post">
							@csrf
							<input type="email" name="email" placeholder="Email Address" />
							<input type="password" name="password" placeholder="Name" />
							<span>
								<input type="checkbox" class="checkbox"> 
								Keep me signed in
							</span>
							<button type="submit" class="btn btn-default">Login</button>
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>New User Signup!</h2>
						@error('name')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
					@error('email')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
					@error('password')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
						<form action="{{url('user/signup')}}" method="POST">
							@csrf
							<input type="text" name="name" placeholder="Name"/>
							<input type="email" name="email" placeholder="Email Address"/>
							<input type="password" name="password" placeholder="Password"/>
							<button type="submit" class="btn btn-default">Signup</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
@endsection