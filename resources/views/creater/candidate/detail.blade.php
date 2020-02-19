 @extends('layouts.section.electiondashboard')
@section('content')

 <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">details of <strong>{{ $candidate->title}}</strong></h1>
           
          </div>



      <form action="{{route('delete_candidate',['candidate'=>$candidate->id,'election'=>$election->id])}}" method="post">
        @csrf
        @method('delete')
        <button class="btn btn-danger" type="submit">Delete  candidate</button>
      </form>
      <br>
      

      <a href="{{route('candidate.edit',['candidate'=>$candidate->id,'election'=>$election->id])}}">

        <button class="btn btn-success" type="submit">Edit the candidate</button>
      
      </a>





 <section class="section_gap team_area lite_bg">
           <br>
           <br>
           <br>
      
      <div class="row">



        <!-- single-candidate -->



        <div class="col-lg-3 col-sm-6">
          <div class="single_member">
            <div class="author">
              <img src="{{asset('storage/'.$candidate->logo)}}" alt="">
            </div>
            <div class="author_decs">
              <div class="social_icons">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-linkedin"></i></a>
              </div>
              <h4>{{$candidate->title}}</h4>
                     
                      <br>
                      <br>
              <br>
              <br>
</div>
</div>
</div>
</div>
</section>

<h4>Description:</h4>

<p>{{$candidate->description}}</p>


 @endsection