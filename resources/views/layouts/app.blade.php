<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>DeskApp Dashboard</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,600,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
	<link rel="stylesheet" href="{!! asset('/css/main.css') !!}">
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-119386393-1');
	</script>
</head>
<body>
	@include('shared.header')
	@include('shared.sidebar')
	@yield('content')
	@include('shared.footer')
	<script src="{!! asset('/js/main.js') !!}"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#logout').click(function(e){
				e.preventDefault(this);
				$('#form').submit();
			});
		});
	</script>
	@yield('scripts')	
</body>
</html>