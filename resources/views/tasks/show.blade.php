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
							<h4>Task Detail</h4>
						</div>
						<nav aria-label="breadcrumb" role="navigation">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="index.php">Home</a></li>
								<li class="breadcrumb-item active" aria-current="page">Task Detail</li>
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
						<h5 class="text-blue">Task Detail</h5>
					</div>
				</div>
				<div class="row">
					<div class="table-responsive">
						<table class="table table-striped">
							<tbody>
								<tr>
									<th scope="col">Task category Name</th>
									<td>{!! $task->task_category ? $task->task_category : ''!!}</td>
								</tr>
								<tr>
									<th scope="col">Task Name</th>
									<td>{!! $task->name !!}</td>
								</tr>
								<tr>
									<th scope="col">Task Notes</th>
									<td>{!! $task->notes !!}</td>
								</tr>
								<tr>
									<th scope="col">Task Start date</th>
									<td>{!! $task->start_date !!}</td>
								</tr>
								<tr>
									<th scope="col">Task End Date</th>
									<td>{!! $task->end_date !!}</td>
								</tr>
								<tr>
									<th scope="col">Task Priority</th>
									<td>{!! $task->priority !!}</td>
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
