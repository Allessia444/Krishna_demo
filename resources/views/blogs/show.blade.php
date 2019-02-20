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
							<h4>Blog Detail</h4>
						</div>
						<nav aria-label="breadcrumb" role="navigation">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="index.php">Home</a></li>
								<li class="breadcrumb-item active" aria-current="page">Blog Detail</li>
							</ol>
						</nav>
					</div>
					<div class="col-md-6 col-sm-12 text-right">
						<div class="dropdown">
							<div class="pull-right">
								<a href="{!!  url()->previous() !!}" class="btn btn-primary btn-sm"><i class="fa fa-arrow-left"></i>Back</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
				<div class="clearfix mb-20">
					<div class="pull-left">
						<h5 class="text-blue">Blog Detail</h5>
					</div>
				</div>
				<div class="row">
					<div class="table-responsive">
						<table class="table table-striped">
							<tbody>
								<tr>
									<th scope="col">Blog category Name</th>
									<td>{!! $blog->blog_category_id !!}</td>
								</tr>
								<tr>
									<th scope="col">Blog Name</th>
									<td>{!! $blog->name !!}</td>
								</tr>
								<tr>
									<th scope="col">Blog Description</th>
									<td>{!! $blog->description !!}</td>
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
