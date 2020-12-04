@extends('layouts.app')

@section('content')
<div class="container">


    <div class="artistdetails_container_inner">
        <div class="d-flex tagAddbtn__Frex">
            <div class="">
                <h1>
                <img class="mr-2 rounded mywv_artistIcon" src="{{ $artist->path }}" width="100%">
                {{ $artist->name }}
                </h1>
            </div>
            
            
            @foreach ($artistTags as $artistTag)
            <span class="artistTags">　{{ $artistTag->name }}　/</span>
            @endforeach

            
            
            <div class="tagAddbtn"><p>{!! link_to_route('tag.input', '+', ['id' => $artist->id], ['class' => '']) !!}</p></div>
            
            @if (Auth::id() === $artist->user_id )
            <div class="artistEditBtn">{!! link_to_route('artist.edit', 'アーティストを編集', ['id' => $artist->id], ['class' => '']) !!}</div>
            @endif
            
        </div>
    </div>
    
    
    <div class="artistList">
        <div class="artistList__row d-flex flex-wrap">
            
            @foreach ($artistWorks as $artistWork)

            <div class="artistList__row__items">
                <a href="{{URL::to('/artist/work/'.$artistWork->id)}}">
                    <div class="artistPanel">
                        <img src="{{ $artistWork->path }}" width="100%">
                    </div>
                </a>
                <p>{!! link_to_route('work.show', $artistWork->title, ['id' => $artistWork->id]) !!}</p>

            </div>

            @endforeach


            {{---自分のアーティストリストにしか作品は追加できない---}}
            @if (Auth::id() === $artist->user_id )
       
            <div class="artistList__row__items">
                {{--<a href="#"><div class="artistPanel__add"><p>+</p></div></a>--}}
                <div class="">
                {!! link_to_route('work.input', '', ['id' => $artist->id], ['class' => 'artistPanel__add']) !!}
                </div>
            </div>

            @endif


        </div>
    </div>
    
    <div class="descriptionArea">
        <div class="descriptionArea__inner">
            
        <div class="artistStyle">
        <p class="">STYLE　|　{{ $artist->style }}</p>
        </div>
        
        <div class="artistDescription">
        <p>{{ $artist->description }}</p>
        </div>
        
        <div class="snsUrl">
            
            @if( $artist->officialHp ==! null)
            <p><span class="fa fa-desktop mr-2"></span>{{ $artist->officialHp }}</p>
            @endif
            @if( $artist->twitter ==! null)
            <p><span class="fab fa-twitter mr-2"></span>{{ $artist->twitter }}</p>
            @endif
            @if( $artist->insta ==! null)
            <p><span class="fab fa-instagram mr-2"></span>{{ $artist->insta }}</p>
            @endif
        </div>
        
        </div>
    </div>

</div>


@endsection