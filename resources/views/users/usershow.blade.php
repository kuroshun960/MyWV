@extends('layouts.app')

@section('content')

<div class="container">
    
    <div class="userdetails_container_inner">
        <div class="d-flex justify-content-around alignItemsCenter">
            <div><a href="#">follow :</a></div>
            
            <div class="d-flex justify-content-around alignItemsCenter">
                <h1>
                <img class="mr-2 rounded" src="{{ Gravatar::get($user->email, ['size' => 40]) }}" alt="">
                {{ $user->name }}
                </h1>
                @if (Auth::id() !== $user->id )
                    <div class="userfollowBtn"><p><a href="#">follow</a></p></div>
                @endif
            </div>
            
            <div><a href="#">follower :</a></div>
        </div>
    </div>
    
    
    <div class="artistList">
        <div class="artistList__row d-flex flex-wrap col-sm-12">
            
            @foreach ($userArtists as $userArtist)

            <div class="artistList__row__items">
                <a href="{{URL::to('artist/'.$userArtist->id)}}">
                    <div class="artistPanel">
                        <img src="{{ $userArtist->path }}" width="100%">
                    </div>
                </a>
                <p>{!! link_to_route('artist.show', $userArtist->name, ['id' => $userArtist->id]) !!}</p>

            </div>

            @endforeach
            
            {{-- この詳細ページのユーザーのアカウントが自分の物だったらアーティスト追加ボタンを表示する --}}
            
            @if (Auth::id() === $user->id )
            <div class="artistList__row__items">
                {{--<a href="#"><div class="artistPanel__add"><p>+</p></div></a>--}}
                {!! link_to_route('artist.input', '+', [], ['class' => 'artistPanel__add']) !!}
            </div>
            @endif


        </div>
    </div>
    

</div>
        
        

        
        
    
@endsection