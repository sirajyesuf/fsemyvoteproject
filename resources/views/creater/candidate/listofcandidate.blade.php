
@extends('layouts.section.electiondashboard')
@section('content')

 <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2"><strong>List of Candidates</strong></h1>
           
          </div>

@include('common.error')
@include('common.success')

@if(count($listofcandidates)>0)
<div class="table table-borderless">
            <table class="table">
              <thead>
                <tr>
                  
                  <th>Title</th>
                  <th>Detail</th>
                </tr>
              </thead>
              <tbody>

                @foreach($listofcandidates as $listofcandidate)

                <tr>

                <td>{{$listofcandidate->title}}</td>
                
              

                <td><a href="{{route('detailofcandidate',['candidate'=>$listofcandidate->id,'election'=>$election])}}">Detail</a></td>                
                </tr>
                
                 @endforeach

              </tbody>
            </table>

            
          </div> 
            <div class="row">
              <div class="col-12 text-center">
                  {{$listofcandidates->links()}}
 
              </div>
              
            </div>

      @else

      <strong>no candidate list for this election </strong> 
      <a href="{{route('addcandidate',['election'=>$election->id])}}">addhere</a>
      @endif

              

        </div>    
 
@endsection
