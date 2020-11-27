@extends('layouts.app')

@section('content')

    @if (Auth::check())
        
        
        @include('users.userdetails')
        
        
    
    @else (Auth::check())
        <div class="center jumbotron">
            <div class="text-center">
                <h1>#aaaaa</h1>
                {!! link_to_route('signup.get','signup',[],['class'=>'btn btn-lg btn-primary']) !!}
            </div>
        </div>
    @endif
    
@endsection