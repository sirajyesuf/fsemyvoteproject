
@extends('layouts.section.electiondashboard')
@section('content')

 <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2"><strong>List of Voters</strong></h1>
           
          </div>

@include('common.error')
@include('common.success')

 <a href="{{route('voter.index',['election'=>$election->id])}}"><button class="btn btn-outline-success my-2 my-sm-0" type="submit">AddVoters</button>             
  </a>
  

    <br>
    <br>
                 
       <form class="form-group" method="post" action="{{route('voter.search',['election'=>$election->id])}}">
        @csrf
      <input class="form-control" type="search" placeholder="Search here " aria-label="Search"  name="search">
      
    </form>

  @isset($voters)

    @if(count($voters)>0)
<div class="table table-borderless">
            <table class="table">
              <thead>
                <tr>
                  <th>name</th>
                  <th>voter_id</th>
                  <th>Email</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>

                @foreach($voters as $voter)

                <tr>
               <td>{{$voter->name}}</td>
                <td>{{$voter->vid}}</td>
                <td>{{$voter->email}}</td>
                
              

                <td>
                     <form method="post" action="{{route('delete.voter',['voter'=>$voter->id,'election'=>$election->id])}}">
                       @csrf
                       @method('delete')
                  <button  type="submit" class="btn btn-danger">Delete</button>
                  
                   </form>

                  </td>                
                </tr>
                
                 @endforeach

              </tbody>
            </table>

            
          </div> 
            <div class="row">
              <div class="col-12 text-center">
                  {{$voters->links()}}
 
              </div>
              
            </div>

      @else

      <strong>no voter for this election</strong> 
      <a href="{{route('voter.index',['election'=>$election->id])}}">addhere</a>
      @endif

              

        </div> 
    @endisset

    @isset($results)
     @if(count($results)>0)
      <div class="table table-borderless">
            <table class="table">
              <thead>
                <tr>
                  <th>name</th>
                  <th>voter_id</th>
                  <th>Email</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>

                @foreach($results as $result)

                <tr>
               <td>{{$result->name}}</td>
                <td>{{$result->vid}}</td>
                <td>{{$result->email}}</td>
                
              

                <td>
                     <form method="post" action="{{route('delete.voter',['voter'=>$result->id,'election'=>$election->id])}}">
                       @csrf
                       @method('delete')
                  <button  type="submit" class="btn btn-danger">Delete</button>
                  
                   </form>

                  </td>                
                </tr>
                
                 @endforeach

              </tbody>
            </table>
             </div> 
            <div class="row">
              <div class="col-12 text-center">
                  {{$results->links()}}
 
              </div>
              
            </div>
            @else
              <p>ur search word:  <strong>{{$key}}</strong></p>
                 <ul>
                   <li>not related with any document</li>

                 </ul>
                @endif
            @endisset
  
 
@endsection
