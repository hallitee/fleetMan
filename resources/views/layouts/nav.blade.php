  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="{{ url('/')}}">{{ config('app.name') }}</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
	
    <div class="collapse navbar-collapse" id="navbarResponsive">
	<br>
	  <br>
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
	  <br>
	  <br>
	  <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
		{!! Form::open(['action' => array('RequestController@tracking'),'method'=>'GET']) !!}
            <div class="input-group">
              <input class="form-control" placeholder="Track reservations..." name="search" type="text">
              <span class="input-group-append">
                <button class="btn btn-primary" type="submit">
                  <i class="fa fa-search"></i>
                </button>
              </span>
            </div>
     	{!! Form::close() !!}
		  </li>
		  <br>
	          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="New Car Request">
          <a class="nav-link" href="{{ url('/') }}">
            <i class="fa fa-fw fa-edit"></i>
            <span class="nav-link-text">New Request</span>
          </a>
        </li>

		@if(Auth::user())
		@if(Auth::user()->role==1)
		<li class="nav-item" data-toggle="tooltip" data-placement="right" title="New Car Request">
          <a class="nav-link" href="{{ url('/trip/stat') }}">
            <i class="fa fa-fw fa-edit"></i>
            <span class="nav-link-text">Manage Trip </span>
          </a>
        </li>		
		@endif
		@if(Auth::user()->role>2)
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="{{ url('/dashboard') }}">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>

		<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" href="{{ url('/reserve') }}">
            <i class="fa fa-fw fa-television"></i>
            <span class="nav-link-text">View Request</span>
          </a>
        </li>  
		<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-car"></i>
            <span class="nav-link-text">Fleet management</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents">
		 	<li>
              <a class="nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti1"><i class="fa fa-fw fa-bell"></i>Renewal</a>
              <ul class="sidenav-third-level collapse" id="collapseMulti1">
                <li>
                  <a href="{{ route('renewals.create') }}"><i class="fa fa-fw fa-circle-o"></i>Add renewals</a>
                </li>
                <li>
                  <a href="{{ route('renewals.index') }}"><i class="fa fa-fw fa-circle-o"></i>Renewals List</a>
                </li>
              </ul>
            </li>
		 	<li>
              <a class="nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti5">Department/Group</a>
              <ul class="sidenav-third-level collapse" id="collapseMulti5">
                <li>
                  <a href="{{  route('dept.create') }}">New Department</a>
                </li>
                <li>
                  <a href="{{ route('dept.index') }}">Manage Department</a>
                </li>
              </ul>
            </li>
			<li>
              <a class="nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti3">Fleet</a>
              <ul class="sidenav-third-level collapse" id="collapseMulti3">
                <li>
                  <a href="{{ route('fleet.create') }}">Add New Fleet</a>
                </li>
                <li>
                  <a href="{{ route('fleet.index') }}">Manage Fleet</a>
                </li>
              </ul>
            </li>
			<li>
              <a class="nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti4">Renewals</a>
              <ul class="sidenav-third-level collapse" id="collapseMulti4">
                <li>
                  <a href="{{ route('renewal.create') }}">Add New Renewal</a>
                </li>
                <li>
                  <a href="{{ route('renewal.index') }}">Manage Renewal</a>
                </li>
              </ul>
            </li>			
          </ul>        
        </li>	
		@endif

		@if(Auth::user()->role>=3)
		<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponent" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-wrench"></i>
            <span class="nav-link-text">Master</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponent">
		 	<li>
              <a class="nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMult1">Company</a>
              <ul class="sidenav-third-level collapse" id="collapseMult1">
                <li>
                  <a href="{{ route('company.create') }}">New Company</a>
                </li>
                <li>
                  <a href="{{ route('company.index') }}">Manage company</a>
                </li>
              </ul>
            </li>
		 	<li>
              <a class="nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMult2">Department/Group</a>
              <ul class="sidenav-third-level collapse" id="collapseMult2">
                <li>
                  <a href="{{  route('dept.create') }}">New Department</a>
                </li>
                <li>
                  <a href="{{ route('dept.index') }}">Manage Department</a>
                </li>
              </ul>
            </li>

			<li>
              <a class="nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMult3">Fleet</a>
              <ul class="sidenav-third-level collapse" id="collapseMult3">
                <li>
                  <a href="{{ route('fleet.create') }}">Add New Fleet</a>
                </li>
                <li>
                  <a href="{{ route('fleet.index') }}">Manage Fleet</a>
                </li>
              </ul>
            </li>
			<li>
              <a class="nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMult4">Renewals</a>
              <ul class="sidenav-third-level collapse" id="collapseMult4">
                <li>
                  <a href="{{ route('renewal.create') }}">Add New Renewal</a>
                </li>
                <li>
                  <a href="{{ route('renewal.index') }}">Manage Renewal</a>
                </li>
              </ul>
            </li>			

          </ul> 
        </li>			
		@endif
		 @endif
      </ul>
  
		<ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
		@if(Auth::user())
		  <!--
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="messagesDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-envelope"></i>
            <span class="d-lg-none">Messages
              <span class="badge badge-pill badge-primary">12 New</span>
            </span>
            <span class="indicator text-primary d-none d-lg-block">
              <i class="fa fa-fw fa-circle"></i>
            </span>
          </a>
          <div class="dropdown-menu" aria-labelledby="messagesDropdown">
            <h6 class="dropdown-header">New Messages:</h6>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <strong>David Miller</strong>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">Hey there! This new version of SB Admin is pretty awesome! These messages clip off when they reach the end of the box so they don't overflow over to the sides!</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <strong>Jane Smith</strong>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">I was wondering if you could meet for an appointment at 3:00 instead of 4:00. Thanks!</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <strong>John Doe</strong>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">I've sent the final files over to you for review. When you're able to sign off of them let me know and we can discuss distribution.</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item small" href="#">View all messages</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-bell"></i>
            <span class="d-lg-none">Alerts
              <span class="badge badge-pill badge-warning">6 New</span>
            </span>
            <span class="indicator text-warning d-none d-lg-block">
              <i class="fa fa-fw fa-circle"></i>
            </span>
          </a>
          <div class="dropdown-menu" aria-labelledby="alertsDropdown">
            <h6 class="dropdown-header">New Alerts:</h6>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <span class="text-success">
                <strong>
                  <i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong>
              </span>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <span class="text-danger">
                <strong>
                  <i class="fa fa-long-arrow-down fa-fw"></i>Status Update</strong>
              </span>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <span class="text-success">
                <strong>
                  <i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong>
              </span>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item small" href="#">View all alerts</a>
          </div>
        </li>
        <li class="nav-item">
          <form class="form-inline my-2 my-lg-0 mr-lg-2">
            <div class="input-group">
              <input class="form-control" type="text" placeholder="Search for...">
              <span class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fa fa-search"></i>
                </button>
              </span>
            </div>
          </form>
        </li> -->
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
		 @endif
		 @if(Auth::guest())
	    <li class="nav-item">
          <a class="nav-link" href="{{ route('login')}}">
            <i class="fa fa-fw fa-sign-in"></i>Login</a>
        </li>
		@endif
      </ul>
    
	</div>
  </nav>
 