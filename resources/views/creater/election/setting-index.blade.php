@extends('layouts.section.electionsetting')
@section('content')

<div class="container">
 
<br>
<br>
          <div class="row">
  <div class="col-1.5">
    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
     
      <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">General</a>

      <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Date</a>
      <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Messages</a>
     
    </div>
  </div>
  <div class="col-9">
    <div class="tab-content" id="v-pills-tabContent">
      <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
    <p class="text-center"><strong>Edit title and description of the election</strong></p>

      <hr>

  @include('common.error')
  @include('common.success')
      <form method="post" action="{{route('election.update.general',['election'=>$election->id])}}">
        @csrf
         <div class="form-group">
          <label for="title"> Title of Election</label>
          <input type="text"  id="title" name="title" class="form-control" value="{{$election->title}}" >

           

         </div>

          <div class="form-group">
    <label for="description">Description of Election</label>
    <textarea class="form-control" id="description" rows="2" name="description" placeholder="{{$election->description}}" ></textarea>
        <small  class="form-text text-muted">Please Don't Use Morethan 150 Words.</small>

  </div>

  <button type="submit" class="btn btn-success">update</button>

       </form>

       </div>


<!--     date  -->      

<div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">


       <p class="text-center"><strong>Edit start and end date  of the election</strong></p>

      <hr>

  
      <form method="post" action="{{route('date.update',['election'=>$election->id])}}">
        @csrf
         <div class="form-group">
    <label for="startdate">Start-Date of the Election</label>
    <input type="datetime-local" class="form-control" id="startdate" name="startdate" aria-describedby="dateHelp" required>
    
  </div>
  <div class="form-group">
    <label for="enddate">End-Date of the Election</label>
    <input type="datetime-local" class="form-control" id="enddate"  name="enddate"  required >
  </div>
  <button type="submit" class="btn btn-success">update</button>

       </form>












       </div>
      <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">



  <p class="text-center"><strong>Set message for voter  of the election</strong></p>

      <hr>

  
      <form method="post" action="{{route('election.setmessage',['election'=>$election->id])}}">
        @csrf
         
<div class="form-group">
    <label for="message">Message for voter</label>
    <textarea class="form-control" id="message" rows="2" name="message" placeholder="set the message that send to the voter......."></textarea>
        <small  class="form-text text-muted">Please Don't Use Morethan 150 Words.</small>

  </div>





  <button type="submit" class="btn btn-success">Save</button>

       </form>














       </div>
      <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">Pellentesque vestibulum commodo nibh nec blandit. Maecenas neque magna, iaculis tempus turpis ac, ornare sodales tellus. Mauris eget blandit dolor. Quisque tincidunt venenatis vulputate. Morbi euismod molestie tristique. Vestibulum consectetur dolor a vestibulum pharetra. Donec interdum placerat urna nec pharetra. Etiam eget dapibus orci, eget aliquet urna. Nunc at consequat diam. Nunc et felis ut nisl commodo dignissim. In hac habitasse platea dictumst. Praesent a accumsan ex sit amet facilisis. </div>
    </div>
  </div>
</div>


</div>


           
         

          
         











     









  
            

@endsection