<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>@yield('titulo', 'CeSVet')</title>
	{{-- Imports de estilos y librerías CSS --}}
	<link rel="stylesheet" href="/css/bootstrap.css">
	<link href="fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="fontawesome/css/brands.css" rel="stylesheet">
    <link href="fontawesome/css/solid.css" rel="stylesheet">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="fonts.css" media="screen"/>
	<link rel="stylesheet" href="/css/app.css">
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
</head>
<body>
		@include('partials/navbar')
	<div class="container-fluid">
		@yield('content')
	</div>
	<footer>
		@include('partials/footer')
	</footer>
	{{-- Imports de Librerías y archivos Javascript --}}
	<script src="/js/app.js"></script>
</body>
</html>