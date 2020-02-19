 
 @extends('layouts.app911')
 @section('content')
   <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

       
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>myVote</title>
    <link rel="icon" href="welcomepage/img/favicon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="welcomepage/css/bootstrap.min.css">
    <!-- animate CSS -->
    <link rel="stylesheet" href="welcomepage/css/animate.css">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="welcomepage/css/owl.carousel.min.css">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="welcomepage/css/all.css">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="welcomepage/css/flaticon.css">
    <link rel="stylesheet" href="welcomepage/css/themify-icons.css">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="welcomepage/css/magnific-popup.css">
    <!-- swiper CSS -->
    <link rel="stylesheet" href="welcomepage/css/slick.css">
    <!-- style CSS -->
    <link rel="stylesheet" href="welcomepage/css/style.css">

    </head>
    <body>
            

            
@include('layouts.section.welcomeindex')

         
    </body>
</html>
@endsection