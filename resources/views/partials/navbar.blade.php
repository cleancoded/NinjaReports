	<div class="row top-bar">
		<div class="col-md-6 text-left">
			<span class="logo"><img src="{{asset('images/ninja reports white.png')}}" alt=""></span>
			<!-- <span><img src="{{asset('images/logo1.png')}}" alt=""></span>	<h5>NINJA REPORTS</h5> -->
		</div>
        @if (auth()->check())
			<div class="col-md-6 text-right">
				<a class="dropdown-toggle" data-toggle="dropdown" href="#"><img src="{{ Auth::user()->picture }}" style="height: 38px;border-radius: 50%;"></a>
				<div class="dropdown-menu">
					<a class="dropdown-item" href="/account"><span><img src="{{asset('images/black.jpg')}}" style="height: 10px;width: 10px;margin-right: 5px;"></span>My Account</a>
					<a class="dropdown-item" href="/logout"><span><img src="{{asset('images/black.jpg')}}" style="height: 10px;width: 10px;margin-right: 5px;"></span>Sign Out</a>
				</div>
			</div>
		@else
		  	<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Roboto" />

			<div class="google-btn">
				<div class="google-icon-wrapper">
					<img class="google-icon" src="https://upload.wikimedia.org/wikipedia/commons/5/53/Google_%22G%22_Logo.svg"/>
				</div>
				<a class="btn-text" href="javascript:0;" id="login_button" style="text-decoration : none"><b>Sign in with google</b></a>
			</div>
		@endif
    </div>
   
