@extends('layouts.app')

@section('content')

    @if (Auth::check())
        
        
        @include('users.userdetails')
        
        
    
    @else (Auth::check())
        <div class="center jumbotron">
            <div class="text-center">
                <h1>#私を作った世界観達</h1>
                {!! link_to_route('signup.get','新しい世界をみつける',[],['class'=>'btn btn-lg btn-primary']) !!}
            </div>
        </div>
    @endif
    
@endsection