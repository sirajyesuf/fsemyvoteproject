@extends('layouts.section.electiondashboard')
@section('content')

 <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">Add Voters</h1>
           
          </div>

          @include('common.error')
          @include('common.success')
 <form method="post" action="{{route('voter.store',['election'=>$election->id])}}">
    @csrf
<div class="form-group">
    <label for="name">Full name</label>
    <input type="text" class="form-control" id="name" placeholder="full name of voter" name="name" value="{{old('name')}}">
  </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="id">VID</label>
      <input type="text" class="form-control" id="id" placeholder="voter id" name="vid" value="{{old('vid')}}">
    </div>
    <div class="form-group col-md-6">
      <label for="key">Key</label>
      <input type="text" class="form-control" id="key" placeholder="voter key" name="key" value="{{old('key')}}">
    </div>
  </div>
  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" class="form-control" id="email" placeholder="sunny@gmail.com" name="email" value="{{old('email')}}">
  </div>
    <button type="submit" class="btn btn-primary">Add Voter</button>


</form>
         
    
<script type="text/javascript">
setInterval(fun,1000);
 function fun(){
console.log("hi");

 }


</script>
     
    

@endsection