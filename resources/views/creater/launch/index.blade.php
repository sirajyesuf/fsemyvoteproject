@extends('layouts.section.electiondashboard')
@section('content')

 <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2"><strong>Launch Election  </strong>{{$election->title}}</h1><small>building</small>
           
          </div>

@include('common.error')
@include('common.success')

@isset($firstconfirmstart)








 <div class="card" style="width: 50rem;">
<div class="card-header">
Confirm  Election Details
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item"><h6 class="h6">Title</h6> {{$election->title}} 
      <a href="{{route('esetting.index',['election'=>$election->id])}}">edit</a>
    </li>

    <li class="list-group-item"><h6 class="h6">StartDate</h6>{{$start_date}} 
      <a href="{{route('esetting.index',['election'=>$election->id])}}">edit</a>
    </li>
    <li class="list-group-item"><h6 class="h6">EndDate</h6>{{$end_date}} 
      <a href="{{route('esetting.index',['election'=>$election->id])}}">edit</a>
    </li>
  </ul>
</div>
<br>
<br>
  




<div>
  <a href="{{route('first.confirm',['election'=>$election->id])}}"><button class="btn btn-success">Continue</button></a>
</div>

@endisset
@isset($firstconfirm)








<p><strong>Confirm Candidates and voters
</strong></p>

<ul class="list-group">
  <li class="list-group-item d-flex justify-content-between align-items-center">
   ++ Number of Candidates
    <span class="badge badge-primary badge-pill">{{count($candidates)>0?count($candidates):"NO Candidate Please Add"}}</span>
  </li>
   @if(!$election->typeof_election)
  <li class="list-group-item d-flex justify-content-between align-items-center">
   ++ Number Of Voters
    <span class="badge badge-primary badge-pill">{{$number_voter>0?$number_voter:"NO Voter Please Add"}}</span>
  </li>
   @endif
  <li class="list-group-item d-flex justify-content-between align-items-center">
   ++ Type Of Election
    <span class="badge badge-primary badge-pill">{{$election->typeof_election?"public":"private"}}</span>
  </li>
</ul>




<br>
<br>


  
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ruleofelection">
  Launch the Election
</button>

<!-- Modal -->
<div class="modal fade" id="ruleofelection" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Rule of Election </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <p>
            
            for the integration of the process of election you can't add or delete any candidate and voter.but you can stop the election at any time .
          </p>
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
           <a href="{{route('last.confirm',['election'=>$election])}}">
                     <button type="button" class="btn btn-primary">Confirm Launch</button>


           </a>

      </div>
    </div>
  </div>
</div>
</a>



</div>

</div>

</main>          


@endisset


        
@endsection