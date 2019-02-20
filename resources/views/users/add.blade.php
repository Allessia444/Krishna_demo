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
							<h4>Add User</h4>
						</div>
						<nav aria-label="breadcrumb" role="navigation">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="index.php">Home</a></li>
								<li class="breadcrumb-item active" aria-current="page">Add User </li>
							</ol>
						</nav>
					</div>
					<div class="col-md-6 col-sm-12 text-right">
						<div class="dropdown">
							<a href="{!! route('users.index') !!}" class="btn btn-primary btn-sm scroll-click"  role="button"><i class="fa fa-arrow-left"></i>Back</a>
						</div>
					</div>
				</div>
			</div>
			<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
				<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
					{!! Former::horizontal_open()->action(URL::route("users.store"))->method('POST')->class('p-t-15')->role('form')->id('form') !!}
                    <div class="form-group">
                    {!! Former::select('department_id')->label('User Name')->options($departments)->placeholder('Select Department name')->label('Department') !!}  
                    </div>
                    <div class="form-group">
                    {!! Former::select('designation_id')->label('User Name')->options($designation)->placeholder('Select Designation name')->label('Designation') !!}  
                    </div>     
				{!! Former::text('name')->placeholder('User Name')->label('Name') !!}
				{!! Former::text('middle_name')->placeholder('Middle Name')->label('Middle Name') !!}
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

				{!! Former::text('mobile')->placeholder('Mobile')->label('Mobile') !!}
				{!! Former::text('phone')->placeholder('Phone')->label('Phone') !!}
				{!! Former::textarea('address_1')->placeholder('Address')->label('Address') !!}
				{!! Former::textarea('address_2')->placeholder('Permanent Address')->label('Permanent Address') !!}
				{!! Former::text('zipcode')->placeholder('Zip Code')->label('Zip Code') !!}
				{!! Former::text('pan_number')->placeholder('Pan Number')->label('Pan Number') !!}
				{!! Former::text('management_level')->placeholder('Level of Management')->label('Level of Management') !!}
				{!! Former::text('join_date')->class("form-control date-picker")->placeholder('Date Of Birth')->readonly()->label('Join Date') !!}

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
                    {!! Former::text('google')->placeholder('google')->label('google') !!}
					{!! Former::text('facebook')->placeholder('facebook')->label('facebook') !!}
					{!! Former::text('website')->placeholder('website')->label('website') !!}
					{!! Former::text('skype')->placeholder('skype')->label('skype') !!}
					{!! Former::text('linkedin')->placeholder('linkedin')->label('linkedin') !!}
					{!! Former::text('twitter')->placeholder('twitter')->label('twitter') !!}
				<div class="col-lg-12 col-sm-12">
					<label class=""form-control"">Gender :</label>
					<div class="custom-control">
						<input type="radio" class="with-gap" name="gender" value="male">Male
						<input type="radio" name="gender" class="with-gap" value="female">Female
					</div>
				</div>
				{!! Former::text('dob')->class("form-control date-picker")->placeholder('Date Of Birth')->readonly()->label('Date Of Birth') !!}
				{!! Former::textarea('hobby')->placeholder('Hobby')->label('Hobby') !!}
				{!! Former::text('city')->placeholder('City')->label('City') !!}
				{!! Former::text('state')->placeholder('State')->label('State') !!}
				{!! Former::text('country')->placeholder('Country')->label('Country') !!}
                <div class="col-lg-12 col-sm-12">
                    <input type="hidden" name="team_lied" value="0">
                    <input type="checkbox" name="team_lied" value="1">
                    <label>Are you team lead ?</label>
                </div>
                <div class="col-lg-12 col-sm-12">
                    <input type="hidden" name="active" value="0">
                    <input type="checkbox" name="active" value="1">
                    <label>Active</label>
                </div>
				{!! Former::submit('Save') !!}
				{!! Former::close() !!}
			</div>
		</div>
	</div>
</div>
@endsection
@section('scripts')
<script type="text/javascript" src="{!! asset('/js/plupload.full.min.js') !!}"></script>
<script>
 $(document).ready(function() {
    		var student_uploader1 = new plupload.Uploader({
                runtimes : 'html5,flash,silverlight,html4',
                browse_button : 'pickfiles',
                container: document.getElementById('container'),
                url : "{{ asset('plupload/upload.php') }}",
                multi_selection:true, 
                    filters : {
                            max_file_size : '10mb',
                            mime_types: [
                                {title : "Image files", extensions : "jpg,gif,png"},
                            ]
                    },
                flash_swf_url : "{{ asset('plupload/Moxie.swf') }}",
                silverlight_xap_url : "{{asset('plupload/Moxie.xap')}}",
                init: {
                    PostInit: function() {
                        document.getElementById('attach_list').innerHTML = '';
                    },
                    FilesAdded: function(up, files) {
                        student_uploader1.start();
                        jQuery('#loading').show();
                    },
                    FileUploaded: function(up,file) {
                        var input = document.createElement("input");
                        input.type = "hidden";
                        input.name = "attach";
                        input.value = file.name;
                        $(input).appendTo("#container");
                    },
                    UploadComplete: function(up, files){
                        var tmp_url = '{!! asset('/tmp/') !!}';
                        $('#PreviewDiv >img').remove();
                        $('#PreviewDiv >input').remove();
                        plupload.each(files, function(file) {                     
                            $('#PreviewDiv').append("<img src='"+tmp_url +"/"+ file.name+"' id='preview' height='100px' width='100px'/>");
                        });
                        jQuery('#loading').hide();
                    },
                    Error: function(up, err) {
                        alert(err.message);
                    }
                }
            });
            student_uploader1.init();

        var student_uploader = new plupload.Uploader({
            runtimes : 'html5,flash,silverlight,html4',
            browse_button : 'photo_pickfiles',
            container: document.getElementById('photo_container'),
            url : "{{ asset('plupload/upload.php') }}",
            multi_selection:true, 
                filters : {
                        max_file_size : '10mb',
                        mime_types: [
                            {title : "Image files", extensions : "jpg,gif,png"},
                        ]
                },
            flash_swf_url : "{{ asset('plupload/Moxie.swf') }}",
            silverlight_xap_url : "{{asset('plupload/Moxie.xap')}}",
            init: {
                PostInit: function() {
                    document.getElementById('photo_list').innerHTML = '';
                },
                FilesAdded: function(up, files) {
                    student_uploader.start();
                    jQuery('#loading').show();
                },
                FileUploaded: function(up,file) {
                    var input = document.createElement("input");
                    input.type = "hidden";
                    input.name = "photo";
                    input.value = file.name;
                    $(input).appendTo("#photo_container");
                },
                UploadComplete: function(up, files){
                    var tmp_url = '{!! asset('/tmp/') !!}';
                    $('#Photo_PreviewDiv >img').remove();
                    $('#Photo_PreviewDiv >input').remove();
                    plupload.each(files, function(file) {                     
                        $('#Photo_PreviewDiv').append("<img src='"+tmp_url +"/"+ file.name+"' id='preview' height='100px' width='100px'/>");
                    });
                    jQuery('#loading').hide();
                },
                Error: function(up, err) {
                    alert(err.message);
                }
            }
        });
        student_uploader.init();         
});

</script>
@endsection