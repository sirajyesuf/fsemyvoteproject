@extends('layouts.auth')
@section('content')

<div class="container">
             <br>

    <p class="text-center"><strong>Scoreboard of the Election </strong></p>

        <hr>



        <table class="table">
  <thead>
    <tr>
      <th scope="col">Rank</th>
      <th scope="col">fullname</th>
      <th scope="col">totalvote</th>
      <th scope="col">percentage</th>
    </tr>
  </thead>
  <tbody>
    @foreach($candidates as $candidate)
    <tr>
      <td>{{$loop->index+1}}</td>
      <td>{{$candidate->title}}</td>
      <td>{{$candidate->vote}}</td>
      <td>
        @if($sum_vote==0)
        
           0%
      @else
                     {{($candidate->vote/$sum_vote)*100}}%

       @endif

      </td>
    </tr>
    @endforeach
  </tbody>
</table>

 













       

           
         

          
         











     









  
            

@endsection