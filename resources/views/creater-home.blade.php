@extends('layouts.app')

@section('content')
<div class="container">
      @include('common.success')
      @include('common.error')



                
        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}

                        </div>
         @endif

         
         <a href="{{route('election.index',['user'=>Auth::user()->id])}}"><button class="btn btn-outline-success my-2 my-sm-0" type="submit">Create New Election</button>             
  </a>
  

    <br>
    <br>
                 
       <form class="form-group" method="post" action="{{route('election.search')}}">
        @csrf
      <input class="form-control" type="search" placeholder="Search here " aria-label="Search"  name="search" required>
      
    </form>
@isset($results)
@if(count($results)>0)

<div class="table table-borderless">
            <table class="table">
              <thead>
                <tr>
                  <th>status</th>
                  <th>title</th>
                  <th>start_date</th>
                  <th>end_date</th>
                  <th>created_date</th>
                  
                </tr>
              </thead>
              <tbody>
                @foreach($results as $result)

                <tr>
                <td>{{$result->status?'live':'not launched'}}</td>

                <td><a href="{{route('electiondashboard',['election'=>$result->id])}}">{{$result->title}}</a></td>
                <td>{{$result->start_date}}</td>
                <td>{{$result->end_date}}</td>
                <td>{{$result->created_at}}</td>
                </tr>
                
                 @endforeach

              </tbody>
            </table>

              

        </div>    


@else

  <strong>ur search key:{{$key}}</strong>
  <ul>
    <li>did not match with any document</li>
    <li><strong>pls enter the title of the election</strong></li>
  </ul>

@endif


    
                  

          
@endisset 

@isset($elections)
@if(count($elections)>0)
      <div class="table table-borderless">
            <table class="table">
              <thead>
                <tr>
                  <th>status</th>
                  <th>title</th>
                  <th>start_date</th>
                  <th>end_date</th>
                  <th>created_date</th>
                  
                </tr>
              </thead>
              <tbody>
                @foreach($elections as $election)

                <tr>
                <td id="td1">{{$election->status?'live(launched)':'not launch'}}</td>

                <td><a href="{{route('electiondashboard',['election'=>$election->id])}}">{{$election->title}}</a></td>
                <td>{{$election->start_date}}</td>
                <td>{{$election->end_date}}</td>
                <td>{{$election->created_at}}</td>
                </tr>
                
                 @endforeach
               
              </tbody>
            </table>

            <div class="row">
              <div class="col-12 text-center">
                  {{$elections->links()}}
 
              </div>
              
            </div>
          </div> 
      @else


<div class=" alert alert-danger">
    no election belongs to you pls create new election

</div>
       @endif
      @endisset
          
 <script type="text/javascript">


function fun(){
var xhr=new XMLHttpRequest();
var url="{{url(route('home.election.status',['user'=>Auth::id()]))}}";


xhr.onreadystatechange=function(){

if(xhr.readyState==4 && xhr.status==200){

}

}

xhr.open("GET",url,true);
xhr.send();

 } 


// setInterval(fun,10000);








 </script>                   
                   
            
        
</div>
@endsection
 
 
