@extends('layouts.section.electiondashboard')
@section('content')

 <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2"><strong>ADD Candidate</strong></h1>
           
          </div>

@include('common.error')
@include('common.success')
 <form method="post" action="{{route('storecandidate',['election'=>$election->id])}}" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
    <label for="title">Title</label>
    <input type="text" class="form-control" id="title"  name="title" placeholder="full name of candidate" required>
    <br>
    <br>
    <div class="form-group">
    <label for="Textarea">Description</label>
    <textarea class="form-control" id="Textarea" rows="2" name="description" required></textarea>
  </div>
    
   <br>
  <br>
  <div class="custom-file">
    <label class="custom-file-label" for="customFile">Choose file</label>
   <input type="file" class="custom-file-input" id="customFile" name="logo" required >
  
</div>
<br>
<br>

   <button type="submit" class="btn btn-primary">Add candidate</button>
       
      </div>
    </div>




























    
@endsection