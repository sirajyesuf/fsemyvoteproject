@extends('layouts.app')

@section('content')
<div class="container">
  
 
                      @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif
  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
  @endif
 <span class="d-block p-2 bg-primary text-white">Create an Election</span>
 <br>
 <br>                  
<form method="post" action="{{route('createelection',[Auth::user()->id])}}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
    <label for="title">Title of the Election</label>
    <input type="text" class="form-control" id="title"  name="title" aria-describedby="emailHelp" placeholder="e.g.reprezentative of our section" required value="{{old('title')}}">

    
  </div>
 <div class="form-group">
    <label for="description">Description of the Election</label>
    <textarea class="form-control" id="description" rows="3" name="description">
      this election is host for the purpose of ........ pls vote for that you love .thanks for voting.

    </textarea>
  </div>

  <div class="form-group">
    <label for="startdate">Start-Date of the Election</label>
    <input type="datetime-local" class="form-control" id="startdate" name="startdate" aria-describedby="dateHelp" required value="{{old('startdate')}}">
    
  </div>
  <div class="form-group">
    <label for="enddate">End-Date of the Election</label>
    <input type="datetime-local" class="form-control" id="enddate"  name="enddate"  required value="{{old('enddate')}}">
  </div>
  <div class="form-group">
    <label for="select1">Type of Election</label>
    <select class="form-control" id="Select1" name="typeofelection" onchange="logoofelection(this.value)">
      <option selected> select the type of election</option>
      <option value="0">Private(key and id is required for voters)</option>
      <option value="1">Public(adding voters is not required)</option>
     
    </select>
  </div>
<div style="display:none" id="logo">
  <div class="custom-file">
    <label class="custom-file-label" for="customFile">UploadLogoForTheElection</label>
   <input type="file" class="custom-file-input" id="customFile" name="logo" >
  
</div> 
</div>

 <br>
 <br>
 
  <button type="submit" class="btn btn-primary">continue</button>
</form>

    
</div>

 

<script type="text/javascript">
  
  function logoofelection(value) {

    if(value==1){
   document.getElementById("logo").style.display=""; 


    }

    else{
   document.getElementById("logo").style.display="none"; 


    }

  }

</script>












@endsection
