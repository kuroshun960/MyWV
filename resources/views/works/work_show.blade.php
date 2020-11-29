@extends('layouts.app')

@section('content')
<div class="container">


<div class="container">
    
    <div class="userdetails_container_inner">
        <div class="d-flex tagAddbtn__Frex">
            <div class="">
                <h1>
                <img class="mr-2 rounded mywv_artistIcon" src="{{ $workId->path }}" width="100%">
                {{ $workId->title }}
                </h1>
            </div>
        </div>
    </div>
    
    <div class="d-flex workshow">
        
        <div class="workshowImage"><img src="{{ $workId->path }}" width="100%"></div>
        
        <div class="workDescriptionArea">
            <div class="workDescriptionArea__inner">
                
            <h1>
            <p>{{ $workId->title }}</p>
            </h1>
                
            <div class="workDescription">
            <p>{{ $workId->description }}</p>
            </div>
            
            </div>
        </div>
    </div>

</div>




</div>
@endsection