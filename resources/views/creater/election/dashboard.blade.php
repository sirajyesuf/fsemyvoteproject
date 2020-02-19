@extends('layouts.app')
@section('content')

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content=""> 
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Dashboard Template for Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/dashboard/">

    <!-- Bootstrap core CSS -->
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
  </head>

  <body >


    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link active" href="{{route('electiondashboard',['election'=>$election->id])}}">
                  <span data-feather="home"></span>
                  Dashboard<span class="sr-only">(current)</span>
                </a>
              </li>
              @if(!$election->status)
              <li class="nav-item">
                <a class="nav-link" href="{{route('addcandidate',['election'=>$election->id])}}">
                  <span data-feather="file"></span>
                  ADDCandidates
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="{{route('election.result',['election'=>$election->id])}}">
                  <span data-feather="file"></span>
                  Result
                </a>
              </li>

              @endif
            @if(!$election->typeof_election)
            @if(!$election->status)
              <li class="nav-item">
                <a class="nav-link" href="{{route('voter.index',['election'=>$election->id])}}">
                  <span data-feather="users"></span>
                  ADDVoters
                </a>
              </li>


              
              @endif

              @endif

              

              @if(!$election->status)

              
               <li class="nav-item">
                <a class="nav-link" href="{{route('esetting.index',['election'=>$election->id])}}">
                  <span class="fas fa-cogs"></span>
                  Setting
                </a>
              </li>
            @endif

              @if(!$election->status)
              <li class="nav-item">
                <a class="nav-link" href="{{route('launch.index',['election'=>$election->id])}}">
                  <span class="fas fa-cogs"></span>
                   <button  class="btn btn-outline-success my-2 my-sm-0" type="submit">Launch</button>
                </a>
              </li> 
              @else

              




              <li class="nav-item">
                <a class="nav-link" href="{{route('cancel.election',['election'=>$election->id])}}">
                  <span class="fas fa-cogs"></span>
                   <button  class="btn btn-outline-danger my-2 my-sm-0" type="submit">Cancel</button>
                </a>
              </li> 
              @endif
            </ul>

            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
              
            </h6>
            
          </div>
        </nav>
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
           
       <h2 class="h2"><strong>{{$election->title}}</strong>  </h2>           
          </div>     
               <div class="alert alert-primary" id="div" style="display: none">
               </div>

                     @include('common.success')


  @if(!$election->status)

    <div class="card-deck mb-3 text-center">  
      @if(!$election->typeof_election)
  <div class="col-sm-6">
    
      <div class="card-body">

          <div class="card-deck mb-3 text-center">
    <div class="card mb-4 shadow-sm">
      <div class="card-header">
        <h4 class="my-0 font-weight-normal">Voters</h4>
      </div>
      <div class="card-body">
        <h1 class="card-title pricing-card-title">{{$no_voters}}<small class="text-muted"></small></h1>
        <ul class="list-unstyled mt-3 mb-4">
         
          
        </ul>
       <a href="{{route('voters.show',['election'=>$election->id])}}"> <button type="button" class="btn btn-lg btn-block btn-outline-primary">See the Detail</button></a>
      </div>
    </div>

      </div>
    </div>
  </div>
  @endif
  <div class="col-sm-6">
    
      <div class="card-body">

          <div class="card-deck mb-3 text-center">
    <div class="card mb-4 shadow-sm">
      <div class="card-header">
        <h4 class="my-0 font-weight-normal">Candidates</h4>
      </div>
      <div class="card-body">

        <h1 class="card-title pricing-card-title">{{$no_candidates}}<small class="text-muted"></small></h1>
        <ul class="list-unstyled mt-3 mb-4">
          
          
        </ul>
       <a href="{{route('listofcandidate',['election'=>$election->id])}}"> <button type="button" class="btn btn-lg btn-block btn-outline-primary">See the Detail</button></a>
      </div>
    </div>

      </div>
    </div>
  </div>
</div>

<div>
 @endif         
@if($election->status)

<script type="text/javascript">


function fun(){


var xhr=new XMLHttpRequest();
var url="{{url(route('election.lefttime',['election'=>$election->id]))}}";
xhr.onreadystatechange=function(){

// if(xhr.status==200 && xhr.readystate==4)

// console.log(xhr.responseText);

if(xhr.responseText==1){

document.getElementById("lt").style.visibility="hidden";

}

else{

document.getElementById("lefttime").innerHTML=xhr.responseText;

}

}
xhr.open("GET",url,true);
xhr.send();


  
}

setInterval(fun,1000);

  


</script>    

<div class="row mb-3">
      <div class="col-12 col-md-8 mb-3 mb-md-0">

    <div class="card card-gray card-gray-compact">
      <h5 class="card-header">
        <!----><i class="icon-globe ng-star-inserted"></i> 
        ELECTION DETAILS
      </h5>
      <div class="card-body">
      @if(!$election->typeof_election)  
    <div class="form-group">
      <label for="voting_url">Election URL</label>
      <div class="input-group">
        <input appselectonfocus="" class="form-control" type="text" value="{{$election->url}}">
        
      </div>
    </div>
    @endif

     <div class="form-group">
      <label for="short_url">Start_date</label>
      <div class="input-group">
        <input appselectonfocus="" class="form-control" type="text" value="{{$election->start_date}}"  disabled>
                  
        
      </div>
    </div>
    <div class="form-group">
      <label for="short_url">End_date</label>
      <div class="input-group">
        <input appselectonfocus="" class="form-control" type="text" value="{{$election->end_date}}" disabled>
                  
        `
      </div>
    </div>

   
   
        
      </div>
    </div>

      </div>
      <div class="col-12 col-md-4">
          @if(!$election->typeof_election)
        <app-card-widget>
    <div class="card card-widget card-widget-warning">
      <div class="card-body">
        <div class="d-flex align-items-center">
          <i class="icon-users"></i>
          <div class="ml-auto d-flex flex-column align-items-end">
            <!----><h2 class="ng-star-inserted">{{$no_voters}}</h2>
            <!---->
            <span>Voters</span>
          </div>
        </div>
      </div>
    </div>
  </app-card-widget>
<br>
@endif
  <app-card-widget>
    <div class="card card-widget card-widget-accent2">
      <div class="card-body">
        <div class="d-flex align-items-center">
          <i class="icon-help"></i>
          <div class="ml-auto d-flex flex-column align-items-end">
            <h2 class="ng-star-inserted">{{$no_candidates}}</h2>
        
            <span>Candidates</span>
          </div>
        </div>
      </div>
    </div>
  </app-card-widget>

<br>
  <app-card-widget>
    <div  class="card card-widget card-widget-accent2  btn btn-info  btn-outline-info" id="lt">
   
              <h5> <span>LeftTime:</span></h5>  
              <span id="lefttime"></span>
       </div>
      </div>
    </div>
  </app-card-widget>


       
      </div>
    </div>
            
            
            
          </div>
        </div>
        
      
            </div>
          </div>
        </div>
      </div>
    </div>
    
      </section>
    </div>

@endif
 

        
  
              
        </main>
      </div>
    </div>





 

@endsection
