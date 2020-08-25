<div class="row">
	<div class="col-md-2 side-col">
		<div class="side-bar">
			<ul class="nav flex-column">
				<li class="nav-item">
					<a class="nav-link" href="/home"><span><img src="{{asset('images/black.jpg')}}"></span>Dashboard</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#" data-toggle="modal" data-target="#myModal"><span><img src="{{asset('images/black.jpg')}}"></span>KeyWord Tracking</a>
				</li>

				<li class="nav-item">
					<a class="nav-link dropdown-toggle" data-toggle="dropdown" href=""><span><img src="{{asset('images/black.jpg')}}"></span>Site Audit</a>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="/seo_audit"><span><img src="{{asset('images/black.jpg')}}"></span>OverView</a>
						<a class="dropdown-item" href="#errors"><span><img src="{{asset('images/black.jpg')}}"></span>Errors</a>
						<a class="dropdown-item" href="/audit"><span><img src="{{asset('images/black.jpg')}}"></span>Warnings</a>
						<a class="dropdown-item" href="#"><span><img src="{{asset('images/black.jpg')}}"></span>Notices</a>
					</div>
				</li>

				<li class="nav-item">
					<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="analysis.html"><span><img src="{{asset('images/black.jpg')}}"></span>Seo Analysis</a>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="/analysis"><span><img src="{{asset('images/black.jpg')}}"></span>Header</a>
						<a class="dropdown-item" href="#technical"><span><img src="{{asset('images/black.jpg')}}"></span>Technical</a>
						<a class="dropdown-item" href="#"><span><img src="{{asset('images/black.jpg')}}"></span>Content</a>
						<a class="dropdown-item" href="#"><span><img src="{{asset('images/black.jpg')}}"></span>Performance</a>
						<a class="dropdown-item" href="#"><span><img src="{{asset('images/black.jpg')}}"></span>Links</a>
						<a class="dropdown-item" href="#"><span><img src="{{asset('images/black.jpg')}}"></span>Security</a>
						<a class="dropdown-item" href="#"><span><img src="{{asset('images/black.jpg')}}"></span>Social</a>
						<a class="dropdown-item" href="#"><span><img src="{{asset('images/black.jpg')}}"></span>Other</a>
					</div>
				</li>

				<li class="nav-item">
					<a class="nav-link" href="#"><span><img src="{{asset('images/black.jpg')}}"></span>Knowledge Base</a>
				</li>

				<li class="nav-item">
					<a class="nav-link" href="#"><span><img src="{{asset('images/black.jpg')}}"></span>Support</a>
				</li>
			</ul>
		</div>
		<!--The Model-->
		<div class="modal" id="myModal">
			<div class="modal-dialog">
				<div class="modal-content">

					<!-- Modal Header -->
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>

					<!-- Modal body -->
					<div class="modal-body" style="padding:20px;">
						<h2>Upgrade to access this feature</h2>
						<h6>The full site audit tool is for paying customers.Please signup to access SEO site audit reports.</h6>
						<ul style="padding-left: 20px;">
						<li>Lorem ipsum Lorem ipsum</li>
						<li>Lorem ipsum Lorem ipsum</li>
						<li>Lorem ipsum Lorem ipsum</li>
						<li>Lorem ipsum Lorem ipsum</li>
						</ul>
					</div>

					<!-- Modal footer -->
					<div class="modal-footer" style="margin:auto;">
						<button type="button" class="btn btn-warning" href="#">View Plans</button>
					</div>

				</div>
			</div>
		</div>
		<!-- Modal -->
		<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="loginModalLabel"></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<hr>
				<div class="modal-body">
					<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans" />

					<div class="google-btn" style="margin-right: 157px; margin-top: -20px;">
						<div class="google-icon-wrapper">
							<img class="google-icon" src="https://upload.wikimedia.org/wikipedia/commons/5/53/Google_%22G%22_Logo.svg"/>
						</div>
						<a class="btn-text" href="/login" style="text-decoration : none"><b>Sign in with google</b></a>
					</div>
				</div>
				<hr>
				<div class="modal-footer">

				</div>
				</div>
			</div>
		</div>
	</div>
