@extends('layouts.section.electiondashboard')
@section('content')

 <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">Result of Election</h1>
           
          </div>

         

  @isset($results)
   @if(count($results))
   

<div class="table table-borderless">
            <table class="table">
              <thead>
                <tr>
                  <th>Number</th>	
                  <th>Title</th>
                  <th>Start_Date</th>
                  <th>End_Date</th>
                  
                </tr>
              </thead>
              <tbody>
                @foreach($results as $result)

                <tr>
                      <td> {{$loop->index+1}}</td>
                <td>
                	<a href="{{route('election.result.show',['result'=>$result->id])}}" target="__blank">{{$result->title}}</a>
                </td>
                <td>{{$result->start_date}}</td>
                <td>{{$result->end_date}}</td>
                </tr>
                
                 @endforeach

              </tbody>
            </table>

              

        </div>  
      
  @else
<p class="alert-info">
  
  NO RESULT BELONGS TO THIS ELECTION
</p>
 @endif 


@endisset
     
    
@endsection