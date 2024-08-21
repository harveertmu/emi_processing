@extends('admin.layout.head')


@section('content')
<div class="right_col" role="main" style="min-height: 3793px;">
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>Users Managment</h3>
			</div>
			@if ($message = Session::get('success'))
			<div class="alert alert-success">
				<p>{{ $message }}</p>
			</div>
			@endif

			<div class="title_right">
				<div class="col-md-5 col-sm-5  form-group pull-right top_search">
					<!-- <div class="input-group">
									<input type="text" class="form-control" placeholder="Search for...">
									<span class="input-group-btn">
										<button class="btn btn-default" type="button">Go!</button>
									</span>
								</div> -->
				</div>
			</div>
		</div>
		<div class="clearfix"></div>
		@if (count($errors) > 0)
		<div class="alert alert-danger">
			<strong>Whoops!</strong> There were some problems with your input.<br><br>
			<ul>
				@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
		@endif
		<div class="row">
			<div class="col-md-12 col-sm-12 ">
				<div class="x_panel">
					<div class="x_title">
						<h2>Create New User
							<!-- <small>different form elements</small> -->
						</h2>
						<ul class="nav navbar-right panel_toolbox">
							<!-- <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
										</li> -->
							<!-- <li class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-wrench"></i></a> -->
							<!-- <ul class="dropdown-menu" role="menu">
												<li><a class="dropdown-item" href="#">Settings 1</a>F
												</li>
												<li><a class="dropdown-item" href="#">Settings 2</a>
												</li>
											</ul> -->
							<!-- </li> -->
							<!-- <li><a class="close-link"><i class="fa fa-close"></i></a> -->
							</li>
						</ul>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<br>
						{!! Form::open(array('route' => 'users.store','method'=>'POST','class'=>'form-horizontal form-label-left')) !!}

						<div class="item form-group">
							<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">First Name <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 ">
								{!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}

								<!-- <input type="text" id="first-name" required="required" class="form-control "> -->
							</div>
						</div>
						<div class="item form-group">
							<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Email <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 ">
								{!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
								<!-- <input type="text" id="first-name" required="required" class="form-control "> -->
							</div>
						</div>
						<div class="item form-group">
							<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Password <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 ">
								{!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
								<!-- <input type="text" id="first-name" required="required" class="form-control "> -->
							</div>
						</div>

						<div class="item form-group">
							<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Confirm Password <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 ">
								{!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
								<!-- <input type="text" id="first-name" required="required" class="form-control "> -->
							</div>
						</div>

						<div class="item form-group">
							<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Confirm Password <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 ">
								{!! Form::select('roles[]', $roles,[], array('class' => 'form-control','multiple')) !!}
								<!-- <input type="text" id="first-name" required="required" class="form-control "> -->
							</div>
						</div>
						<!-- <div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Last Name <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="last-name" name="last-name" required="required" class="form-control">
											</div>
										</div> -->
						<!-- <div class="item form-group">
											<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Middle Name / Initial</label>
											<div class="col-md-6 col-sm-6 ">
												<input id="middle-name" class="form-control" type="text" name="middle-name">
											</div>
										</div> -->
						<!-- <div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align">Gender</label>
											<div class="col-md-6 col-sm-6 ">
												<div id="gender" class="btn-group" data-toggle="buttons">
													<label class="btn btn-secondary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
														<input type="radio" name="gender" value="male" class="join-btn" data-parsley-multiple="gender"> &nbsp; Male &nbsp;
													</label>
													<label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
														<input type="radio" name="gender" value="female" class="join-btn" data-parsley-multiple="gender"> Female
													</label>
												</div>
											</div>
										</div> -->
						<!-- <div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align">Date Of Birth <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input id="birthday" class="date-picker form-control" placeholder="dd-mm-yyyy" type="date" required="required" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
												<script>
													function timeFunctionLong(input) {
														setTimeout(function() {
															input.type = 'text';
														}, 60000);
													}
												</script>
											</div>
										</div> -->
						<div class="ln_solid"></div>
						<div class="item form-group">
							<div class="col-md-6 col-sm-6 offset-md-3">
								<a class="btn btn-primary" href="{{ route('users.index') }}"> Cancel</a>
								<button class="btn btn-primary" type="reset">Reset</button>
								<button type="submit" class="btn btn-success">Submit</button>
							</div>
						</div>

						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
	</div>
	@endsection