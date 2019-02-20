@extends('layouts.app')
@section('title')
@section('content')	
<div class="main-container">
	<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
		<div class="min-height-200px">
			<div class="page-header">
				<div class="row">
					<div class="col-md-6 col-sm-12">
						<div class="title">
							<h4>User Experience Details</h4>
						</div>
						<nav aria-label="breadcrumb" role="navigation">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="index.php">Home</a></li>
								<li class="breadcrumb-item active" aria-current="page">Users</li>
								<li class="breadcrumb-item active" aria-current="page">User Experience Details</li>
							</ol>
						</nav>
					</div>
					<div class="col-md-6 col-sm-12 text-right">
						<div class="dropdown">
							<div class="pull-right">
								<a href="{!!route('users.experiences.index',['id'=>$user_id]) !!}" class="btn btn-primary btn-sm"><i class="fa fa-arrow-left"></i>Back</a>
							</div>
						</div>
					</div>
				</div>
			</div>
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
									<th scope="col">User Name</th>
									<td>{!! $exprience->user ? $exprience->user->name : '-' !!}</td>
								</tr>
								<tr>
									<th scope="col">Company Name</th>
									<td>{!! $exprience->company !!}</td>
								</tr>
								<tr>
									<th scope="col">From</th>
									<td>{!! $exprience->company !!}</td>
								</tr>
								<tr>
									<th scope="col">To</th>
									<td>{!! $exprience->company !!}</td>
								</tr>
								<tr>
									<th scope="col">Salary</th>
									<td>{!! $exprience->company !!}</td>
								</tr>
								<tr>
									<th scope="col">Reason</th>
									<td>{!! $exprience->reason !!}</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
