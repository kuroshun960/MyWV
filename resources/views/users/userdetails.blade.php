<div class="container">
    
    <div class="userdetails_container_inner">
        <div class="d-flex justify-content-around alignItemsCenter">
            
            <div class="">
                <h1>
                <img class="mr-2 rounded" src="{{ Gravatar::get(Auth::user()->email, ['size' => 40]) }}" alt="">
                {{ Auth::user()->name }}
                </h1>
            </div>
            
        </div>
    </div>
    
    
    <div class="artistList">
        <div class="artistList__row d-flex flex-wrap col-sm-12">
            
            @foreach ($artists as $artist)

            <div class="artistList__row__items">
                <a href="{{URL::to('artist/'.$artist->id)}}">
                    <div class="artistPanel">
                        <img src="{{ $artist->path }}" width="100%">
                    </div>
                </a>
                <p>{!! link_to_route('artist.show', $artist->name, ['id' => $artist->id]) !!}</p>

            </div>

            @endforeach
            
                    
            <div class="artistList__row__items">
                {{--<a href="#"><div class="artistPanel__add"><p>+</p></div></a>--}}
                {!! link_to_route('artist.input', '+', [], ['class' => 'artistPanel__add']) !!}
            </div>



        </div>
    </div>
    

</div>