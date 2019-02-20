@extends('layouts.app')
@section('title')
@section('content')	
@if(Auth::user()->role == 'admin')
<div class="main-container">
	<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
		<div class="min-height-200px">
			<div class="page-header">
				<div class="row">
					<div class="col-md-6 col-sm-12">
						<div class="title">
							<h4>Blogs</h4>
						</div>
						<nav aria-label="breadcrumb" role="navigation">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="index.php">Home</a></li>
								<li class="breadcrumb-item active" aria-current="page">Blogs</li>
							</ol>
						</nav>
					</div>
					<div class="col-md-6 col-sm-12 text-right">
						<div class="dropdown">
							<div class="pull-right">
								<a href="{!! route('blogs.create') !!}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>Add Blog</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
				<div class="row">
					<table class="data-table stripe hover nowrap">
						<thead>
							<tr>
								<th class="table-plus datatable-nosort">Blog Name</th>
								<th>Blog Name</th>
								<th class="datatable-nosort">Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach($blogs as $blog)
							<tr>
								<td class="table-plus">{!! $blog->name !!}</td>
								<td>{!! $blog->blog_category_id !!}</td>
								<td>
									<div class="dropdown">
										<a class="btn btn-outline-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
											<i class="fa fa-ellipsis-h"></i>
										</a>
										<div class="dropdown-menu dropdown-menu-right">
											<a class="dropdown-item" href="{!!route('blogs.show',['id'=>$blog->id])!!}"><i class="fa fa-eye"></i> View</a>
											<a class="dropdown-item" href="{!!route('blogs.edit',['id'=>$blog->id])!!}"><i class="fa fa-pencil"></i> Edit</a>
											<form action="{{route('blogs.destroy',$blog->id)}}" method="POST">
											@method('DELETE')
											@csrf
											<button class="dropdown-item"  type="submit"><i class="fa fa-trash"></i>Delete</button>        
											</form>
										</div>
									</div>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@else
<div class="main-container">
		<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
			<div class="min-height-200px">
				<div class="container pd-0">
					<div class="page-header">
						<div class="row">
							<div class="col-md-12 col-sm-12">
								<div class="title">
									<h4>Contact Directory</h4>
								</div>
								<nav aria-label="breadcrumb" role="navigation">
									<ol class="breadcrumb">
										<li class="breadcrumb-item"><a href="index.php">Home</a></li>
										<li class="breadcrumb-item active" aria-current="page">Contact Directory</li>
									</ol>
								</nav>
							</div>
						</div>
					</div>
					<div class="contact-directory-list">
						<ul class="row">
							@foreach($blogs as $blog)
							<li class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
								<div class="contact-directory-box">
									<div class="contact-dire-info text-center">
										<div class="contact-avatar">
											<span>
												{!! $blog->photo_url() !!}
											</span>
										</div>
										<div class="contact-name">
											<h4>{!! $blog->name !!}</h4>
											<p>UI/UX designer</p>
											<div class="work text-success"><i class="ion-android-person"></i> Freelancer</div>
										</div>
										<div class="profile-sort-desc">
											{!! $blog->description !!}
										</div>
									</div>
									<div class="view-contact">
										<a class="dropdown-item" href="{!!route('blogs.show',['id'=>$blog->id])!!}"><i class="fa fa-eye"></i> View Blog</a>
									</div>
								</div>
							</li>
							@endforeach
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
@endif

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
