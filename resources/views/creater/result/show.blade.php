
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">

            
    
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
           <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}

                </a>
            <div class="container">
               

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                       @auth
                       <nav class="nav">
  <a class="nav-link" href="{{route('home')}}">Home</a>
 

</nav>

                    
                      @endauth
                        
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        
                        <!-- Authentication Links -->
                        @guest
                            <!-- <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li> -->
                           <!--  @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li> -->
                            @endif
                        @else
                        
                        
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>


                                    <a class="dropdown-item" href="{{route('index',[Auth::user()->id])}}">
                                       
                                        {{ __('MyProfile') }}
                                    </a>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

<div class="container">

<div id="print_portion">
<div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-globe"></i>MyVoteElectionRunnerPlatform,Inc
                    <small class="float-right">Date:{{$now}}</small>
                  </h4>
                </div>
          
              </div>
    
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  From
                  <address>
                    <strong>Admin, Inc.</strong><br>
                  
                    AddiAbaba,Ethiopia<br>
                    Phone: (+251)911626262<br>
                    Email: info@electionrunner.com
                  </address>
                </div>
          
                <div class="col-sm-4 invoice-col">
                  To
                  <address>
                    <strong>{{$user->name}}</strong>
                       <br>
                    Email:{{$user->email}}
                  </address>
                </div>
                
              </div>
        

          
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>Rank</th>
                      <th>FullName</th>
                      <th>TotalVote</th>
                      <th>Percentage</th>
                    </tr>
                    </thead>
                    <tbody>

                      @foreach($candidates as $candidate)
                    <tr>
                      <td>{{$loop->index+1}}</td>
                      <td>{{$candidate->title}}</td>
                      <td>{{$candidate->vote}}</td>
                      <td>

                        @if($candidate->vote)
                         {{($sum_ofvote/$candidate->vote)*100}}%
                        @else
                         0%
                        @endif

                     </td>
                
                    </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div>
              
              </div>
        

              <div class="row">

              </div>

             </div>
           <a href="{{$token}}">verifyhere</a>

           </div>




              <br>
              <br>

              
              <div class="row no-print">
                <div class="col-12">
                  <a  onclick="window.printdiv(print_portion)" href="#"  class="btn btn-primary"><i class="fas fa-print"></i> Print</a>
                  
                </div>
              
            </div>
    <script type="text/javascript">
       
function printdiv(print_portion) {
  var content=document.getElementById('print_portion').innerHTML;
  console.log(content);
   
  w=window.open();
  w.document.write(content);
  w.print(content)
  w.close()
                                    }
     

     </script>
    


   
    </div>
</body>
</html>
