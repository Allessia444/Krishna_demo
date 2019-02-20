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
							<h4>Edit Task</h4>
						</div>
						<nav aria-label="breadcrumb" role="navigation">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="index.php">Home</a></li>
								<li class="breadcrumb-item active" aria-current="page">Tasks</li>
								<li class="breadcrumb-item active" aria-current="page">Edit Task</li>
							</ol>
						</nav>
					</div>
					<div class="col-md-6 col-sm-12 text-right">
						<div class="dropdown">
							<a href="{!! route('tasks.index') !!}" class="btn btn-primary btn-sm scroll-click" ole="button"><i class="fa fa-arrow-left"></i>Back</a>
						</div>
					</div>
				</div>
			</div>
			<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
				{!! Former::open()->method('PATCH')->action(route('tasks.update',$task->id)) !!}    
				{!! Former::select('task_category_id')->label('Task Categories')->options($task_category)->placeholder('Task Categories') !!}  
                <div class="form-group">
                    {!! Former::text('name')->placeholder('Task Name')->label('Task Name') !!}
                </div>
            <div class="form-group">
                {!! Former::textarea('notes')->placeholder('Task Notes')->label('Task Notes') !!}
            </div>
            {!! Former::text('start_date')->class("form-control date-picker")->placeholder('Start Date')->readonly()->label('Start Date') !!}
            {!! Former::text('end_date')->class("form-control date-picker")->placeholder('End Date')->readonly()->label('End Date') !!}
            <div class="col-lg-12 col-sm-12">
                <label class=""form-control"">Gender :</label>
                <div class="custom-control">
                    <input type="radio" class="with-gap" name="priority" value="none" {!! $task->priority == 'none' ? 'checked' : '' !!}>None
                    <input type="radio" class="with-gap" name="priority" value="low" {!! $task->priority == 'low' ? 'checked' : '' !!}>Low
                    <input type="radio" class="with-gap" name="priority" value="high" {!! $task->priority == 'high' ? 'checked' : '' !!}>High
                    <input type="radio" name="priority" class="with-gap" value="medium" {!! $task->priority == 'medium' ? 'checked' : '' !!}>Medium
                </div>
            </div>
             <div class="form-group">
                {!! Former::submit('Save') !!}
            </div>
            </div>
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