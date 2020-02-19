


<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" href="medicare/img/favicon.png" type="image/png">
  <title>PublicElection</title>
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
 <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
<!--     script  -->    
 <script src="{{asset('js/app.js')}}"></script>

</head>

<body onload="fun()">

<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">

                    <ul class="navbar-nav mr-auto">
                      
                       <nav class="nav">
<a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}

                </a> 

  <a class="nav-link"  href="{{route('voters.public.scoreboard',['election'=>$election->id])}}">Scoreboard</a>


 






</ul>

@isset($canvote)

@else
<ul class="navbar-nav ml-auto" >
  <!-- Button trigger modal -->
<button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#ruleofelection">
SIGN UP TO VOTE
</button>


</ul>

@endisset

</nav>


<!-- Modal -->
<div class="modal fade" id="ruleofelection" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Sign up to vote</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form method="post" action="{{route('signuptovote',['election'=>$election->id])}}">

            @csrf
  <div class="form-group">
    <label for="email">E-MAIL</label>
    <input type="text" class="form-control" id="email" placeholder="Enter ur email here pls" name="email">
    <small>we will send to u a link and pls back and vote </small>
  </div>

          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
           <a href="{{route('last.confirm',['election'=>$election])}}">
                     <button type="submit" class="btn btn-primary">Submit</button>

 
                        </form>
           </a>

      </div>
    </div>
  </div>
</div>
</a>

<br>
<br>
<div class="container">
  <div class="btn btn-info btn-outline-info">
          
<span id="lefttime" class="text-center" style="color:black;">
    Time Left: <span id="time_left"></span>

 </span>


</div>

</div>





</div>

</div>

  <!--================ Start Team Area =================-->





 <section class="section_gap team_area lite_bg">
    <div class="container">
                 @include('common.error')
                  @include('common.success')
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
              
              
              <a href="{{route('candidate.moreinfo',['candidate'=>$candidates->id])}}" target="__black">MoreInfo</a>

               <br>
               <br>
               <br>
              <br>
              <br>

              @isset($canvote)
              <form method="post" action="{{route('scoreboard.vote',['election'=>$election->id,'candidate'=>$candidates->id,'id'=>$public_voter->id])}}">
              @csrf
              @if(!$public_voter->vote)
               <button class="btn btn-success" >Vote</button>
               </form>
              
               @else
               <button class="btn btn-success" disabled>Vote</button>
               
              @endif

              @else
                <button class="btn btn-success" disabled>Vote</button>
               
              @endisset

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
  <!-- <script src="medicare/js/jquery-3.2.1.min.js"></script>
  <script src="medicare/js/popper.js"></script>
  <script src="medicare/js/bootstrap.min.js"></script>
  <script src="medicare/js/stellar.js"></script>
  <script src="medicare/vendors/lightbox/simpleLightbox.min.js"></script>
  <script src="medicare/vendors/nice-select/js/jquery.nice-select.min.js"></script>
  <script src="medicare/vendors/owl-carousel/owl.carousel.min.js"></script>
  <script src="medicare/js/jquery.ajaxchimp.min.js"></script>
  <script src="medicare/vendors/counter-up/jquery.waypoints.min.js"></script>
  <script src="medicare/vendors/counter-up/jquery.counterup.js"></script>
  <script src="medicare/js/mail-script.js"></script> -->
  <!--gmaps Js-->
  <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script> -->
  <!-- <script src="js/gmaps.min.js"></script>
  <script src="js/gmaps.min.js"></script>
  <script src="js/theme.js"></script> -->

<script type="text/javascript">
  
function fun() {


  let url="{{route('public.election.lefttime',['election'=>$election->id])}}";
  let xml=new XMLHttpRequest();
  xml.onreadystatechange=function(){


document.getElementById("time_left").innerHTML = xml.responseText;

}
xml.open("GET",url,true);
xml.send();

}


setInterval(fun,2000);










</script>










</body>

</html>












 

