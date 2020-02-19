@extends('layouts.section.electiondashboard')
@section('content')

 <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">edit candidate  <strong>{{ $candidate->title}}</strong></h1>
           
          </div>

          @include('common.error')
          @include('common.success')
 <form method="post" action="{{route('candidate.update',['candidate'=>$candidate->id,'election'=>$election->id])}}" enctype="multipart/form-data">
    @csrf
    @method('patch')
    <div class="form-group">
    <label for="title">Title</label>
    <input type="text" class="form-control" id="title"  name="title" value="{{$candidate->title}}">
    <br>
    <br>
    <div class="form-group">
    <label for="Textarea">Description</label>
    <textarea class="form-control" id="Textarea" rows="3" name="description" placeholder="{{$candidate->description}}"></textarea>
  </div>
    
  <br>
  <br>
  <div class="custom-file">
    <label class="custom-file-label" for="customFile">Choose file</label>
   <input type="file" class="custom-file-input" id="customFile" name="logo">
  
</div>
<br>
<br>

   <button type="submit" class="btn btn-primary">Update candidate</button>
       
      </div>
    </div>





     
    

@endsection