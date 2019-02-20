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
								<h4>Add User Experience</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Users</li>
									<li class="breadcrumb-item active" aria-current="page">User Experience</li>
									<li class="breadcrumb-item active" aria-current="page">Add User Experience</li>
								</ol>
							</nav>
						</div>
						<div class="col-md-6 col-sm-12 text-right">
							<div class="dropdown">
								<a href="{!! route('users.experiences.index',['id'=>$user_id]) !!}" class="btn btn-primary btn-sm scroll-click" ole="button"><i class="fa fa-arrow-left"></i>Back</a>
							</div>
						</div>
					</div>
				</div>
				<div id="main" class="pd-20 bg-white border-radius-4 box-shadow mb-30">

					<form method="post" action="{!! route('users.experiences.store', $user_id)!!}">
					@csrf
					<div id="sections">
						<div class="section">
							<span id="label">Experience</span>
							{{-- <input type="hidden" name="user_id" value="{!! $id !!}"> --}}
							<div class="form-group row">
								<label class="col-sm-12 col-md-2 col-form-label" for="company_name">Company Name</label>
								<div class="col-sm-12 col-md-10">
									<input class="form-control" id="company_name" type="text" placeholder="" name="company[]" value="{{ old('company') }}">
									@if($errors->has('company'))<span>{!! $errors->first('company') !!}</span>@endif
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-12 col-md-2 col-form-label" for="from">From</label>
								<div class="col-sm-12 col-md-10">
									<input class="form-control date-picker" id="from" placeholder="Select Date" type="text" name="from[]" >
									@if($errors->has('from'))<span>{!! $errors->first('from') !!}</span>@endif
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-12 col-md-2 col-form-label" for="to">To</label>
								<div class="col-sm-12 col-md-10">
									<input class="form-control date-picker" placeholder="Select Date" type="text" name="to[]" id="to">
									@if($errors->has('to'))<span>{!! $errors->first('to') !!}</span>@endif
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-12 col-md-2 col-form-label" for="salary">Salary</label>
								<div class="col-sm-12 col-md-10">
									<input class="form-control" type="text" placeholder="" name="salary[]" value="{{ old('salary') }}" id="salary">
									@if($errors->has('salary'))<span>{!! $errors->first('salary') !!}</span>@endif
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-12 col-md-2 col-form-label" for="reason">Reason</label>
								<div class="col-sm-12 col-md-10">
									<input class="form-control" type="text" placeholder="" name="reason[]" id="reason" value="{{ old('reason') }}">
									@if($errors->has('reason'))<span>{!! $errors->first('reason') !!}</span>@endif
								</div>
							</div>
							<p><a href="#" class='remove'>Remove Section</a></p>
						</div>
					</div>
					<div class="form-group row">
						<input type="submit" name="submit" value="Save" id="submit" class="btn btn-primary ml-3">
					</div>
				</form>
				<div class="form-group row">
					<input type="button" name="add" value="Add Exp" id="exp" class="btn btn-primary ml-3">
				</div>
				</div>
			</div>
		</div>
	</div>
@endsection
@section('scripts')
<script type="text/javascript">
	var template = $('#sections .section:first').clone();
	var sectionsCount = 1;
	$('body').on('click', '#exp', function() {

//increment
sectionsCount++;

//loop through each input
var section = template.clone().find(':input').each(function(){

//set id to store the updated section number
var newId = this.id + sectionsCount;
/*clone.find("input").val("");*/
//update for label
$(this).prev().attr('for', newId);


//update id
this.id = newId;

}).end()

//inject new section
.appendTo('#sections');
return false;
});
	$('#sections').on('click', '.remove', function() {
//fade out section
$(this).parent().fadeOut(300, function(){
//remove parent element (main section)
$(this).parent().empty();
return false;
});
return false;
});
</script>
@endsection