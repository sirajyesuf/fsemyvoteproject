<!doctype html>
<html lang="zxx">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>contactus</title>
   <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">


</head>

<body>

   <br>
   <br>
   <br>


    <div class=" container">

      @include('common.success')
            <h2 class="contact-title">Get in Touch</h2>
       <form method="post" action="{{route('contactus.store')}}">
        @csrf
         <div class="form-group">
  <label for="content">write something</label>
<textarea class="form-control" rows="3" id="content" name="content" required>
  Enter Message
</textarea>
<br>
<br>
<div class="row">
  <div class="col">
    
    <input type="text"  class="form-control" name="fullname" placeholder="Enter  Name" required>

  </div>
  <div class="col">
    
    <input type="email" class="form-control" name="email" placeholder="Enter Email" required>

  </div>

</div>
<br>
<br>
<div class="form-group">
  <input type="text" name="subject" class="form-control" placeholder="Enter subject" required>

</div>
<button class="btn btn-outline-success" type="submit">  Send Message
</button>

  
</div>




         </div>


















       </form>


    </div>

      
        
</body>

</html>