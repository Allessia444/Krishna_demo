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
					{!! Former::horizontal_open()->action(URL::route("projects.store"))->method('POST')->class('p-t-15')->role('form')->id('form') !!}     

						<div class="form-group">
							<label>Name</label>
							 {!! Former::select('user_id')->label('User Name')->options($users)->placeholder('Select user name') !!}  
						</div>
						<div class="form-group">
							<label>Project Name</label>
							{!! Former::text('name')->placeholder('Project Name')->label('Middle Name') !!}
						</div>
						<div class="form-group">
							<label>Confirm Hours</label>
							{!! Former::text('confirm_hr')->placeholder('Confirm Hours')->label('Confirm Hours') !!}
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