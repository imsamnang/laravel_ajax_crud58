<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<title>@yield('pagetitle','Applephagna Ecommerce')</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="OneTech shop project">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="{{asset('front/styles/bootstrap4/bootstrap.min.css')}}">
	@push('css')
		
	@endpush
	<link rel="stylesheet" href="{{asset('front/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css')}}"> 
	<link rel="stylesheet" href="{{asset('front/plugins/OwlCarousel2-2.2.1/owl.carousel.css')}}">
	<link rel="stylesheet" href="{{asset('front/plugins/OwlCarousel2-2.2.1/owl.theme.default.css')}}">
	<link rel="stylesheet" href="{{asset('front/plugins/OwlCarousel2-2.2.1/animate.css')}}">
	<link rel="stylesheet" href="{{asset('front/plugins/slick-1.8.0/slick.css')}}">
	<link rel="stylesheet" href="{{asset('front/styles/main_styles.css')}}">
	<link rel="stylesheet" href="{{asset('front/styles/responsive.css')}}">
</head>