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
							<h4>Edit Task Category</h4>
						</div>
						<nav aria-label="breadcrumb" role="navigation">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="index.php">Home</a></li>
								<li class="breadcrumb-item active" aria-current="page">Task Categories</li>
								<li class="breadcrumb-item active" aria-current="page">Edit Task Category</li>
							</ol>
						</nav>
					</div>
					<div class="col-md-6 col-sm-12 text-right">
						<div class="dropdown">
							<a href="{!! route('task_categories.index') !!}" class="btn btn-primary btn-sm scroll-click" ole="button"><i class="fa fa-arrow-left"></i>Back</a>
						</div>
					</div>
				</div>
			</div>
			<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
				{!! Former::open()->method('PATCH')->action(route('task_categories.update',$task_category->id)) !!}    
				<div class="form-group">
					{!! Former::text('name')->placeholder('Task Category Name')->label('Task Category Name')->label('Task Category Name') !!}
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