@extends('layouts.voterapp')

@section('content')
<div class="container" >
    <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page"><STRONG>{{$election->title}}</STRONG></li>
  </ol>
</nav>
@isset($message)
<div class="p-3 mb-2 bg-danger text-white">{{$message}}</div>
@else

    @include('common.error')
    <div class="row justify-content-center">
        
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login For Voter') }}</div>

                <div class="card-body">
           

    <form method="POST" action="{{route('voter.login',['election'=>$election->id])}}">
                     
                    
                        @csrf

                        <div class="form-group row">
                            <label for="vid" class="col-md-4 col-form-label text-md-right">{{ __('Voter Id') }}</label>

                            <div class="col-md-6">
                                <input id="vid" type="text" class="form-control @error('vid') is-invalid @enderror" name="vid" value="{{ old('vid') }}" required autocomplete="vid" autofocus>

                                @error('vid')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="key" class="col-md-4 col-form-label text-md-right">{{ __('Voter KEY') }}</label>

                            <div class="col-md-6">
                                <input id="key" type="password" class="form-control @error('key') is-invalid @enderror" name="key" required autocomplete="current-key">

                                @error('key')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                       

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                
                            </div>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>
    @endisset


</div>



<script type="text/javascript">

function fun(){
var xhr=new XMLHttpRequest();
var url="{{url(route('election.status',['election'=>$election->id]))}}";


xhr.onreadystatechange=function(){

if(xhr.readyState==4 && xhr.status==200){


}

}

xhr.open("GET",url,true);
xhr.send();
 
 } 


</script>

@endsection
