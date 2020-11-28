@extends('layouts.app')

@section('content')

<div class="container">
    
    <div class="userdetails_container_inner">
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
        </div>
    </div>
    
    
    <div class="artistList">
        <div class="artistList__row d-flex flex-wrap col-sm-12">
            
            <div class="artistList__row__items">
                <a href="#">
                    <div class="artistPanel">
                        
                    </div>
                </a>
                <p><a href="#">artist_Name</a></p>
            </div>

       
            <div class="artistList__row__items">
                {{--<a href="#"><div class="artistPanel__add"><p>+</p></div></a>--}}
                {!! link_to_route('artist.input', '+', [], ['class' => 'artistPanel__add']) !!}
            </div>



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
            <p><span></span>{{ $artist->officialHp }}</p>
            <p><span></span>{{ $artist->twitter }}</p>
            <p><span></span>{{ $artist->insta }}</p>
        </div>
        
        </div>
    </div>
    

</div>




@endsection