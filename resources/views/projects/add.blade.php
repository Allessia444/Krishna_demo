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
								<h4>Add Project</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Project</li>
									<li class="breadcrumb-item active" aria-current="page">Add Project</li>
								</ol>
							</nav>
						</div>
						<div class="col-md-6 col-sm-12 text-right">
							<div class="dropdown">
								<a href="{!! route('projects.index') !!}" class="btn btn-primary btn-sm scroll-click" ole="button"><i class="fa fa-arrow-left"></i>Back</a>
							</div>
						</div>
					</div>
				</div>
				<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
					{!! Former::horizontal_open()->action(URL::route("projects.store"))->method('POST')->class('p-t-15')->role('form')->id('form') !!}     

						<div class="form-group">
							 {!! Former::select('user_id')->label('User Name')->options($users)->placeholder('Select user name')->label('Users') !!}  
						</div>
						<div class="form-group">
							{!! Former::text('name')->placeholder('Project Name')->label('Middle Name')->label('Project Name') !!}
						</div>
						<div class="form-group">
							{!! Former::text('confirm_hr')->placeholder('Confirm Hours')->label('Confirm Hours') !!}
						</div>
						<div class="form-group">
							{!! Former::submit('Save') !!}
						</div>
					 {!! Former::close() !!}
				</div>
			</div>
		</div>
	</div>
@endsection