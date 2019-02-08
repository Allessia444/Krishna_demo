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
								<h4>User Detail</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">User show</li>
								</ol>
							</nav>
						</div>
						<div class="col-md-6 col-sm-12 text-right">
							<div class="dropdown">
								<div class="pull-right">
							<a href="{!! route('projects.index') !!}" class="btn btn-primary btn-sm"><i class="fa fa-code"></i>Back to Users</a>
						</div>
							</div>
						</div>
					</div>
				</div>
				<!-- Simple Datatable start -->
				<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
					<div class="clearfix mb-20">
						<div class="pull-left">
							<h5 class="text-blue">User Detail</h5>
						</div>
					</div>
					<div class="row">
							<div class="table-responsive">
			<table class="table table-striped">
				<tbody>
					<tr>
						<th scope="col">Name</th>
						<td>{!! $project->user->name !!}</td>
					</tr>
					<tr>
						<th scope="col">Middle Name</th>
						<td>{!! $project->name !!}</td>
					</tr>
					<tr>
						<th scope="col">Last Name</th>
						<td>{!! $project->confirm_hr !!}</td>
					</tr>
					
				</tbody>
			</table>
		</div>
					</div>
				</div>
				<!-- Simple Datatable End -->
				
			</div>
			@include('includes.footer')
		</div>
	</div>
	@include('includes.script')
</body>
</html>