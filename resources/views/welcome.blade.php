@extends('layouts.app')

@section('content')
<div class="container">

    @if (Auth::check())
        
        
        @include('users.userdetails')
        
        
    
    @else 
        <div class="userRegistArea">
            <div class="text-center">
                <h1># 新たな世界観を見つけよう！</h1>
                <div class="userRegistBtn marginZeroauto">
                    {!! link_to_route('signup.get','登録する',[],['class'=>'']) !!}</div>
            </div>
        </div>
    @endif
    
</div>
@endsection