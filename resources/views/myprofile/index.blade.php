@extends('layouts.app')

@section('content')
<div class="container">
        
        @include('common.success')
        @include('common.error')        

                <div class="form-group">
    <label for="formGroupExampleInput">Full Name</label>
    <input type="text" class="form-control" id="formGroupExampleInput" value="{{$user->name}}" disabled>
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">Email Address</label>
    <input type="text" class="form-control" id="formGroupExampleInput2" value="{{$user->email}}" disabled>
             </div>

<a href="{{route('setting',['user'=>$user->id])}}"><button class="btn btn-primary">edit my profile</button></a>
           
</div>
@endsection
