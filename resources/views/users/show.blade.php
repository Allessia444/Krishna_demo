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
							<h4>User Detail</h4>
						</div>
						<nav aria-label="breadcrumb" role="navigation">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="index.php">Home</a></li>
								<li class="breadcrumb-item active" aria-current="page">User Detail</li>
							</ol>
						</nav>
					</div>
					<div class="col-md-6 col-sm-12 text-right">
						<div class="dropdown">
							<div class="pull-right">
								<a href="{!! route('users.index') !!}" class="btn btn-primary btn-sm"><i class="fa fa-"></i>Back to Users</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
				<div class="clearfix mb-20">
					<div class="pull-left">
						<h5 class="text-blue">User Detail</h5>
					</div>
				</div>
				<div class="row">
					<div class="table-responsive">
						<table class="table table-striped">
							<tbody>
								<tr>
									<th scope="col">Name</th>
									<td>{!! $user->name !!}</td>
								</tr>
								<tr>
									<th scope="col">Middle Name</th>
									<td>{!! $user->middle_name !!}</td>
								</tr>
								<tr>
									<th scope="col">Last Name</th>
									<td>{!! $user->last_name !!}</td>
								</tr>
								<tr>
									<th scope="col">Gender</th>
									<td>{!! $user->gender !!}</td>
								</tr>
								<tr>
									<th scope="col">Date of birth</th>
									<td>{!! $user->dob !!}</td>
								</tr>
								<tr>
									<th scope="col">Hobby</th>
									<td>{!! $user->hobby !!}</td>
								</tr>							
								<tr>
									<th scope="col">Address</th>
									<td>{!! $user->address !!}</td>
								</tr>
								<tr>
									<th scope="col">City</th>
									<td>{!! $user->city !!}</td>
								</tr>
								<tr>
									<th scope="col">State</th>
									<td>{!! $user->state !!}</td>
								</tr>
								<tr>
									<th scope="col">Country</th>
									<td>{!! $user->country !!}</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
				<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
				<div class="row">
					<table class="data-table stripe hover nowrap">
						<thead>
							<tr>
								<th class="table-plus datatable-nosort">Blog Name</th>
								<th>Blog Category Name</th>
								<th>Description</th>
							</tr>
						</thead>
						<tbody>
							@foreach($blogs as $blog)
							<tr>
								<td class="table-plus">{!! $blog->name !!}</td>
								<td>{!! $blog->blog_category_id !!}</td>
								<td>{!! $blog->description !!}</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('scripts')	
<script>
	$('document').ready(function(){
		jQuery("[data-confirm]").bind("click",function(e){
			e.preventDefault();    
			var message = jQuery(this).data('confirm')? jQuery(this).data('confirm') : 'Are you sure?';    
			if(confirm(message))    
			{        
				var form = jQuery('<form />').attr('method','post').attr('action',jQuery(this).attr('href'));    
				console.log(form);
				message != "Are you sure want to logout?" ? jQuery('<input />').attr('type','hidden').attr('name','_method').attr('value','delete').appendTo(form) : "";      
				jQuery('<input />').attr('type','hidden').attr('name','_token').attr('value',jQuery('meta[name="_token"]').attr('content')).appendTo(form);      
				jQuery('body').append(form);      
				form.submit();    
			}  
		});
		$('.data-table').DataTable({
			scrollCollapse: true,
			autoWidth: false,
			responsive: true,
			columnDefs: [{
				targets: "datatable-nosort",
				orderable: false,
			}],
			"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
			"language": {
				"info": "_START_-_END_ of _TOTAL_ entries",
				searchPlaceholder: "Search"
			},
		});
		$('.data-table-export').DataTable({
			scrollCollapse: true,
			autoWidth: false,
			responsive: true,
			columnDefs: [{
				targets: "datatable-nosort",
				orderable: false,
			}],
			"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
			"language": {
				"info": "_START_-_END_ of _TOTAL_ entries",
				searchPlaceholder: "Search"
			},
			dom: 'Bfrtip',
			buttons: [
			'copy', 'csv', 'pdf', 'print'
			]
		});
		var table = $('.select-row').DataTable();
		$('.select-row tbody').on('click', 'tr', function () {
			if ($(this).hasClass('selected')) {
				$(this).removeClass('selected');
			}
			else {
				table.$('tr.selected').removeClass('selected');
				$(this).addClass('selected');
			}
		});
		var multipletable = $('.multiple-select-row').DataTable();
		$('.multiple-select-row tbody').on('click', 'tr', function () {
			$(this).toggleClass('selected');
		});
	});
</script>
@endsection
