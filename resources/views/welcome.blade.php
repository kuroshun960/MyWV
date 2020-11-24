@extends('layouts.app')

@section('content')

    @if (Auth::check())
        {{ Auth::user()->name }}
    
    @else (Auth::check())
        <div class="center jumbotron">
            <div class="text-center">
                <h1>Welcome to the Microposts</h1>
                {!! link_to_route('signup.get','新規登録',[],['class'=>'btn btn-lg btn-primary']) !!}
            </div>
        </div>
    @endif
    
@endsection