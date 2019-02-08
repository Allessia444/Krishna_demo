<!DOCTYPE html>
<html>
<head>
	@include('includes.head')
</head>
<body>
	@include('includes.header')
	@include('includes.sidebar')
	<div class="main-container">
		<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>Form</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Form Basic</li>
								</ol>
							</nav>
						</div>
						<div class="col-md-6 col-sm-12 text-right">
							<div class="dropdown">
								<a href="#basic-form1" class="btn btn-primary btn-sm scroll-click" rel="content-y"  data-toggle="collapse" role="button"><i class="fa fa-back"></i>Back to User</a>
							</div>
						</div>
					</div>
				</div>

				<!-- horizontal Basic Forms Start -->
				<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue">horizontal Basic Forms</h4>
							<p class="mb-30 font-14">All bootstrap element classies</p>
						</div>
						<div class="pull-right">
							<a href="#horizontal-basic-form1" class="btn btn-primary btn-sm scroll-click" rel="content-y"  data-toggle="collapse" role="button"><i class="fa fa-code"></i> Source Code</a>
						</div>
					</div>
					{!! Former::horizontal_open()->action(URL::route("users.store"))->method('POST')->class('p-t-15')->role('form')->id('form') !!}     

						<div class="form-group">
							<label>Name</label>
							{!! Former::text('name')->placeholder('User Name')->label('User Name') !!}
						</div>
						<div class="form-group">
							<label>Middle Name</label>
							{!! Former::text('middle_name')->placeholder('Middle Name')->label('Middle Name') !!}
						</div>
						<div class="form-group">
							<label>Last Name</label>
							{!! Former::text('last_name')->placeholder('Last Name')->label('Last Name') !!}
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-md-6 col-sm-12">
									<label class="weight-600">Gender</label>
									<div class="custom-control">
										<input type="radio" class="with-gap" name="gender" value="male">Male
									</div>
									<div class="custom-control">
										<input type="radio" name="gender" class="with-gap" value="female">Female
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label>Age</label>
							{!! Former::text('age')->placeholder('age')->label('Middle Name') !!}
						</div>
						<div class="form-group">
							<label>Date of Birth</label>
							<input class="form-control date-picker" name="dob" placeholder="Select Date" type="text">
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-md-6 col-sm-12">
									<label class="weight-600">Hobby</label>
									<div class="custom-control custom-checkbox mb-5">
										<input type="checkbox" name=hobby[] value="Dancing" class="custom-control-input" id="customCheck1">
										<label class="custom-control-label" for="customCheck1">Dancing</label>
									</div>
									<div class="custom-control custom-checkbox mb-5">
										<input type="checkbox" value="Signing" name=hobby[] class="custom-control-input" id="customCheck2">
										<label class="custom-control-label" for="customCheck2">Signing</label>
									</div>
									<div class="custom-control custom-checkbox mb-5">
										<input type="checkbox" value="Reading" name=hobby[] class="custom-control-input" id="customCheck2">
										<label class="custom-control-label" for="customCheck2">Reading</label>
									</div>
									<div class="custom-control custom-checkbox mb-5">
										<input type="checkbox" name=hobby[] value="Advancher" class="custom-control-input" id="customCheck2">
										<label class="custom-control-label" for="customCheck2">Advancher</label>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label>Address</label>
							{!! Former::textarea('address')->placeholder('Address')->label('Country') !!}
						</div>
						<div class="form-group">
							<label>City</label>
							{!! Former::text('city')->placeholder('City')->label('Country') !!}
						</div>
						<div class="form-group">
							<label>State</label>
							{!! Former::text('state')->placeholder('State')->label('Country') !!}
						</div>
						<div class="form-group">
							<label>Country</label>
							{!! Former::text('country')->placeholder('Country')->label('Country') !!}
						</div>
						<div class="form-group">
							{!! Former::submit('Save') !!}
						</div>
					 {!! Former::close() !!}
				</div>
				<!-- horizontal Basic Forms End -->
			</div>
			@include('includes.footer')
		</div>
	</div>
	@include('includes.script')
</body>
</html>