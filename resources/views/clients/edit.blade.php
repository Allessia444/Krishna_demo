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
							<h4>Edit Client</h4>
						</div>
						<nav aria-label="breadcrumb" role="navigation">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="index.php">Home</a></li>
								<li class="breadcrumb-item active" aria-current="page">Clients</li>
								<li class="breadcrumb-item active" aria-current="page">Edit Client</li>
							</ol>
						</nav>
					</div>
					<div class="col-md-6 col-sm-12 text-right">
						<div class="dropdown">
							<a href="{!! route('clients.index') !!}" class="btn btn-primary btn-sm scroll-click" ole="button"><i class="fa fa-arrow-left"></i>Back</a>
						</div>
					</div>
				</div>
			</div>
			<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
				{!! Former::open()->method('PATCH')->action(route('clients.update',$client->id)) !!} 
				<div class="form-group">
					{!! Former::select('industry_id')->label('User Name')->options($industries)->placeholder('Select user name')->label('Users') !!}  
				</div>
				<div class="form-group">
					{!! Former::text('name')->placeholder('Client Name')->label('Client Name') !!}
				</div>
				<div class="form-group">
					{!! Former::text('website')->placeholder('Confirm Hours') !!}
				</div>
				<div class="form-group">
					{!! Former::text('email')->placeholder('Confirm Hours') !!}
				</div>
				<div class="form-group">
					{!! Former::text('phone')->placeholder('Confirm Hours') !!}
				</div>
				<div class="form-group">
					{!! Former::text('fax')->placeholder('Confirm Hours') !!}
				</div>
				<div class="form-group">
					{!! Former::text('address_1')->placeholder('Confirm Hours') !!}
				</div>
				<div class="form-group">
					{!! Former::text('address_2')->placeholder('Confirm Hours') !!}
				</div>
				<div class="form-group">
					{!! Former::text('city')->placeholder('Confirm Hours') !!}
				</div>
				<div class="form-group">
					{!! Former::text('state')->placeholder('state') !!}
				</div>
				<div class="form-group">
					{!! Former::text('country')->placeholder('Confirm Hours') !!}
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