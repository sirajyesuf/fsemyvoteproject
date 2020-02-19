@extends('layouts.app')

@section('content')
<div class="container">
   
                  @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
<div class="card-body">
                    <form method="POST" action="{{route('update',[Auth::user()->id])}}">
                        @csrf
                        @method('patch')

                        <div class="form-group ">
                            <label for="name">{{ __('Name') }}</label>

                            
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$user->name}}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
        
    


                        <div class="form-group ">
                            <label for="email">{{ __('E-Mail Address') }}</label>

                        
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$user->email }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    
                        </div>

                        
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('SaveSettings') }}
                                </button>
                            </div>
                        </div>
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Close Account') }}
                                    </a>'
                        <a class="btn btn-link" href="{{route('xx')}}">
                                        {{ __('Changepassword') }}
                                    </a>
                    </form>
                   
                   


             
   
</div>
@endsection
