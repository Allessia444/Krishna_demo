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
							<h4>Edit User</h4>
						</div>
						<nav aria-label="breadcrumb" role="navigation">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="index.php">Home</a></li>
								<li class="breadcrumb-item active" aria-current="page">User</li>
								<li class="breadcrumb-item active" aria-current="page">Edit User</li>
							</ol>
						</nav>
					</div>
					<div class="col-md-6 col-sm-12 text-right">
						<div class="dropdown">
							<a href="{!! route('users.index') !!}" class="btn btn-primary btn-sm scroll-click"  role="button"><i class="fa fa-back"></i>Back to User</a>
						</div>
					</div>
				</div>
			</div>
			<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
				{!! Former::open()->method('PATCH')->action(route('users.update',$user->id)) !!}    
				 <div class="form-group">
                    {!! Former::select('department_id')->label('User Name')->options($departments)->placeholder('Select Department name')->label('Department')->value($user->department_id) !!}  
                    </div>
                    <div class="form-group">
                    {!! Former::select('designation_id')->label('User Name')->options($designation)->placeholder('Select Designation name')->label('Designation')->value($user->designation_id) !!}  
                    </div>     
				{!! Former::text('name')->placeholder('User Name')->label('Name') !!}
				{!! Former::text('middle_name')->placeholder('Middle Name')->label('Middle Name')->value($user->middle_name) !!}
				{!! Former::text('last_name')->placeholder('Last Name')->label('Last Name') !!}
				
				 <div class="form-group">
                        <label>Photo</label>
                        <div class="clearfix" id="Photo_PreviewDiv">
                            <span></span>
                        </div>
                        <div id="photo_list"></div>
                        <div id="progressbar"></div>
                        <br />
                        <div class="form-group">
                            <div id="photo_container">      
                                <a class="btn btn-outline-primary" id="photo_pickfiles" href="javascript:;"><i class="fa fa-cloud-upload "></i>Upload File</a>
                            </div>
                        </div>
                        <span class="has-error student_file_error"></span>
                    </div>

				{!! Former::text('mobile')->placeholder('Mobile')->label('Mobile')->value($user->user_profile ? $user->user_profile->mobile : '-') !!}
				{!! Former::text('phone')->placeholder('Phone')->label('Phone')->value($user->phone) !!}
				{!! Former::textarea('address_1')->placeholder('Address')->label('Address')->value($user->user_profile ? $user->user_profile->address_1 : '-') !!}
				{!! Former::textarea('address_2')->placeholder('Permanent Address')->label('Permanent Address') !!}
				{!! Former::text('zipcode')->placeholder('Zip Code')->label('Zip Code')->value($user->user_profile ? $user->user_profile->zipcode : '-') !!}
				{!! Former::text('pan_number')->placeholder('Pan Number')->label('Pan Number')->value($user->user_profile ? $user->user_profile->pan_number : '-') !!}
				{!! Former::text('management_level')->placeholder('Level of Management')->label('Level of Management')->value($user->user_profile ? $user->user_profile->management_level : '-') !!}
				{!! Former::text('join_date')->class("form-control date-picker")->placeholder('Date Of Birth')->readonly()->label('Join Date')->value($user->user_profile ? $user->user_profile->join_date : '-') !!}

				 <div class="form-group">
                        <label>File</label>
                        <div class="clearfix" id="PreviewDiv">
                            <span></span>
                        </div>
                        <div id="attach_list"></div>
                        <div id="progressbar"></div>
                        <br />
                        <div class="form-group">
                            <div id="container">      
                                <a class="btn btn-outline-primary" id="pickfiles" href="javascript:;"><i class="fa fa-cloud-upload "></i>Upload File</a>
                            </div>
                        </div>
                        <span class="has-error student_file_error"></span>
                    </div>
                    {!! Former::text('google')->placeholder('google')->label('google')->value($user->user_profile ? $user->user_profile->google : '-') !!}
					{!! Former::text('facebook')->placeholder('facebook')->label('facebook')->value($user->user_profile ? $user->user_profile->facebook : '-') !!}
					{!! Former::text('website')->placeholder('website')->label('website')->value($user->user_profile ? $user->user_profile->website : '-') !!}
					{!! Former::text('skype')->placeholder('skype')->label('skype')->value($user->user_profile ? $user->user_profile->skype : '-') !!}
					{!! Former::text('linkedin')->placeholder('linkedin')->label('linkedin')->value($user->user_profile ? $user->user_profile->linkedin : '-') !!}
					{!! Former::text('twitter')->placeholder('twitter')->label('twitter')->value($user->user_profile ? $user->user_profile->twitter : '-') !!}
				{{-- <div class="col-lg-12 col-sm-12">
					<label class=""form-control"">Gender :</label>
					<div class="custom-control">
						<input type="radio" class="with-gap" name="gender" value="{!!  $user->user_profile->gender == 'male' ? 'selected' : '' !!}">Male
						<input type="radio" name="gender" class="with-gap" value="{!! $user->user_profile->gender == 'female' ? 'selected' : '' !!}">Female
					</div>
				</div> --}}
				{!! Former::text('dob')->class("form-control date-picker")->placeholder('Date Of Birth')->readonly()->label('Date Of Birth')->value($user->user_profile ? $user->user_profile->dob : '-') !!}
				{!! Former::textarea('hobby')->placeholder('Hobby')->label('Hobby')->value($user->user_profile ? $user->user_profile->hobby : '-') !!}
				{!! Former::text('city')->placeholder('City')->label('City')->value($user->user_profile ? $user->user_profile->city : '-') !!}
				{!! Former::text('state')->placeholder('State')->label('State')->value($user->user_profile ? $user->user_profile->state : '-') !!}
				{!! Former::text('country')->placeholder('Country')->label('Country')->value($user->user_profile ? $user->user_profile->country : '-') !!}
                <div class="col-lg-12 col-sm-12">
                    <input type="hidden" name="team_lied" value="0">
                    <input type="checkbox" name="team_lied" value="1">
                    <label>Are you team lead ?</label>
                </div>
				<div class="col-lg-10 col-sm-8">
					<input type="hidden" name="team_lied" value="0">
					<input type="checkbox" name="team_lied" value="1">
					<label>Active</label>
				</div>                    
				{!! Former::submit('Save') !!}
				{!! Former::close() !!}
			</div>
		</div>
	</div>
</div>
@endsection