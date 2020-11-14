<div class="row">
	<div class="col-md-2 side-col">
			<div class="side-bar">
			<ul class="nav flex-column">
				<li class="nav-item">
					<a class="nav-link" href="/home"><i class="fa fa-home" aria-hidden="true"></i> DASHBOARD</a>
				</li>
				<li class="nav-item">
					<a style="display:none" class="nav-link" href="#" data-toggle="modal" data-target="#myModal">KEYWORD TRACKING</a></li>

				<li class="nav-item">
					<a class="nav-link"  href="{{route('audit')}}"><i class="fa fa-refresh" aria-hidden="true"></i> SITE AUDIT</a>
					<div class="audit-item" style="display:none;">
						<a class="dropdown-item" href="#overview"><i class="fa fa-bullseye" aria-hidden="true"></i> OVERVIEW</a>
						<a class="dropdown-item" href="#errors"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> ERRORS</a>
						<a class="dropdown-item" href="#warnings"><i class="fa fa-exclamation-circle" aria-hidden="true"></i> WARNINGS</a>
						<a class="dropdown-item" href="#notices"><i class="fa fa-flag" aria-hidden="true"></i> NOTICES</a>
					</div>
				</li>

				<li class="nav-item">
					<a class="nav-link" href="{{ route('analysis') }}"><i class="fa fa-search" aria-hidden="true"></i> SEO ANALYSIS</a>
					<div class="analysis_section" style="display:none;">
						<div class="">
							<a class="dropdown-item" href="#header">HEADER</a>
							<a class="dropdown-item" href="#technical">TECHNICAL</a>
							<a class="dropdown-item" href="#Content">CONTENT</a>
							<a class="dropdown-item" href="#performance">PERFORMANCE</a>
							<a class="dropdown-item" href="#links">LINKS</a>
							<a class="dropdown-item" href="#security">SECURITY</a>
							<a class="dropdown-item" href="#social">SOCIAL</a>
							<a class="dropdown-item" href="#other">OTHER</a>
						</div>
					</div>
				</li>

				<li class="nav-item">
					<a class="nav-link" target="_blank" href="https://ninjareports.zendesk.com/hc/en-us"><i class="fa fa-lightbulb-o" aria-hidden="true"></i> KNOWLEDGE BASE</a></li>

				<li class="nav-item">
					<a class="nav-link" target="_blank" href="https://ninjareports.zendesk.com/hc/en-us/requests/new"><i class="fa fa-life-ring" aria-hidden="true"></i> SUPPORT</a></li>
			</ul>
		</div>
		<!--The Model-->
		<div class="modal" id="myModal">
			<div class="modal-dialog">
				<div class="modal-content">
test
					<!-- Modal Header -->
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>

					<!-- Modal body -->
					<div class="modal-body" style="padding:20px;">
						<h2>Coming Soon</h2>
						<h5>we dont have that feature yeT</h5>
						
						</ul>
					</div>

					<!-- Modal footer -->
					<div class="modal-footer" style="margin:auto;">
						<button type="button" class="btn btn-warning" disabled href="#">View Plans</button>
					</div>

				</div>
			</div>
		</div>
		<!-- Modal -->
		<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
				<div class="modal-header">
					<h3>Login with Google</h3>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
			
				<div class="modal-body">
					<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans" />
					<p>Please sign in with Google in order to run an SEO analysis.</p>
					<div class="google-btn">
						<div class="google-icon-wrapper">
							<img class="google-icon" src="https://upload.wikimedia.org/wikipedia/commons/5/53/Google_%22G%22_Logo.svg"/>
						</div>
						<a class="btn-text " href="javascript:0;" id="login_btn" style="text-decoration:none"><b>Sign in with google</b></a>
					</div>
				</div>
				<hr>
				<!-- <button class="btn-text" href="" id="login_btn"  style="text-decoration : none"><b>google</b></button> -->
				<div class="modal-footer">

				</div>
				</div>
			</div>
		</div>
		<!-- Access Model -->
		<div class="modal" id="upgradeModel">
			<div class="modal-dialog">
				<div class="modal-content">

					<!-- Modal Header -->
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>

					<!-- Modal body -->
					<div class="modal-body" style="padding:20px;">
						<h2>Upgrade for more analysis</h2>
						</ul>
					</div>

					<!-- Modal footer -->
					<div class="modal-footer" style="margin:auto;">
						<button type="button" class="btn btn-warning" href="#">Upgrade</button>
					</div>

				</div>
			</div>
		</div>
	</div>
