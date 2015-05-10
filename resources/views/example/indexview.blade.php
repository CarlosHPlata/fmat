<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Laravel</title>

	
	<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
	<link type="text/css" rel="stylesheet" href="{{ asset('css/materialize.min.css') }}"  media="screen,projection"/>

	<!-- Fonts -->

	

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>


	@include('example.partitions.Navbar')

		<div class="container">
				@include('example.partitions.Badges')

				<br><br><hr><br><br>

				@include('example.partitions.Buttons')
				
				<br><br><hr><br><br>

				@include('example.partitions.Cards')

				
				<br><br><hr><br><br>
				
				@include('example.partitions.Collections')

				<br><br><hr><br><br>

				@include('example.partitions.Forms')

				<br><br><hr><br><br>

				@include('example.partitions.Icons')

				<br><br><hr><br><br>

				@include('example.partitions.Pagination')

				<br><br><hr><br><br>

				@include('example.partitions.Preloader')
		</div>

	@include('example.partitions.Footer')


	<!-- Scripts -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/materialize.min.js') }}"></script>
    
	<!-- El siguiente codigo inicia el menu movil -->
    <script type="text/javascript">
    	$(".button-collapse").sideNav();
    </script>
</body>
</html>