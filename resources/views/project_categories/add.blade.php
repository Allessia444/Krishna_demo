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
								<h4>Add Project Category</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Project Category</li>
									<li class="breadcrumb-item active" aria-current="page">Add Project Category</li>
								</ol>
							</nav>
						</div>
						<div class="col-md-6 col-sm-12 text-right">
							<div class="dropdown">
								<a href="{!! route('project_categories.index') !!}" class="btn btn-primary btn-sm scroll-click" ole="button"><i class="fa fa-arrow-left"></i>Back</a>
							</div>
						</div>
					</div>
				</div>
				<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
					{!! Former::horizontal_open()->action(URL::route("project_categories.store"))->method('POST')->class('p-t-15')->role('form')->id('form') !!}     
						{!! Former::select('parent_id')->label('Project Categories')->options($project_categories)->placeholder('Project Categories') !!}  
						<div class="form-group">
							{!! Former::text('name')->placeholder('Project Category Name')->label('Project Name') !!}
						</div>
						<div class="form-group">
							{!! Former::text('lft')->placeholder('Project Category LFT')->label('LFT') !!}
						</div>
						<div class="form-group">
							{!! Former::text('rgt')->placeholder('Project Category RGT')->label('RGT') !!}
						</div>
						<div class="form-group">
							{!! Former::text('depth')->placeholder('Project Category depth')->label('Depth') !!}
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