 @extends('layouts.auth')

@section('link')

<nav class="nav">
   <a class="nav-link" href="#">Home</a>
                     </nav>

                       <nav class="nav">
  <a class="nav-link" href="{{route('voter.scoreboard',['election'=>$election->id])}}">Scoreboard</a>
                     </nav>

                    <!--  <nav class="nav">
  <a class="nav-link" href="#">Clarification</a>
                     </nav> -->



@endsection

 @section('content')


<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" href="medicare/img/favicon.png" type="image/png">
  <title>Medicare Medical</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="{{asset('medicare/css/bootstrap.css')}}">
  <link rel="stylesheet" href="{{asset('medicare/vendors/linericon/style.css')}}">
  <link rel="stylesheet" href="{{asset('medicare/css/font-awesome.min.css')}}">

  <link rel="stylesheet" href="{{asset('medicare/vendors/owl-carousel/owl.carousel.min.css')}}">
  <link rel="stylesheet" href="{{asset('medicare/vendors/lightbox/simpleLightbox.css')}}">
  <link rel="stylesheet" href="{{asset('medicare/vendors/nice-select/css/nice-select.css')}}">
  <link rel="stylesheet" href="{{asset('medicare/vendors/animate-css/animate.css')}}">
  <!-- main css -->
  <link rel="stylesheet" href="{{asset('medicare/css/style.css')}}">
</head>

<body >

 

  <!--================ Start Team Area =================-->
 <section class="section_gap team_area lite_bg">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-7">
          <div class="main_title">
            <h2>Candidates For {{$election->title}} Election</h2>
            <p>{{$election->description}}</p>
          </div>
        </div>
      </div>

      
      <div class="row">
        <!-- single-team-member -->

        @foreach($candidates as $candidates)


        <div class="col-lg-3 col-sm-6">
          <div class="single_member">
            <div class="author">
              <img src="{{asset('storage/'.$candidates->logo)}}" alt="">
            </div>
            <div class="author_decs">
              <div class="social_icons">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-linkedin"></i></a>
              </div>
              <h4>{{$candidates->title}}</h4>

             <br>
             <br>
             <br>
             <br>
              <br>
              <br>
              <form method="post" action="{{route('scoreboard.vote',['election'=>$election->id,'candidate'=>$candidates->id])}}">
              @csrf
              @if(Auth::user()->vote)
               <button  disabled class="btn btn-success">Vote</button>
               @else
        <button class="btn btn-success">Vote</button>

              @endif
             </form>
            </div>
          </div>
          <br>
          <br>
                
             

                  
                  <br>
                  <br>

        </div>
@endforeach

</table>

        

  

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="medicare/js/jquery-3.2.1.min.js"></script>
  <script src="medicare/js/popper.js"></script>
  <script src="medicare/js/bootstrap.min.js"></script>
  <script src="medicare/js/stellar.js"></script>
  <script src="medicare/vendors/lightbox/simpleLightbox.min.js"></script>
  <script src="medicare/vendors/nice-select/js/jquery.nice-select.min.js"></script>
  <script src="medicare/vendors/owl-carousel/owl.carousel.min.js"></script>
  <script src="medicare/js/jquery.ajaxchimp.min.js"></script>
  <script src="medicare/vendors/counter-up/jquery.waypoints.min.js"></script>
  <script src="medicare/vendors/counter-up/jquery.counterup.js"></script>
  <script src="medicare/js/mail-script.js"></script>
  <!--gmaps Js-->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
  <script src="js/gmaps.min.js"></script>
  <script src="js/gmaps.min.js"></script>
  <script src="js/theme.js"></script>
</body>

</html>








@endsection 





 

