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
							<h4>Client Detail</h4>
						</div>
						<nav aria-label="breadcrumb" role="navigation">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="index.php">Home</a></li>
								<li class="breadcrumb-item active" aria-current="page">Client Detail</li>
							</ol>
						</nav>
					</div>
					<div class="col-md-6 col-sm-12 text-right">
						<div class="dropdown">
							<div class="pull-right">
								<a href="{!! route('clients.index') !!}" class="btn btn-primary btn-sm"><i class="fa fa-arrow-left"></i>Back</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
				<div class="clearfix mb-20">
					<div class="pull-left">
						<h5 class="text-blue">Client Detail</h5>
					</div>
				</div>
				<div class="row">
					<div class="table-responsive">
						<table class="table table-striped">
							<tbody>
								<tr>
									<th scope="col">Project Category Name</th>
									<td>{!! $client->name !!}</td>
								</tr>
								<tr>
									<th scope="col">Industry Name</th>
									<td>{!! $client->industry->name !!}</td>
								</tr>
								<tr>
									<th scope="col">WebSite</th>
									<td>{!! $client->website !!}</td>
								</tr>
								<tr>
									<th scope="col">Email</th>
									<td>{!! $client->email !!}</td>
								</tr>
								<tr>
									<th scope="col">Phone</th>
									<td>{!! $client->phone !!}</td>
								</tr>
								<tr>
									<th scope="col">fax</th>
									<td>{!! $client->fax !!}</td>
								</tr>
								<tr>
									<th scope="col">Address</th>
									<td>{!! $client->address_1 !!}</td>
								</tr>
								<tr>
									<th scope="col">Parmenent Address</th>
									<td>{!! $client->address_2 !!}</td>
								</tr>
								<tr>
									<th scope="col">City</th>
									<td>{!! $client->city !!}</td>
								</tr>
								<tr>
									<th scope="col">State</th>
									<td>{!! $client->state !!}</td>
								</tr>
								<tr>
									<th scope="col">Country</th>
									<td>{!! $client->country !!}</td>
								</tr>
								<tr>
									<th scope="col">Zip Code</th>
									<td>{!! $client->zipcode !!}</td>
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
