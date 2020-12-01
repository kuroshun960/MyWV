@extends('layouts.app')

@section('content')


    @if (Auth::check())
    <div class="container">   
        
        @include('users.userdetails')
        
        
    </div>
    @else 
    <div class="beforeLogincontainer"> 
    
        <div class="userRegistArea">
            <div class="text-center">
                <h1># aaaaa！</h1>
                <div class="userRegistBtn marginZeroauto">
                    {!! link_to_route('signup.get','登録する',[],['class'=>'']) !!}</div>
            </div>
        </div>
    </div>
    @endif
    

@endsection